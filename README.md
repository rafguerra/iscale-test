# PHP test

## 1. Installation

  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database
  - put your MySQL server credentials in the constructor of DB class
  - you can test the demo script in your shell: "php index.php"

## 2. Expectations

This simple application works, but with very old-style monolithic codebase, so do anything you want with it, to make it:

  - easier to work with
  - more maintainable



# Iscale Technical Assesment

This project refactors a simple application using OOP and SOLID principles with an MVC structure.

## Improvements Made

1. **Autoloading with Composer:** Utilized Composer for autoloading classes, eliminating manual `require_once` statements.

2. **Dependency Injection:** Injected dependencies (e.g., DB) instead of hardcoding dependencies within classes, improving flexibility and testability.

3. **Separation of Concerns:** Organized classes into an MVC structure for better separation of concerns.

5. **Single Responsibility Principle:** Ensured each class has a single responsibility.

6. **Readability:** Improved code readability by using meaningful variable and method names.

## How to Use

1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Open `public/index.php` to see the application in action.

Feel free to explore the `src` directory for the MVC components.

## Bad Practices Addressed

1. **Global Constants:** Removed global constants in favor of proper class constants.

2. **Singleton Pattern:** While still using a singleton pattern, the unnecessary instantiation within the getInstance method was removed.

3. **Hardcoded Database Credentials:** Moved creadentials to configuration file config/database.php for sensitive data.

4. **Direct SQL Queries:** Consider using prepared statements to prevent SQL injection attacks.

5. **Unused Variables:** Removed unused variables.

6. **Manual Iteration Over Comments:** Refactored the `deleteNews` method to use SQL for deleting associated comments, improving efficiency.

7. **Redundant SQL Queries:** Removed redundant SQL queries for `lastInsertId`.


## Plugins Used

1. **Intelephense:** 
2. **PHPfmt:** 
3. **IntelliPHP:** 

