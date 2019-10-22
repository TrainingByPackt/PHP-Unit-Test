# PHP-Unit-Test

To run the tests from the root folder, just run:

```
vendor/bin/phpunit
```

Would you like to run specific test, add the qualified name of it just after a space. For example, to run the unit test
in Chapter02\Exercise3 run:

```
vendor/bin/phpunit tests/Chapter02/Exercise3
```

Be aware that some tests require a web server running, so before running the tests, do this from the root folder:

```
php -S localhost:8000
```

## Dependencies

In order to run tests you would need to install some external dependencies, like PHP Unit. To do so, as you learned in 
the Book, you use **Composer**. If you look into the __composer.json__ file included, you would see the following dependencies:

- PHPUnit: it is the framework most used in the PHP community to run unit tests.
- Symfony Dom Crawler: a library you would need to test the post of HTML forms to the web server. (you would not need this until
Chapter 6).
- Symfony CSS Selector: a library to filter the contents of HTML documents using HTML tags and CSS selectors.
- Monolog: a library to handle logging.
- Guzzle: a library that wraps up CURL so that it is easier to handle them.