all: clean build

clean:
	rm -f product-*.html

build:
	tmpl.js -t index.html.ejs --object data.json
	tmpl.js -t product.html.ejs --array data.json -k products

