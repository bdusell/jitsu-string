Jitsu\StringUtil
----------------

The `Jitsu\StringUtil` class is a collection of static methods for dealing with
strings in PHP.

Why? Because many of PHP's built-in string functions are poorly named, have
awkward interfaces, and treat valid edge cases as error conditions.

`StringUtil` addresses these issues, providing a more intuitive interface to
the standard PHP string functions while offering capabilities which are lacking
in the built-in library.

## Running Unit Tests

This library is unit-tested. You can verify the results for yourself by running
the following:

```sh
composer install
./vendor/bin/phpunit test/
```
