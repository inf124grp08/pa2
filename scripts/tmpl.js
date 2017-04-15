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
  const data = JSON.parse(fs.readFileSync(arr))
  const iterable = data[arrKey];
  const src = fs.readFileSync(t).toString();
  const name = grabUntil(t, '.'); // grab [name].html.ejs

  const generate = (key, item) => {
    let filename = `${name}-${key}.html`;
    let itemData = Object.assign({ key }, data, item);
    let content = ejs.render(src, itemData);
    fs.writeFileSync(filename, content);
  }

  if ( Array.isArray( iterable ) ) {
    iterable.forEach((item, key) => generate(key, item))
  } else {
    Object.keys(iterable).forEach((key) => {
      let item = iterable[key];
      generate(key, item);
    })
  }

  process.exit(0);
} else {
  help();
}

