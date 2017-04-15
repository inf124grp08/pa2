all: clean build

clean:
	rm -f dist/index.html
	rm -f dist/product-*.html
	rm -f dist/category-*.html

build:
	mkdir -p dist
	./scripts/tmpl.js -d dist -s data.json -m obj -t tmpl/index.html.ejs
	./scripts/tmpl.js -d dist -s data.json -m col -t tmpl/product.html.ejs -k products
	./scripts/tmpl.js -d dist -s data.json -m col -t tmpl/category.html.ejs -k categories
