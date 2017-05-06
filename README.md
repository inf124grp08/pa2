# pa2

URL: http://andromeda-16.ics.uci.edu:5016/pa2

General layout: Organized by category. Clicking category takes you to product listing for that cateogry. clicking the product itself takes you to the product detail page, which has the order form.

Requirements are satisfied throughout the website. See the product page for the order form. See the category page for the products listing.

Group memebrs:
Keyvan Fatehi
Kyle San Clemente

Lastly, the github for this assignment is here: https://github.com/inf124grp08/pa2

## Requirements

- We filled a database with all of our products and their information. We use PHP to populate each of our pages dynamically with data from our database. 
- The submit action of our form adds a new entry to the order table in our database, after using regular expression to validate the submitted information.
- After the data is stored in the database the users is taken to a receipt page showing their order information.
- When the user enters their zip code a call is made with to the lookup table on the server, and a city, state and tax percentage are sent back and auto filled in the form.
- When the user enter their credit card the first 4 digits are sent to the database, using regular expressions the server calculates the type of credit card and returns a URL for the icon of the credit card company.
