# pa1

URL: andromeda-16.ics.uci.edu:5016/pa1

General layout: Organized by category. Clicking category takes you to product listing for that cateogry. clicking the product itself takes you to the product detail page, which has the order form.

Requirements are satisfied throughout the website. See the product page for the order form. See the category page for the products listing.

Group memebrs:
Keyvan Fatehi
Kyle San Clemente

The file to execute is the `dist/index.html` file. The rest of the files are used to generate some of the repetitive content.

Lastly, the github for this assignment is here: https://github.com/inf124grp08/pa1

Keep in mind that due to the nature of the openlab group system, we have been pushing often from an unnamed user, so do not rely on git commits to show who has done what. We have done all of the work together (Kyle and I).


[Assignment details](https://canvas.eee.uci.edu/courses/4693/assignments/95642)

## Requirements

- [x] An overview of your business, the products you sell, the management team, and any other information that you think makes sense for the customers to know about your company.
- [x] Display a list of products (at least 10) available for sale in a table with multiple rows and column, where each product is shown within a separate cell.
- [x] Display an image for each product available for sale in each cell.
- [x] Display the price and other key information (e.g., color, material, etc.) associated with each product in the corresponding table cell.
- [x] The user should be able to choose a product from this table by clicking on the corresponding image, which should lead to a new page that provides additional details about the product, e.g., more images, detailed description, etc.
- [x ] On the detailed description page, the user should be able to order a product by filling a form. The form should allow the user to enter the product identifier, quantity, first name, last name, phone number, shipping address, shipping method (e.g., overnight, 2-days expedited, 6-days ground), credit card information, and anything else that you think makes sense for your business.
- [x] Upon submitting the form, the website should send an email with the purchase order information included in the body of the email. Note that to send an email, one needs to connect to the SMTP server, which is not possible with the client side software. Thus, this requirement simply requires bringing up the email client with the purchase order information included in the body of the email and allowing the user to send the email.
- [x] Before submitting the form, it should be checked for proper formatting, including whether all fields are filled properly, whether the phone number, address, and credit card are properly formatted, etc. An alarm should be raised if a field is empty or not properly formatted to prevent submission of bad data.
- [x] Your website should use CSS to specify at least 10 stylistic properties for your website, such as the background for your table, the color and size of your font, the size of your images, and other stylistic preferences you may have.
- [x] Provide the ability to track the mouse movement, such that when the mouse moves over a product image, the size of the image is increased, and when the mouse moves out, the size of the image is returned back to normal. This feature can be implemented on either the page that displays the various products, or on the pages that show the details of each product, or both.

## Grading

This assignment is worth 12 points:

* 1 point for properly installing Apache and getting a bare minimum website running;
* 1 point for sufficiently satisfying each of the 10 requirements specified above;
* 1 point at the discretion of the grader for the general usability and quality of the website, including its overall design, appeal, layout, and responsiveness.

Points may also be deducted at the discretion of grader for not following the assignment instructions.
