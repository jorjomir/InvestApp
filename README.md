# InvestApp Project

This project simulates an investment system where investors can invest in different loan tranches. It is developed using PHP 7.4 and includes a set of predefined scenarios as per the provided task requirements.

## Purpose of the project: [Task file](./TASK.md)

## Getting Started
To run the project, follow these steps:

1. Ensure you have PHP 7.4 installed on your system. You can download it from the official PHP website.
2. Navigate to the project directory in your console or terminal.
3. Execute the project by running: ``php index.php``

This will run the application and execute all the predefined scenarios included in __`index.php`__.

## Unit Testing
The project comes with a suite of unit tests to ensure the code works as expected. To run these tests, follow these steps:

1. If you haven't installed Composer, download and install it from getcomposer.org.
2. In the project directory, run the following command to install PHPUnit and any other project dependencies: ``composer install``

3. Once the installation is complete, run the unit tests by executing: ``vendor/bin/phpunit``

This will run all the tests defined in the __tests__ directory and output the results.

## Project Structure
The project follows an object-oriented programming approach and is structured as follows:

- __src/:__ Contains all the source code for the project.
  - __Loan/:__ Classes related to the Loan functionality.
  - __Tranche/:__ Classes related to the Tranche functionality.
  - __Investor/:__ Classes related to the Investor functionality.
  - __Investment/:__ Classes related to the Investment functionality.
  - __Interfaces/:__ Contains interfaces used in the project.
- __tests/:__ Contains the PHPUnit tests for the various classes.
- __index.php:__ The entry point of the application where all the scenarios from the task are executed.