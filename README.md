Jitsu\StringUtil
----------------

The `Jitsu\StringUtil` class is a collection of static methods for dealing with
strings in PHP.

Why? Because many of PHP's built-in string functions are poorly named, have
awkward interfaces, and treat arguably valid edge cases as errors.

`StringUtil` addresses these issues, providing a more intuitive interface to
the standard PHP string functions while offering capabilities which are lacking
in the built-in library.

## Running Unit Tests

Run the unit test suite as follows:

```sh
composer install
./vendor/bin/phpunit test/
```
