#!/usr/bin/env node
const args = require('minimist')(process.argv);
const fs = require('fs');
const ejs = require('ejs');
const path = require('path');
const grabUntil = (s,d) => s.slice(0, s.indexOf(d));

const help = ()=>{
  process.stdout.write(`
  Usage: tmpl.js [-d dir] -t path/to/NAME.ejs -s path/to/data.json -m MODE [-k KEY]
  where MODE is one of:
    obj
      data is passed in directly as the parameters to the template renderer
      generates NAME.html

    col
      the data in the array or object at KEY is iterated over for generation
      generates NAME-i.html if iterating over an array where i is an index
      generates NAME-x.html if iterating over an object where x is a key
  \n`);
  process.exit(0);
}

const dir = args.d || process.cwd();
const mode = args.m;
const dataFile = args.s;
const tmplFile = args.t;

if (!tmplFile) help();

const collectionKey = args.k;

const write = (filename, content) => {
  let pathname = path.join(dir, filename);
  fs.writeFileSync(pathname, content);
}

const name = grabUntil(path.basename(tmplFile), '.'); // grab [name].html.ejs

if ( mode === 'obj' )
{
  const data = JSON.parse(fs.readFileSync(dataFile));
  const src = fs.readFileSync(tmplFile).toString();
  const filename = `${name}.html`;
  const params = Object.assign({ filename: tmplFile }, data);
  const content = ejs.render(src, params);
  write(filename, content);
  process.exit(0);
}
else if ( mode === 'col' )
{
  const data = JSON.parse(fs.readFileSync(dataFile))
  const src = fs.readFileSync(tmplFile).toString();

  const generate = (key, item) => {
    const filename = `${name}-${key}.html`;
    const params = Object.assign({ filename: tmplFile, key }, data, item);
    const content = ejs.render(src, params);
    write(filename, content);
  }

  const iterable = collectionKey ? data[collectionKey] : data;

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

