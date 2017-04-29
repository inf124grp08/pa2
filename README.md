# pa2

Group Members:Keyvan Fatehi & Kyle San Clemente

[Assignment details](https://canvas.eee.uci.edu/courses/4693/assignments/95644)

## Requirements

The first step in this assignment is to enable PHP on your Apache web server, if you have not already done that. Follow the instructions here: https://swiki.ics.uci.edu/doku.php/services:apache_non_root

A database for all the students in the class will be setup on a MySQL installation. You will receive an email with instructions when the account is setup. If you are working in a group, you can simply use one of the team member's database accounts and ignore the one setup for the other team member. Your second task is to make sure you are able to log into your database. You can do that using phpMyAdmin: https://instdav.ics.uci.edu/phpmyadmin/

Now that you are setup, your third task is to use PHP and MySQL to enhance the e-commerce website that you developed in assignment 1. You do not want to modify the files for assignment 1, since it is being graded. Create a copy of your e-commerce website, including all the HTML, CSS, and JS files, and move them to a different directory, and host your e-commerce site at a different URL for assignment 2. The new version of your e-commerce website needs to satisfy the following requirements: 

1. [x]  You want to use PHP and MySQL database to generate the product information dynamically. The information about available products should be read from one or more tables in your database and the corresponding HTML pages describing the details of your products should be generated dynamically. You will use PHP to query your MySQL database to obtain the details of a product and generate the proper content in HTML format. 
2. [x] When the user submits a form to order a product, instead of sending an email from the client-side, as you did in first assignment, the request should be sent to a server-side PHP script that stores that information in a database table. The form should be validated to prevent insertion of bad data in your database. 
  - [] Server side validation.
3. [x] After successfully storing the order information in a database table, a dynamically generated confirmation page should to be displayed to the user with the details of the order. 
4. [] Use Ajax to make your website dynamic and interactive. Among others, you could use Ajax to assist the user with filling the order forms, e.g., when the user chooses a particular state for delivery, obtain the corresponding tax rate from the backend database to update the total price for the product dynamically, or as another example, provide auto complete capability, such as suggesting states as the user types the name of a state. You can use these files to help with this task: zip codesPreview the documentView in a new window and tax ratesPreview the documentView in a new window. You have freedom in identifying other opportunities for using Ajax in making your website dynamic and interactive. At the very least, your website should make use of Ajax for two non-trivial features that the grader can verify. 

Important: Make sure you are not creating too many database connections and properly closing your database connections when finished with them. You only need one database connection for your entire website that can be shared across different program elements. The database installation has a limited number of connection threads. If you create too many connections and fail to close them, the database will run out of connection threads. 

## Grading

This assignment is worth 12 points:

* 3 point for sufficiently satisfying each of the 4 requirements specified above; and
* points may be taken off at the discretion of the grader for not following the assignment instructions, the overall quality of the website, its look and feel, performance, and generally how professional the website looks. 

## Submission


You need to submit a compressed file containing all of the files comprising your website using Canvas. Include a readme file that specifies the URL address of your website and its general layout/design to help the grader navigate the site. The readme file should make it clear where in the website each requirement is satisfied. If this is a group submission, the readme file should specifically state the name of both group members. Only one group member needs to submit the assignment in that case. The grader will uncompress your files and will look for this readme file in the base directory to find the URL where your website is running. Failure to include this file will result in grade deduction.

Each group member is expected to contribute to all phases of software development, including coding. It is recommended, but not required, to use a version control system, such as Github (Links to an external site.)Links to an external site., for managing your code. This way, team members can collaborate and work effectively on the same code base. 

We will grade both the HTML pages available from your web server and the HTML files you submit. The submitted files should be identical to those hosted on the web server. If not, you will receive a 0 on this assignment. This obviously means that you are not allowed to change the files on your web server after you have submitted your assignment.

Make sure your web server is running and available for the grader to check your website. Failure to access your website will result in grade deduction.

You are not allowed to work with anyone outside of your group to complete this assignment. Please be informed that we will be using automated tools to catch potential cases of plagiarism in this class.  
