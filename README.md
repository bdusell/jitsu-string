jitsu/string
------------

The `Jitsu\StringUtil` class is a collection of static methods for dealing with
strings in PHP.

Why? Because many of PHP's built-in string functions are poorly named, have
awkward interfaces, and treat arguably valid edge cases as errors.

`StringUtil` addresses these issues, providing a more intuitive interface to
the standard PHP string functions while offering capabilities which are lacking
in the built-in library.

This package is part of [Jitsu](https://github.com/bdusell/jitsu).

## Installation

Install this package with [Composer](https://getcomposer.org/):

```sh
composer require jitsu/string
```

## Testing

Run the unit test suite as follows:

```sh
composer install
./vendor/bin/phpunit test/
```

## Namespace

The class is defined under the namespace `Jitsu`.

## API

### class Jitsu\\StringUtil

A collection of static methods for dealing with strings.

Case-insensitive methods are named after their case-sensitive counterparts
by prefixing the letter `i`.

#### StringUtil::length($s)

Return the length of a string.

This is equivalent to the number of bytes in the string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `int` |

#### StringUtil::size($s)

Alias of `length`. See `\Jitsu\StringUtil::length()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `int` |

#### StringUtil::isEmpty($s)

Determine whether a string is empty.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `bool` |

#### StringUtil::equal($a, $b)

Return whether two strings are equal.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `bool` |

#### StringUtil::iEqual($a, $b)

Like `equal` but case-insensitive.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `bool` |

#### StringUtil::chars($s)

Return the characters of a string as an array.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string[]` |

#### StringUtil::chunks($s, $n)

Split a string into chunks of `$n` characters.

Each chunk is a sequential array. The last chunk may have between 1
and `$n` characters.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string[]` |

#### StringUtil::split($s, $delim = null, $limit = null)

Split a string by a delimiter into an array of strings.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$delim`** | `string|null` | An optional delimiter string. If this is `null`, the string is tokenized on whitespace characters rather than on a specific delimiter string. |
| **`$limit`** | `int|null` | An optional maximum number of splits to perform. If this is `null`, then all possible splits are made. If this is a positive integer, at most `$limit` splits will be made from the beginning of the string, with the rest of the string occupying the last element, so that no more than `$limit` + 1 elements will be returned. If `$limit` is negative, all parts except for the last -`$limit` are returned. This is ignored if `$delim` is `null`. |
| returns | `string[]` |  |

#### StringUtil::tokenize($s, $chars)

Split a string into tokens.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$chars`** | `string` | A string listing the delimiting characters. |
| returns | `string[]` |  |

#### StringUtil::join($sep, $strs = null)

Join array elements into a single string with a separator.

|   | Type | Description |
|---|------|-------------|
| **`$sep`** | `string` | The separator string. |
| **`$strs`** | `string[]` | The list of strings. |
| returns | `string` |  |

#### StringUtil::trim($s, $chars = null)

Strip characters from the beginning and end of a string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$chars`** | `string|null` | An optional string listing the characters to strip. If this is `null`, then whitespace and null bytes are stripped. |
| returns | `string` |  |

#### StringUtil::rtrim($s, $chars = null)

Strip characters from the end of a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$chars`** | `string|null` |
| returns | `string` |

#### StringUtil::ltrim($s, $chars = null)

Strip characters from the beginning of a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$chars`** | `string|null` |
| returns | `string` |

#### StringUtil::lower($s)

Convert a string to lower case.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::upper($s)

Convert a string to upper case.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::lcfirst($s)

Convert a string's first character to lower case.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::lowerFirst($s)

Alias for `lcfirst`. See `\Jitsu\StringUtil::lcfirst()`.

#### StringUtil::ucfirst($s)

Convert a string's first character to upper case.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::upperFirst($s)

Alias for `ucfirst`. See `\Jitsu\StringUtil::ucfirst()`.

#### StringUtil::capitalize($s)

Alias for `ucfirst`. See `\Jitsu\StringUtil::ucfirst()`.

#### StringUtil::ucwords($s)

Capitalize all words in a string.

Converts any alphabetic character that appears after whitespace to
upper case.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::capitalizeWords($s)

Alias for `ucwords`. See `\Jitsu\StringUtil::ucwords()`.

#### StringUtil::replace($s, $old, $new)

Replace all instances of a substring with another.

Replaces only non-overlapping instances of the substring.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$old`** | `string` |
| **`$new`** | `string` |
| returns | `string` |

#### StringUtil::replaceAndCount($s, $old, $new)

Replace a string and return the number of replacements.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$old`** | `string` |  |
| **`$new`** | `string` |  |
| returns | `array` | The pair `array($result, $count)`. |

#### StringUtil::iReplace($s, $old, $new)

Like `replace` but case-insensitive.

See `\Jitsu\StringUtil::replace()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$old`** | `string` |
| **`$new`** | `string` |
| returns | `string` |

#### StringUtil::iReplaceAndCount($s, $old, $new)

Like `replaceAndCount` but case-insensitive.

See `\Jitsu\StringUtil::replaceAndCount()`.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$old`** | `string` |  |
| **`$new`** | `string` |  |
| returns | `array` | The pair `array($result, $count)`. |

#### StringUtil::replaceMultiple($s, $pairs)

Peform multiple substring replacements at once.

Allows one to perform multiple replacements at once, which may be a
better alternative to performing successive single-string
replacements.

Replaces all non-overlapping instances of the keys of `$pairs` with
their corresponding values.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$pairs`** | `string[]` | An array mapping the substrings to be replaced to their replacements. Longer keys have precedence. |
| returns | `string` |  |

#### StringUtil::translate($s, $old, $new)

Re-map the characters in a string.

Characters listed in `$old` are changed to the corresponding
characters listed in `$new`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$old`** | `string` |
| **`$new`** | `string` |
| returns | `string` |

#### StringUtil::substring($s, $offset, $length = null)

Get a substring of a string given an offset and length.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$offset`** | `int` | The offset at which to begin the substring. If greater than the length of the string, the result will be an empty string. A negative offset denotes an offset from the end of the string. |
| **`$length`** | `int|null` | The length of the substring. The resulting substring will be shorter if the specified length runs past the end of the string. If negative, an empty string will be returned. If `null`, the substring will run to the end of the string. |
| returns | `string` |  |

#### StringUtil::replaceSubstring($s, $new, $offset, $length = null)

Replace a portion of a string with another.

See `\Jitsu\StringUtil::replace()`.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$new`** | `string` | The replacement string. |
| **`$offset`** | `int` |  |
| **`$length`** | `int|null` |  |
| returns | `string` |  |

#### StringUtil::slice($s, $i, $j = null)

Get a slice of string given two offsets.

Gets a substring of a string given an inclusive beginning index and
a non-inclusive ending index. Negative indexes denote offsets from
the end of the string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$i`** | `int` | If this occurs after the end index, an empty string is returned. |
| **`$j`** | `int|null` | If `null`, the slice runs to the end of the string. |
| returns | `string` |  |

#### StringUtil::replaceSlice($s, $new, $i, $j = null)

Replace a slice of a string with another string.

If the starting index comes after the ending index, the replacement
is inserted at the starting index.

See `\Jitsu\StringUtil::slice()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$new`** | `string` |
| **`$i`** | `int` |
| **`$j`** | `int|null` |
| returns | `string` |

#### StringUtil::insert($s, $new, $offset)

Insert a string at a given offset in another string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$new`** | `string` |  |
| **`$offset`** | `int` | A negative offset denotes an offset from the end of the string. |
| returns | `string` |  |

#### StringUtil::pad($s, $n, $pad = ' ')

Pad the beginning and end of a string with another string.

Symmetrically pads a string with another so that the result is `$n`
characters long.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$n`** | `int` |
| **`$pad`** | `string` |
| returns | `string` |

#### StringUtil::lpad($s, $n, $pad = ' ')

Pad the beginning of a string with another string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$n`** | `int` |
| **`$pad`** | `string` |
| returns | `string` |

#### StringUtil::rpad($s, $n, $pad = ' ')

Pad the end of a string with another string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$n`** | `int` |
| **`$pad`** | `string` |
| returns | `string` |

#### StringUtil::wrap($s, $cols, $sep = "\\n")

Wrap a string to a certain number of columns.

This "wraps" a string to a fixed number of columns by inserting a
string every `$cols` characters. Inserts newlines by default.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$cols`** | `int` |
| **`$sep`** | `string` |
| returns | `string` |

#### StringUtil::repeat($s, $n)

Repeat a string `$n` times.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$n`** | `int` |
| returns | `string` |

#### StringUtil::reverse($s)

Reverse a string.

@param string

|   | Type |
|---|------|
| **`$s`** | `string` |

#### StringUtil::startingWith($s, $substr)

Return the part of a string starting with another string.

The result includes the specified substring.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$substr`** | `string` |  |
| returns | `string|null` | Returns `null` if the string does not contain the substring. |

#### StringUtil::iStartingWith($s, $substr)

Like `startingWith` but case-insenstive.

See `\Jitsu\StringUtil::startingWith()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$substr`** | `string` |
| returns | `string|null` |

#### StringUtil::rStartingWith($s, $char)

Return the last part of a string starting with a certain character.

Unlike `startingWith`, this only works for single characters.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$char`** | `string` | A single character. |
| returns | `string|null` | Returns `null` if the string does not contain the character. |

#### StringUtil::startingWithChars($s, $chars)

Return the last part of a string to start with one of a number of
characters.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$chars`** | `string` | Lists the characters to look for. |
| returns | `string|null` | Returns `null` if none of the characters were found. |

#### StringUtil::preceding($s, $substr)

Return the part of a string up until a certain substring.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$substr`** | `string` |  |
| returns | `string|null` | Returns `null` if the string does not contain the substring. |

#### StringUtil::iPreceding($s, $substr)

Like `preceding` but case-insensitive.

See `\Jitsu\StringUtil::preceding()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$substr`** | `string` |
| returns | `string|null` |

#### StringUtil::words($s, $chars = null)

Split a string into words.

What constitutes a word character is defined by the current locale.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$chars`** | `string|null` | An optional list of additional characters to consider as word characters. |
| returns | `string[]` |  |

#### StringUtil::wordCount($s, $chars = null)

Count the number of words in a string.

See `\Jitsu\StringUtil::words()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$chars`** | `string|null` |
| returns | `int` |

#### StringUtil::findWords($s, $chars = null)

Locate the words in a string.

Returns an array mapping the starting indexes of the words in the
string to their corresponding words.

See `\Jitsu\StringUtil::words()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$chars`** | `string|null` |
| returns | `string[]` |

#### StringUtil::wordWrap($s, $width, $sep = "\\n")

Word-wrap a string.

Word-wraps a string to a fixed number of columns. Words longer than
the maximum width are split.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$width`** | `int` |  |
| **`$sep`** | `string` | Optionally provide a character other than newline to terminate lines. |
| returns | `string` |  |

#### StringUtil::compare($a, $b)

Lexicographically compare two strings.

Returns a negative number if `$a` comes before `$b`, 0 if they are
the same, and a number greater than 0 if `$a` comes after `$b`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `int` |

#### StringUtil::iCompare($a, $b)

Like `cmp` but case-insensitive.

See `\Jitsu\StringUtil::compare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `int` |

#### StringUtil::nCompare($a, $b, $n)

Like `cmp` but only checks the first `$n` characters.

See `\Jitsu\StringUtil::compare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| **`$n`** | `int` |
| returns | `int` |

#### StringUtil::inCompare($a, $b, $n)

Like `ncmp` but case-insensitive.

See `\Jitsu\StringUtil::nCompare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| **`$n`** | `int` |
| returns | `int` |

#### StringUtil::localeCompare($a, $b)

Like `cmp` but dependent on the current locale.

See `\Jitsu\StringUtil::compare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `int` |

#### StringUtil::humanCompare($a, $b)

Like `cmp` but uses a human-sensible comparison.

Orders strings in a way that seems more natural for human viewers
(numbers are sorted in increasing order, etc.).

See `\Jitsu\StringUtil::compare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `int` |

#### StringUtil::iHumanCompare($a, $b)

Like 'human_cmp' but case-insensitive.

See `\Jitsu\StringUtil::humanCompare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$b`** | `string` |
| returns | `int` |

#### StringUtil::substringCompare($a, $b, $offset, $length = null)

Like `compare` but uses only a substring of the first string.

See `\Jitsu\StringUtil::compare()`.

|   | Type | Description |
|---|------|-------------|
| **`$a`** | `string` |  |
| **`$offset`** | `int` | Starting offset of where comparison with `$a` should start. A negative offset counts from the end of the string. |
| **`$length`** | `int|null` | Maximum length of the portion of `$a` used in the comparison. If `null`, comparison is until the of the string. |
| returns | `int` |  |

#### StringUtil::iSubstringCompare($a, $b, $offset, $length = null)

Like `substringCompare` but case-insensitive.

See `\Jitsu\StringUtil::substringCompare()`.

|   | Type |
|---|------|
| **`$a`** | `string` |
| **`$offset`** | `int` |
| **`$length`** | `int|null` |
| **`$b`** | `string` |
| returns | `int` |

#### StringUtil::contains($s, $substr, $offset = 0)

Determine whether a string contains a certain substring.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$substr`** | `string` |  |
| **`$offset`** | `int` | Optionally provide a starting offset. |
| returns | `bool` |  |

#### StringUtil::iContains($s, $substr, $offset = 0)

Like `contains` but case-insensitive.

See `\Jitsu\StringUtil::contains()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$substr`** | `string` |
| **`$offset`** | `int` |
| returns | `bool` |

#### StringUtil::containsChars($s, $chars)

Determine whether a string includes one of a number of characters.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$chars`** | `string` | A list of characters. |
| returns | `bool` |  |

#### StringUtil::containsChar($s, $char)

Determine whether a string contains a character.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$char`** | `string` | A single character. |
| returns | `bool` |  |

#### StringUtil::beginsWith($s, $prefix)

Determine whether a string begins with a certain prefix.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$prefix`** | `string` |
| returns | `bool` |

#### StringUtil::iBeginsWith($s, $prefix)

Like `beginsWith` but case-insensitive.

See `\Jitsu\StringUtil::beginsWith()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$prefix`** | `string` |
| returns | `bool` |

#### StringUtil::endsWith($s, $suffix)

Determine whether a string ends with a certain suffix.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$suffix`** | `string` |
| returns | `bool` |

#### StringUtil::iEndsWith($s, $suffix)

Like `endsWith` but case-insensitive.

See `\Jitsu\StringUtil::endsWith()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$suffix`** | `string` |
| returns | `bool` |

#### StringUtil::removePrefix($s, $prefix)

Remove a prefix from a string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$prefix`** | `string` |  |
| returns | `string|null` | Returns `null` if the subject string does not have the prefix. |

#### StringUtil::iRemovePrefix($s, $prefix)

Like `removePrefix`, but case-insensitive.

See `\Jitsu\StringUtil::removePrefix()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$prefix`** | `string` |
| returns | `string|null` |

#### StringUtil::removeSuffix($s, $suffix)

Remove a suffix from a string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$suffix`** | `string` |  |
| returns | `string|null` | Returns `null` if the subject string does not have the suffix. |

#### StringUtil::iRemoveSuffix($s, $suffix)

Like `removeSuffix`, but case-insensitive.

See `\Jitsu\StringUtil::removeSuffix()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$suffix`** | `string` |
| returns | `string|null` |

#### StringUtil::find($s, $substr, $offset = 0)

Determine the location of a substring within another string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$substr`** | `string` |  |
| **`$offset`** | `int` | Optionally provide a starting offset. |
| returns | `int|null` | The starting index of the substring, or `null` if the substring does not appear within the string. |

#### StringUtil::iFind($s, $substr, $offset = 0)

Like `find` but case-insensitive.

See `\Jitsu\StringUtil::find()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$substr`** | `string` |
| **`$offset`** | `int` |
| returns | `int|null` |

#### StringUtil::rFind($s, $substr, $offset = 0)

Like `find` but starts from the end of the string.

See `\Jitsu\StringUtil::find()`.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$substr`** | `string` |  |
| **`$offset`** | `int` | The optional offset is the number of characters from the _end_ of the string. |
| returns | `int|null` |  |

#### StringUtil::before($s, $substr)

Get the part of a string before a certain substring.

Returns the whole string if it does not contain the substring.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$substr`** | `string` |
| returns | `string` |

#### StringUtil::after($s, $substr)

Get the part of a string after the last occurrence of a certain
substring.

Returns the whole string if it does not contain that substring.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$substr`** | `string` |
| returns | `string` |

#### StringUtil::isLower($s)

Determine whether all characters in a string are lower case.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isUpper($s)

Determine whether all characters in a string are upper case.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isAlphanumeric($s)

Determine whether all characters in a string are alphanumeric.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isAlphabetic($s)

Determine whether all characters in a string are alphabetic.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isControl($s)

Determine whether all characters in a string are control characters.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isDecimal($s)

Determine whether all characters in a string are decimal digits.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isHex($s)

Determine whether all characters in a string are hexadecimal digits.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isVisible($s)

Determine whether all characters in a string are visible characters.

Whitespace and control characters are not visible characters.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isPrintable($s)

Determine whether all characters in a string have printable output.

Control characters do not have printable output.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isPunctuation($s)

Determine whether all characters in a string are punctuation.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::isWhitespace($s)

Determine whether all characters in a string are whitespace.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `bool` | Returns `false` if `$s` is empty. |

#### StringUtil::count($s, $substr, $offset = 0, $length = null)

Count the number of times a string contains a substring.

Excludes overlaps.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$substr`** | `string` |  |
| **`$offset`** | `int` | Optionally provide a starting offset. |
| **`$length`** | `int|null` | Optionally provide a maximum length. |
| returns | `int` |  |

#### StringUtil::characterRun($s, $chars, $begin = 0, $end = null)

Count a number of matching characters at the beginning of a string.

Determines the length of the initial segment of a string which
contains only the characters listed in `$chars`.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$chars`** | `string` | A list of characters. |
| **`$begin`** | `int` | Optionally provide a starting offset. |
| **`$end`** | `int|null` | Optionally provide an ending offset. |
| returns | `int` |  |

#### StringUtil::escapeCString($s)

Escape a string C-style.

Escapes a string by adding backslashes in front of certain
characters and encoding non-printable characters with octal codes,
just like in C string literals.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::unescapeCString($s)

Un-escape the contents of a C-style string literal.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::escapePhpString($s)

Escape a string PHP-style.

Escapes a string by placing backslashes before special characters as
required by PHP.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::unescapeBackslashes($s)

Remove all backslash (`\`) escape characters from a string.

Note that this does not interpret `\n` as a newline, `\t` as tab,
etc., but as the literal characters `n`, `t`, etc.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::parseInt($s, $base = null)

Parse a string as an integer according to a certain base.

If `$base` is `null`, the base is deduced from the prefix of the
string (`0x` for hexadecimal, `0` for octal, and decimal otherwise).
Ignores any invalid trailing characters.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$base`** | `int|null` |
| returns | `string` |

#### StringUtil::parseReal($s)

Parse a floating-point value.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `string` |  |
| throws | `RuntimeException` | Thrown if `$s` is not a valid float string. |

#### StringUtil::encodeHex($s)

Convert a binary string to a hexadecimal string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::decodeHex($s)

Parse a hexadecimal string into binary data.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::encodeBase64($s)

Encode a binary string in base 64.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::decodeBase64($s)

Decode a base 64 string to binary.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::fromAscii($n)

Convert an ASCII codepoint to the corresponding character.

|   | Type | Description |
|---|------|-------------|
| **`$n`** | `int` |  |
| returns | `string` | A single character. |

#### StringUtil::chr($n)

Alias for `fromASCII`.

See `\Jitsu\StringUtil::fromAscii()`.

|   | Type |
|---|------|
| **`$n`** | `int` |
| returns | `string` |

#### StringUtil::toAscii($c)

Convert a character to its ASCII codepoint.

|   | Type | Description |
|---|------|-------------|
| **`$c`** | `string` | A single character. |
| returns | `int` |  |

#### StringUtil::ord($c)

Alias for `toASCII`.

See `\Jitsu\StringUtil::toAscii()`.

|   | Type |
|---|------|
| **`$c`** | `string` |
| returns | `int` |

#### StringUtil::byteCounts($s)

Tally the occurrences of the 256 possible byte values in a string.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `int[]` | Maps each byte value (0-255) to the number of its occurences in `$s`. |

#### StringUtil::unique($s)

List all of the unique byte values in a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::unusedBytes($s)

List all byte values which do not occur in a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::encodeHtml($s, $noquote = false)

Escape special HTML characters with character entities.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$noquote`** | `bool` | Whether double quotes (`"`) will be left un-escaped. |
| returns | `string` |  |

#### StringUtil::escapeHtml($s, $noquote = false)

Alias of `encodeHtml`.

See `\Jitsu\StringUtil::encodeHtml()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| **`$noquote`** | `bool` |
| returns | `string` |

#### StringUtil::unencodeHtml($s)

Inverse of `encodeHtml`.

The term "unencode" is used here as opposed to "decode" to emphasize
the fact that this function is not suitable for decoding arbitrary
HTML text, but rather HTML encoded by `encodeHtml` using only a
minimal set of named character entity codes. This function does not
recognize named entities except for those encoded by `encodeHtml`
as well as `&apos;`. It will decode numeric entities except for
those corresponding to non-printable characters, which it will leave
encoded.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::encodeHtmlDict($noquote = false)

Generate a minimal replacement dictionary for escaping special HTML
characters using their HTML5 character entities.

|   | Type | Description |
|---|------|-------------|
| **`$noquote`** | `bool` | Whether the double quote (`"`) will be omitted. |
| returns | `string[]` |  |

#### StringUtil::encodeHtmlEntities($s)

Replace characters in a string with their equivalent HTML5 named
character entities wherever possible.

This ability is not particularly useful, and `encodeHTML` should
be preferred instead for efficiency.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::encodeHtmlEntitiesDict()

Generate the (fairly large) replacement dictionary for encoding
characters to named HTML5 character entities wherever possible.

|   | Type | Description |
|---|------|-------------|
| returns | `string[]` | Maps characters to character entities. |

#### StringUtil::stripTags($s)

Strip HTML and PHP tags from a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::parseRawQueryString($s)

URL-decode and parse a query string.

Note that this assumes the PHP convention of parameter names ending
with `[]` to denote arrays of values; in cases where parameters
share the same name, only the last one is included.

Also note that this automatically URL-decodes the query string; it
is incorrect to use this on a string which is not URL-encoded.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| returns | `string[]` | Maps parameter names to string values. |

#### StringUtil::encodeStandardQueryString($data, $sep = '&')

Format and URL-encode data as a query string.

This adheres to the standard which does not encode spaces as `+`.

For compatibility reasons, `encodeQueryString` should be preferred. See `\Jitsu\StringUtil::encodeQueryString()`.

|   | Type | Description |
|---|------|-------------|
| **`$data`** | `array|object` | The data to encode in the query string. |
| **`$sep`** | `string` | Optionally provide a separator other than `&`, such as `;`. |
| returns | `string` |  |

#### StringUtil::encodeQueryString($data, $sep = '&')

Format and URL-encode data as a query string, encoding spaces as
`+`.

|   | Type | Description |
|---|------|-------------|
| **`$data`** | `array|object` | The data to encode in the query string. |
| **`$sep`** | `string` | Optionally provide a separator other than `&`, such as `;`. |
| returns | `string` |  |

#### StringUtil::encodeStandardUrl($s)

URL-encode a string.

This adheres to the standard which does not encode spaces as `+`.

For compatibility reasons, `encodeUrl` should be preferred. See `\Jitsu\StringUtil::encodeUrl()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::decodeStandardUrl($s)

Decode a URL-encoded string.

This adheres to the standard which does not encode spaces as `+`.

For compatibility reasons, `decodeUrl` should be preferred. See `\Jitsu\StringUtil::decodeUrl()`.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::encodeUrl($s)

URL-encode a string, using `+` to encode spaces.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::decodeUrl($s)

Decode a URL-encoded string, treating `+` as space.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::parseCsv($s, $delim = ',', $quote = '"', $escape = '\\\\')

Parse a CSV line into an array.

|   | Type | Description |
|---|------|-------------|
| **`$s`** | `string` |  |
| **`$delim`** | `string` | Optional delimiter character. Default is `,`. |
| **`$quote`** | `string` | Optional enclosure (quote) character. Default is `"`. |
| **`$escape`** | `string` | Optional escape character. Default is `\\`. |
| returns | `string[]` |  |

#### StringUtil::md5($s)

Compute the MD5 hash of a string as a 16-byte binary string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::md5Hex($s)

Compute the MD5 hash of a string as a hex string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::sha1($s)

Compute the SHA1 hash of a string as a 20-byte binary string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::sha1Hex($s)

Compute the SHA1 hash of a string as a hex string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::rot13($s)

Apply rot13 encryption to a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::shuffle($s)

Randomly shuffle the characters of a string.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::formatMoney($amount)

Format a number as a currency value using the current locale.

Note that this requires setting the locale using
`setlocale(LC_ALL, $locale)` or `setlocale(LC_MONETARY, $locale)`
for some locale that is installed on the system.

|   | Type |
|---|------|
| **`$amount`** | `int|float` |
| returns | `string` |

#### StringUtil::formatNumber($number, $decimals = 0, $decimal\_point = '.', $thousands\_sep = ',')

Format a number with commas and a decimal point.

|   | Type | Description |
|---|------|-------------|
| **`$number`** | `int|float` |  |
| **`$decimals`** | `int` | Optional number of decimal places. Default is 0. |
| **`$decimal_point`** | `string` | Optional decimal point character. Default is `.`. |
| **`$thousands_sep`** | `string` | Optional thousands separator. Default is `,`. |
| returns | `string` |  |

#### StringUtil::levenshtein($s1, $s2, $ins = null, $repl = null, $del = null)

Compute the Levenshtein distance between two strings.

The Levenshtein distance is the minimum number of character
replacements, insertions, and deletions necessary to transform `$s1`
into `$s2`.

|   | Type | Description |
|---|------|-------------|
| **`$s1`** | `string` |  |
| **`$s2`** | `string` |  |
| **`$ins`** | `int` | Optional cost per insertion. |
| **`$repl`** | `int` | Optional cost per replacement. |
| **`$del`** | `int` | Optional cost per deletion. |
| returns | `int` |  |

#### StringUtil::splitCamelCase($s)

Split a string in camel case into its components.

Runs of consecutive capital letters are treated as acronyms and are
grouped accordingly.

For example, the string "XMLHttpRequest" would be split into "XML",
"Http", "Request".

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::pluralize($s)

Convert an English word to its plural or "-s" form.

One could use this to form the plural form of a noun or the third
person singular form of a verb.

This uses a naive algorithm which will not work for irregular forms
and for certain other cases. However, it knows enough to convert
common endings like "-y" to "-ies", "-s" to "-ses", and so on.

|   | Type |
|---|------|
| **`$s`** | `string` |
| returns | `string` |

#### StringUtil::capture($callback)

Capture all output printed in a callback.

Uses PHP output buffering to capture all of the output `echo`ed in
a callback. If the callback throws an exception, the output will be
ignored, and the exception will be re-thrown.

|   | Type | Description |
|---|------|-------------|
| **`$callback`** | `callable` |  |
| returns | `string` |  |
| throws | `\Exception` | Whatever `$callback` throws. |

