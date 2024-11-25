# SupermarketShoppingCart
A PHP project to calculate shopping basket totals with various discount schemes.


<div style="display: flex; flex-direction: column; align-items: center;">

![SupermarketShoppingCart](https://i.ibb.co/HT2HqFf/b3e2d59d-451a-4c95-bf12-f579e5e139c6.webp) 

![SupermarketShoppingCart](https://i.ibb.co/JchMgWW/Capture.png)  
</div>


## Features

- Add items to the basket.
- Apply various discount schemes (e.g., Buy One Get One Free).
- Calculate the total price of the shopping basket.


## Key Features
1. name and description:

    - Add a meaningful project name and description.
2. autoload:

    - PSR-4 autoloading is configured for the src directory.
3. autoload-dev:

    - PSR-4 autoloading for development files (like tests).
4. PHP Requirement:

    - Ensures the project is compatible with PHP 8.0 and above.
5. Dev Dependencies:

    - Includes phpunit/phpunit for testing.
6. Scripts:

    - Adds a test script to easily run PHPUnit with composer test.
7. Config Options:

    - Optimizes the autoloader for production.
    - Ensures package sorting for cleaner composer.json.
8. Stability:

    - Uses minimum-stability: stable and prefer-stable: true to avoid unstable packages.


## Running Tests

To run your tests, use this command:

```
vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```