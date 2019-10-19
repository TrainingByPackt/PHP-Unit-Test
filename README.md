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