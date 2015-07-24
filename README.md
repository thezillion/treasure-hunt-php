# treasure-hunt-php
A basic treasure hunt framework. Helps you easily setup a complete treasure hunt site in PHP.

## How to
* Create a database (using a tool like phpmyadmin) and import the hunt.sql file in the root directory to set up your tables.
* Specify your database authentication details in the file /garage/modules/mysqldb.php
* The template can be edited at /template/main.php and individual files can be edited at /template/pages/*.php. The filenames are self-explanatory (and are mostly the same as the root filenames).
* Fire up your server and visit the cloned hunt folder. It should be up and running!