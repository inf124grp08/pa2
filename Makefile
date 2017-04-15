all: clean build

clean:
	rm -f product-*.html

build:
	./scripts/tmpl.js -t index.html.ejs --object data.json
	./scripts/tmpl.js -t product.html.ejs --array data.json -k products

