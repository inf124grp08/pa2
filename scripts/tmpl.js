#!/usr/bin/env node
const args = require('minimist')(process.argv);
const fs = require('fs');
const ejs = require('ejs');
const path = require('path');
const grabUntil = (s,d) => s.slice(0, s.indexOf(d));

const help = ()=>{
  process.stdout.write(`
  Usage: tmpl.js -t [ejs] [-k key] MODE
  where MODE is one of:
    --object file.json
    --array file.json
      this requires a key passed in with -k, the index of the array value to iterate upon
  \n`);
  process.exit(0);
}

const t = args.t;
const obj = args.object;
const arr = args.array;
const arrKey = args.k;


if (!t) help();
if (obj && arr) help();

if ( obj )
{
  const data = JSON.parse(fs.readFileSync(obj));
  const src = fs.readFileSync(t).toString();
  const name = grabUntil(t, '.'); // grab [name].html.ejs
  let filename = `${name}.html`;
  let content = ejs.render(src, data);
  fs.writeFileSync(filename, content);
  process.exit(0);
}
else if ( arr && arrKey )
{
  const data = JSON.parse(fs.readFileSync(arr))[arrKey];
  const src = fs.readFileSync(t).toString();
  const name = grabUntil(t, '.'); // grab [name].html.ejs
  data.forEach((item, key) => {
    let filename = `${name}-${key}.html`;
    let content = ejs.render(src, item);
    fs.writeFileSync(filename, content);
  })
  process.exit(0);
} else {
  help();
}

