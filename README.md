﻿# Welcome to the Calculator!

This project has php unit tests included and will require you to have PHP 7.2 installed and the Curl extensions turned on in the PHP environment file.

The next item that should be installed before starting should be Composer.
Here is the link to download and [install it](https://getcomposer.org/download/).
Please make sure you have it installed in this repo directory for you to use using your terminal or powershell command line tools.

# Directory Structure

ibet <br>
	- /js (for javascript)<br>
	- /src	- Controllers, Middleware, Operators, Calculate.php<br>
	- /Tests<br>
	- router.php<br>
	- index.html<br>
	- composer.json<br>
	- phpunit.xml (for test suite)<br>

# Installation
You will be required to run this command in the command line inside the current directory where the composer.json file is.

> php composer install

# Starting the server
To start the internal php internal server run on the command line.

>  php -S localhost:8000

# Running the Tests
To start the tests, you must have done all the installation steps and be in the ibet directory.
 Now run this command below in the command line.

>  phpunit

*If the command is not valid then run the following command.*

>  php vendor/bin/phpunit

To modify the tests, go to the directory "Tests" and open the CalculatorAPITest class in your IDE.
Then just change either the rightInput or leftInputs to the values you want in the functions.
Then change the assertEquals first parameter on the final line of each function to another numeric value.
The test will fail if there is no numeric values.
The key can also be modified in the file, this will make all tests fail.

# Requests
There are 3 kinds of requests, 201 Created, 400 Bad Request, 401 Unauthroised
All requests require a key to prevent CRSF attacks.

# Find The Easter Egg
Hidden in the code is an easter egg, can you spot it?
Hint: Its about you.
