all: clean build

clean:
	rm -f dist/index.html
	rm -f dist/product-*.html
	rm -f dist/category-*.html

build:
	mkdir -p dist
	./scripts/tmpl.js -d dist -t templates/index.html.ejs --object data.json
	./scripts/tmpl.js -d dist -t templates/product.html.ejs --array data.json -k products
	./scripts/tmpl.js -d dist -t templates/category.html.ejs --array data.json -k categories
