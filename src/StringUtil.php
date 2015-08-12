<?php

/**
 * String utility functions.
 */

namespace Jitsu;

/**
 * A collection of static methods for dealing with strings.
 *
 * Case-insensitive methods are named after their case-sensitive counterparts
 * by prefixing the letter `i`. Similarly, methods which work in reverse on a
 * string are named after their counterparts by prefixing `r`.
 */
class StringUtil {

	/**
	 * Return the length of a string.
	 *
	 * This is equivalent to the number of bytes in the string.
	 *
	 * @param string $s
	 * @return int
	 */
	public static function length($s) {
		return strlen($s);
	}

	/**
	 * @see \Jitsu\StringUtil::length() Alias of `length`.
	 *
	 * @param string $s
	 * @return int
	 */
	public static function size($s) {
		return strlen($s);
	}

	/**
	 * Return whether two strings are equal.
	 *
	 * @param string $a
	 * @param string $b
	 * @return bool
	 */
	public static function equal($a, $b) {
		return strcmp($a, $b) === 0;
	}

	/**
	 * Like `equal` but case-insensitive.
	 *
	 * @param string $a
	 * @param string $b
	 * @return bool
	 */
	public static function iequal($a, $b) {
		return strcasecmp($a, $b) === 0;
	}

	/**
	 * Return the characters of a string as an array.
	 *
	 * @param string $s
	 * @return string[]
	 */
	public static function chars($s) {
		if(strlen($s) === 0) return array();
		return str_split($s);
	}

	/**
	 * Split a string into chunks of `$n` characters.
	 *
	 * Each chunk is a sequential array. The last chunk may have between 1
	 * and `$n` characters.
	 *
	 * @param string $s
	 * @return string[]
	 */
	public static function chunks($s, $n) {
		if(strlen($s) === 0) return array();
		return str_split($s, $n);
	}

	/**
	 * Split a string by a delimiter into an array of strings.
	 *
	 * @param string $s
	 * @param string|null $delim An optional delimiter string. If this is
	 *                           `null`, the string is tokenized on
	 *                           whitespace characters rather than on a
	 *                           specific delimiter string.
	 * @param int|null $limit An optional maximum number of splits to
	 *                        perform. If this is `null`, then all
	 *                        possible splits are made. If this is a
	 *                        positive integer, at most `$limit` splits
	 *                        will be made from the beginning of the
	 *                        string, with the rest of the string occupying
	 *                        the last element, so that no more than
	 *                        `$limit` + 1 elements will be returned. If
	 *                        `$limit` is negative, all parts except for
	 *                        the last -`$limit` are returned. This is
	 *                        ignored if `$delim` is `null`.
	 * @return string[]
	 */
	public static function split($s, $delim = null, $limit = null) {
		if($delim === null) {
			return self::tokenize($s, " \n\t\r\v\f");
		} else {
			if($limit === null) {
				return explode($delim, $s);
			} else {
				return explode($delim, $s, $limit + ($limit >= 0));
			}
		}
	}

	/**
	 * Split a string into tokens.
	 *
	 * @param string $s
	 * @param string $chars A string listing the delimiting characters.
	 * @return string[]
	 */
	public static function tokenize($s, $chars) {
		$result = array();
		$r = strtok($s, $chars);
		while($r !== false) {
			$result[] = $r;
			$r = strtok($chars);
		}
		return $result;
	}

	/**
	 * Join array elements into a single string with a separator.
	 *
	 * @param string $sep The separator string.
	 * @param string[] $strs The list of strings.
	 * @return string
	 */
	public static function join($sep, $strs = null) {
		return implode($sep, $strs);
	}

	/**
	 * Strip characters from the beginning and end of a string.
	 *
	 * @param string $s
	 * @param string|null $chars An optional string listing the characters
	 *                           to strip. If this is `null`, then
	 *                           whitespace and null bytes are stripped.
	 * @return string
	 */
	public static function trim($s, $chars = null) {
		if($chars === null) {
			return trim($s);
		} else {
			return trim($s, $chars);
		}
	}

	/**
	 * Strip characters from the end of a string.
	 *
	 * @param string $s
	 * @param string|null $chars
	 * @return string
	 */
	public static function rtrim($s, $chars = null) {
		if($chars === null) {
			return rtrim($s);
		} else {
			return rtrim($s, $chars);
		}
	}

	/**
	 * Strip characters from the beginning of a string.
	 *
	 * @param string $s
	 * @param string|null $chars
	 * @return string
	 */
	public static function ltrim($s, $chars = null) {
		if($chars === null) {
			return ltrim($s);
		} else {
			return ltrim($s, $chars);
		}
	}

	/**
	 * Convert a string to lower case.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function lower($s) {
		return strtolower($s);
	}

	/**
	 * Convert a string to upper case.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function upper($s) {
		return strtoupper($s);
	}

	/**
	 * Convert a string's first character to lower case.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function lcfirst($s) {
		return lcfirst($s);
	}

	/**
	 * @see \Jitsu\StringUtil\lcfirst() Alias for `lcfirst`.
	 */
	public static function lowerFirst($s) {
		return lcfirst($s);
	}

	/**
	 * Convert a string's first character to upper case.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function ucfirst($s) {
		return ucfirst($s);
	}

	/**
	 * @see \Jitsu\StringUtil\ucfirst() Alias for `ucfirst`.
	 */
	public static function upperFirst($s) {
		return ucfirst($s);
	}

	/**
	 * Capitalize all words in a string.
	 *
	 * Converts any alphabetic character that appears after whitespace to
	 * upper case.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function ucwords($s) {
		return ucwords($s);
	}

	/**
	 * @see \Jitsu\StringUtil\ucwords() Alias for `ucwords`.
	 */
	public static function capitalizeWords($s) {
		return ucwords($s);
	}

	/**
	 * Replace all instances of a substring with another.
	 *
	 * Replaces only non-overlapping instances of the substring.
	 *
	 * @param string $s
	 * @param string $old
	 * @param string $new
	 * @return string
	 */
	public static function replace($s, $old, $new) {
		if(strlen($old) === 0) {
			if(strlen($s) === 0) {
				return $new;
			} else {
				return $new . implode($new, str_split($s)) . $new;
			}
		} else {
			return str_replace($old, $new, $s);
		}
	}

	/**
	 * Replace a string and return the number of replacements.
	 *
	 * @param string $s
	 * @param string $old
	 * @param string $new
	 * @return array The pair `array($result, $count)`.
	 */
	public static function replaceCount($s, $old, $new) {
		if(strlen($old) === 0) {
			if(strlen($s) === 0) {
				return array($new, 1);
			} else {
				return array(
					$new . implode($new, str_split($s)) . $new,
					strlen($s) + 1
				);
			}
		} else {
			$r = str_replace($old, $new, $s, $count);
			return array($r, $count);
		}
	}

	/**
	 * Like `replace` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::replace()
	 *
	 * @param string $s
	 * @param string $old
	 * @param string $new
	 * @return string
	 */
	public static function ireplace($s, $old, $new) {
		if(strlen($old) === 0) {
			if(strlen($s) === 0) {
				return $new;
			} else {
				return $new . implode($new, str_split($s)) . $new;
			}
		} else {
			return str_ireplace($old, $new, $s);
		}
	}

	/**
	 * Like `replaceCount` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::replaceCount()
	 *
	 * @param string $s
	 * @param string $old
	 * @param string $new
	 * @return array The pair `array($result, $count)`.
	 */
	public static function ireplaceCount($s, $old, $new) {
		if(strlen($old) === 0) {
			if(strlen($s) === 0) {
				return array($new, 1);
			} else {
				return array(
					$new . implode($new, str_split($s)) . $new,
					strlen($s) + 1
				);
			}
		} else {
			$r = str_ireplace($old, $new, $s, $count);
			return array($r, $count);
		}
	}

	/**
	 * Peform multiple substring replacements at once.
	 *
	 * Allows one to perform multiple replacements at once, which may be a
	 * better alternative to performing successive single-string
	 * replacements.
	 *
	 * Replaces all non-overlapping instances of the keys of `$pairs` with
	 * their corresponding values.
	 *
	 * @param string $s
	 * @param string[] An array mapping the substrings to be replaced to
	 *                 their replacements. Longer keys have precedence.
	 * @return string
	 */
	public static function replaceMultiple($s, $pairs) {
		return strtr($s, $pairs);
	}

	/**
	 * Re-map the characters in a string.
	 *
	 * Characters listed in `$old` are changed to the corresponding
	 * characters listed in `$new`.
	 *
	 * @param string $s
	 * @param string $old
	 * @param string $new
	 * @return string
	 */
	public static function translate($s, $old, $new) {
		return strtr($s, $old, $new);
	}

	/**
	 * Get a substring of a string given an offset and length.
	 *
	 * @param string $s
	 * @param int $offset The offset at which to begin the substring. If
	 *                    greater than the length of the string, the result
	 *                    will be an empty string. A negative offset
	 *                    denotes an offset from the end of the string.
	 * @param int|null $length The length of the substring. The resulting
	 *                         substring will be shorter if the specified
	 *                         length runs past the end of the string. If
	 *                         negative, an empty string will be returned.
	 *                         If `null`, the substring will run to the end
	 *                         of the string.
	 * @return string
	 */
	public static function substring($s, $offset, $length = null) {
		$n = strlen($s);
		if($offset >= $n) return '';
		if($length === null) {
			return substr($s, $offset);
		} else {
			if($n + $offset < 0) {
				$length = $n + $offset + $length;
			}
			if($length < 0) return '';
			return substr($s, $offset, $length);
		}
	}

	/**
	 * Replace a portion of a string with another.
	 *
	 * @see \Jitsu\StringUtil::replace()
	 *
	 * @param string $s
	 * @param string $new The replacement string.
	 * @param string $offset
	 * @param int $offset
	 * @param int|null $length
	 * @return string
	 */
	public static function replaceSubstring($s, $new, $offset, $length = null) {
		$n = strlen($s);
		if($offset >= $n) return $s . $new;
		if($length === null) {
			return substr_replace($s, $new, $offset);
		} else {
			if($n + $offset < 0) {
				$length = $n + $offset + $length;
			}
			if($length < 0) $length = 0;
			return substr_replace($s, $new, $offset, $length);
		}
	}

	/**
	 * Get a slice of string given two offsets.
	 *
	 * Gets a substring of a string given an inclusive beginning index and
	 * a non-inclusive ending index. Negative indexes denote offsets from
	 * the end of the string.
	 *
	 * @param string $s
	 * @param int $i If this occurs after the end index, an empty string is
	 *               returned.
	 * @param int|null $j If `null`, the slice runs to the end of the
	 *                    string.
	 * @return string
	 */
	public static function slice($s, $i, $j = null) {
		return self::substring($s, $i, self::_sliceLen($s, $i, $j));
	}

	/**
	 * Replace a slice of a string with another string.
	 *
	 * @see \Jitsu\StringUtil::slice()
	 *
	 * If the starting index comes after the ending index, the replacement
	 * is inserted at the starting index.
	 *
	 * @param string $s
	 * @param string $new
	 * @param int $i
	 * @param int|null $j
	 * @return string
	 */
	public static function replaceSlice($s, $new, $i, $j = null) {
		return self::replaceSubstring($s, $new, $i, self::_sliceLen($s, $i, $j));
	}

	private static function _sliceLen($s, $i, $j) {
		if($j === null) {
			return null;
		} elseif($j < 0) {
			if($i < 0) {
				return $j - $i;
			} else {
				return strlen($s) + $j - $i;
			}
		} else {
			if($i < 0) {
				return $j - (strlen($s) + $i);
			} else {
				return $j - $i;
			}
		}
	}

	/**
	 * Insert a string at a given offset in another string.
	 *
	 * @param string $s
	 * @param string $new
	 * @param int $offset A negative offset denotes an offset from the end
	 *                    of the string.
	 * @return string
	 */
	public static function insert($s, $new, $offset) {
		return substr_replace($s, $new, $offset, 0);
	}

	/**
	 * Pad the beginning and end of a string with another string.
	 *
	 * Symmetrically pads a string with another so that the result is `$n`
	 * characters long.
	 *
	 * @param string $s
	 * @param int $n
	 * @param string $pad
	 * @return string
	 */
	public static function pad($s, $n, $pad = ' ') {
		return str_pad($s, $n, $pad, STR_PAD_BOTH);
	}

	/**
	 * Pad the beginning of a string with another string.
	 *
	 * @param string $s
	 * @param int $n
	 * @param string $pad
	 * @return string
	 */
	public static function lpad($s, $n, $pad = ' ') {
		return str_pad($s, $n, $pad, STR_PAD_LEFT);
	}

	/**
	 * Pad the end of a string with another string.
	 *
	 * @param string $s
	 * @param int $n
	 * @param string $pad
	 * @return string
	 */
	public static function rpad($s, $n, $pad = ' ') {
		return str_pad($s, $n, $pad, STR_PAD_RIGHT);
	}

	/**
	 * Wrap a string to a certain number of columns.
	 *
	 * This "wraps" a string to a fixed number of columns by inserting a
	 * string every `$cols` characters. Inserts newlines by default.
	 *
	 * @param string $s
	 * @param int $cols
	 * @param string $sep
	 * @return string
	 */
	public static function wrap($s, $cols, $sep = "\n") {
		return wordwrap($s, $cols, $sep, true);
	}

	/**
	 * Repeat a string `$n` times.
	 *
	 * @param string $s
	 * @param int $n
	 * @return string
	 */
	public static function repeat($s, $n) {
		return str_repeat($s, $n);
	}

	/**
	 * Reverse a string.
	 *
	 * @param string $s
	 * @param string
	 */
	public static function reverse($s) {
		return strrev($s);
	}

	/**
	 * Return the part of a string starting with another string.
	 *
	 * The result includes the specified substring.
	 *
	 * @param string $s
	 * @param string $substr
	 * @return string|null Returns `null` if the string does not contain
	 *                     the substring.
	 */
	public static function startingWith($s, $substr) {
		if(strlen($substr) === 0) return $s;
		$r = strstr($s, $substr);
		return $r === false ? null : $r;
	}

	/**
	 * Like `startingWith` but case-insenstive.
	 *
	 * @see \Jitsu\StringUtil::startingWith()
	 *
	 * @param string $s
	 * @param string $substr
	 * @return string|null
	 */
	public static function istartingWith($s, $substr) {
		if(strlen($substr) === 0) return $s;
		$r = stristr($s, $substr);
		return $r === false ? null : $r;
	}

	/**
	 * Return the last part of a string starting with a certain character.
	 *
	 * Unlike `startingWith`, this only works for single characters.
	 *
	 * @param string $s
	 * @param string $char A single character.
	 * @return string|null Returns `null` if the string does not contain
	 *                     the character.
	 */
	public static function rstartingWith($s, $char) {
		$r = strrchr($s, $char);
		return $r === false ? null : $r;
	}

	/**
	 * Return the last part of a string to start with one of a number of
	 * characters.
	 *
	 * @param string $s
	 * @param string $chars Lists the characters to look for.
	 * @return string|null Returns `null` if none of the characters were
	 *                     found.
	 */
	public static function startingWithChars($s, $chars) {
		$r = strpbrk($s, $chars);
		return $r === false ? null : $r;
	}

	/**
	 * Return the part of a string up until a certain substring.
	 *
	 * @param string $s
	 * @param string $substr
	 * @return string|null Returns `null` if the string does not contain
	 *                     the substring.
	 */
	public static function preceding($s, $substr) {
		if(strlen($substr) === 0) return '';
		$r = strstr($s, $substr, true);
		return $r === false ? null : $r;
	}

	/**
	 * Like `preceding` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::preceding()
	 *
	 * @param string $s
	 * @param string $substr
	 * @return string|null
	 */
	public static function ipreceding($s, $substr) {
		if(strlen($substr) === 0) return '';
		$r = stristr($s, $substr, true);
		return $r === false ? null : $r;
	}

	/**
	 * Split a string into words.
	 *
	 * What constitutes a word character is defined by the current locale.
	 *
	 * @param string $s
	 * @param string|null $chars An optional list of additional characters
	 *                           to consider as word characters.
	 * @return string
	 */
	public static function words($s, $chars = null) {
		return str_word_count($s, 1, $chars);
	}

	/**
	 * Count the number of words in a string.
	 *
	 * @see \Jitsu\StringUtil::words()
	 *
	 * @param string $s
	 * @param string|null $chars
	 * @return int
	 */
	public static function wordCount($s, $chars = null) {
		return str_word_count($s, 0, $chars);
	}

	/**
	 * Locate the words in a string.
	 *
	 * Returns an array mapping the starting indexes of the words in the
	 * string to their corresponding words.
	 *
	 * @see \Jitsu\StringUtil::words()
	 *
	 * @param string $s
	 * @param string|null $chars
	 * @return string[]
	 */
	public static function findWords($s, $chars = null) {
		return str_word_count($s, 2, $chars);
	}

	/**
	 * Word-wrap a string.
	 *
	 * Word-wraps a string to a fixed number of columns. Words longer than
	 * the maximum width are split.
	 *
	 * @param string $s
	 * @param int $width
	 * @param string $sep Optionally provide a character other than newline
	 *                    to terminate lines.
	 * @return string
	 */
	public static function wordWrap($s, $width, $sep = "\n") {
		return wordwrap($s, $width, $sep);
	}

	/**
	 * Lexicographically compare two strings.
	 *
	 * Returns a negative number if `$a` comes before `$b`, 0 if they are
	 * the same, and a number greater than 0 if `$a` comes after `$b`.
	 *
	 * @param string $a
	 * @param string $b
	 * @return int
	 */
	public static function cmp($a, $b) {
		return strcmp($a, $b);
	}

	/**
	 * Like `cmp` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::cmp()
	 *
	 * @param string $a
	 * @param string $b
	 * @return int
	 */
	public static function icmp($a, $b) {
		return strcasecmp($a, $b);
	}

	/**
	 * Like `cmp` but only checks the first `$n` characters.
	 *
	 * @see \Jitsu\StringUtil::cmp()
	 *
	 * @param string $a
	 * @param string $b
	 * @param int $n
	 * @return int
	 */
	public static function ncmp($a, $b, $n) {
		return strncmp($a, $b, $n);
	}

	/**
	 * Like `ncmp` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::ncmp()
	 *
	 * @param string $a
	 * @param string $b
	 * @param int $n
	 * @return int
	 */
	public static function incmp($a, $b, $n) {
		return strncasecmp($a, $b, $n);
	}

	/**
	 * Like `cmp` but dependent on the current locale.
	 *
	 * @see \Jitsu\StringUtil::cmp()
	 *
	 * @param string $a
	 * @param string $b
	 * @return int
	 */
	public static function localeCmp($a, $b) {
		return strcoll($a, $b);
	}

	/**
	 * Like `cmp` but uses a human-sensible comparison.
	 *
	 * Orders strings in a way that seems more natural for human viewers
	 * (numbers are sorted in increasing order, etc.).
	 *
	 * @see \Jitsu\StringUtil::cmp()
	 *
	 * @param string $a
	 * @param string $b
	 * @return int
	 */
	public static function humanCmp($a, $b) {
		return strnatcmp($a, $b);
	}

	/**
	 * Like 'human_cmp' but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::human_cmp()
	 *
	 * @param string $a
	 * @param string $b
	 * @return int
	 */
	public static function ihumanCmp($a, $b) {
		return strnatcasecmp($a, $b);
	}

	private static function _substrCmp($a, $offset, $length, $b, $flag) {
		if($length === null) {
			$length = strlen($a) + (
				$offset < 0 ? -strlen($a) - $offset : 0
			);
		} elseif($offset < ($n = -strlen($a))) {
			$length = max($length - ($n - $offset), 0);
		}
		if(
			$length == 0 ||
			$offset >= ($an = strlen($a)) ||
			$an === 0 && $offset <= 0
		) {
			return strlen($b) === 0 ? 0 : -1;
		}
		return substr_compare($a, $b, $offset, $length, $flag);
	}

	/**
	 * Like `cmp` but uses only a substring of the first string.
	 *
	 * @see \Jitsu\StringUtil::cmp()
	 *
	 * @param string $a
	 * @param int $offset Starting offset of where comparison with `$a`
	 *                    should start. A negative offset counts from the
	 *                    end of the string.
	 * @param int|null $length Maximum length of the portion of `$a` used
	 *                         in the comparison. If `null`, comparison is
	 *                         until the of the string.
	 * @return int
	 */
	public static function substringCmp($a, $offset, $length, $b) {
		return self::_substrCmp($a, $offset, $length, $b, false);
	}

	/**
	 * Like `substringCmp` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::substringCmp()
	 *
	 * @param string $a
	 * @param int $offset
	 * @param int|null $length
	 * @param string $b
	 * @return int
	 */
	public static function isubstringCmp($a, $offset, $length, $b) {
		return self::_substrCmp($a, $offset, $length, $b, true);
	}

	/**
	 * Determine whether a string contains a certain substring.
	 *
	 * @param string $s
	 * @param string $substr
	 * @param int $offset Optionally provide a starting offset.
	 * @return bool
	 */
	public static function contains($s, $substr, $offset = 0) {
		if(strlen($substr) === 0) return true;
		return strpos($s, $substr, $offset) !== false;
	}

	/**
	 * Like `contains` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::contains()
	 *
	 * @param string $s
	 * @param string $substr
	 * @param int $offset
	 * @return bool
	 */
	public static function icontains($s, $substr, $offset = 0) {
		if(strlen($substr) === 0) return true;
		return stripos($s, $substr, $offset) !== false;
	}

	/**
	 * Determine whether a string includes one of number of characters.
	 *
	 * @param string $s
	 * @param string $chars A list of characters.
	 * @return bool
	 */
	public static function containsChars($s, $chars) {
		return strlen($chars) !== 0 && strpbrk($s, $chars) !== false;
	}

	/**
	 * Determine whether a string contains a character.
	 *
	 * @param string $s
	 * @param string $char A single character.
	 * @return bool
	 */
	public static function containsChar($s, $char) {
		return strpbrk($s, $char) !== false;
	}

	/**
	 * Determine whether a string begins with a certain prefix.
	 *
	 * @param string $s
	 * @param string $prefix
	 * @return bool
	 */
	public static function beginsWith($s, $prefix) {
		return strncmp($s, $prefix, strlen($prefix)) === 0;
	}

	/**
	 * Like `beginsWith` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::beginsWith()
	 *
	 * @param string $s
	 * @param string $prefix
	 * @return bool
	 */
	public static function ibeginsWith($s, $prefix) {
		return strncasecmp($s, $prefix, strlen($prefix)) === 0;
	}

	/**
	 * Determine whether a string ends with a certain suffix.
	 *
	 * @param string $s
	 * @param string $suffix
	 * @return bool
	 */
	public static function endsWith($s, $suffix) {
		if(($n = strlen($suffix)) === 0) {
			return true;
		}
		return self::substringCmp($s, -$n, null, $suffix) === 0;
	}

	/**
	 * Like `endsWith` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::endsWith()
	 *
	 * @param string $s
	 * @param string $suffix
	 * @return bool
	 */
	public static function iendsWith($s, $suffix) {
		if(($n = strlen($suffix)) === 0) {
			return true;
		}
		return self::isubstringCmp($s, -$n, null, $suffix) === 0;
	}

	/**
	 * Remove a prefix from a string.
	 *
	 * @param string $s
	 * @param string $prefix
	 * @return string|null Returns `null` if the subject string does not
	 *                     have the prefix.
	 */
	public static function removePrefix($s, $prefix) {
		return self::beginsWith($s, $prefix) ?
			self::substring($s, strlen($prefix)) : null;
	}

	/**
	 * Like `removePrefix`, but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::removePrefix()
	 *
	 * @param string $s
	 * @param string $prefix
	 * @return string|null
	 */
	public static function iremovePrefix($s, $prefix) {
		return self::ibeginsWith($s, $prefix) ?
			self::substring($s, strlen($prefix)) : null;
	}

	/**
	 * Remove a suffix from a string.
	 *
	 * @param string $s
	 * @param string $suffix
	 * @return string|null Returns `null` if the subject string does not
	 *                     have the suffix.
	 */
	public static function removeSuffix($s, $suffix) {
		return self::endsWith($s, $suffix) ?
			self::substring($s, 0, strlen($s) - strlen($suffix)) : null;
	}

	/**
	 * Like `removeSuffix`, but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::removeSuffix()
	 *
	 * @param string $s
	 * @param string $suffix
	 * @return string|null
	 */
	public static function iremoveSuffix($s, $suffix) {
		return self::iendsWith($s, $suffix) ?
			self::substring($s, 0, strlen($s) - strlen($suffix)) : null;
	}

	/**
	 * Determine the location of a substring within another string.
	 *
	 * @param string $s
	 * @param string $substr
	 * @param int $offset Optionally provide a starting offset.
	 * @return int|null The starting index of the substring, or `null` if
	 *                  the substring does not appear within the string.
	 */
	public static function find($s, $substr, $offset = 0) {
		return self::_find('strpos', $s, $substr, $offset);
	}

	/**
	 * Like `find` but case-insensitive.
	 *
	 * @see \Jitsu\StringUtil::find()
	 *
	 * @param string $s
	 * @param string $substr
	 * @param int $offset
	 * @return int|null
	 */
	public static function ifind($s, $substr, $offset = 0) {
		return self::_find('stripos', $s, $substr, $offset);
	}

	private static function _find($name, $s, $substr, $offset) {
		if($offset > strlen($s)) return null;
		if(strlen($substr) === 0) return $offset;
		$r = call_user_func($name, $s, $substr, $offset);
		return $r === false ? null : $r;
	}

	/**
	 * Like `find` but starts from the end of the string.
	 *
	 * @see \Jitsu\StringUtil::find()
	 *
	 * @param string $s
	 * @param string $substr
	 * @param int $offset The optional offset is the number of characters
	 *                    from the _end_ of the string.
	 * @return int|null
	 */
	public static function rfind($s, $substr, $offset = 0) {
		if($offset > strlen($s)) return null;
		if(strlen($substr) === 0) return strlen($s) - $offset;
		$r = strrpos($s, $substr, -$offset);
		return $r === false ? null : $r;
	}

	/**
	 * Get the part of a string before a certain substring.
	 *
	 * Returns the whole string if it does not contain the substring.
	 *
	 * @param string $s
	 * @param string $substr
	 * @return string
	 */
	public static function before($s, $substr) {
		if(strlen($substr) === 0) return '';
		$pos = strpos($s, $substr);
		return $pos === false ? $s : substr($s, 0, $pos);
	}

	/**
	 * Get the part of a string after the last occurrence of a certain
	 * substring.
	 *
	 * Returns the whole string if it does not contain that substring.
	 *
	 * @param string $s
	 * @param string $substr
	 * @return string
	 */
	public static function after($s, $substr) {
		$pos = self::rfind($s, $substr);
		if($pos === null) {
			return $s;
		} else {
			$len = $pos + strlen($substr);
			if($len === strlen($s)) {
				return '';
			} else {
				return substr($s, $len);
			}
		}
	}

	/**
	 * Determine whether all characters in a string are lower case.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isLower($s) {
		return ctype_lower($s);
	}

	/**
	 * Determine whether all characters in a string are upper case.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isUpper($s) {
		return ctype_upper($s);
	}

	/**
	 * Determine whether all characters in a string are alphanumeric.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isAlphanumeric($s) {
		return ctype_alnum($s);
	}

	/**
	 * Determine whether all characters in a string are alphabetic.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isAlphabetic($s) {
		return ctype_alpha($s);
	}

	/**
	 * Determine whether all characters in a string are control characters.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isControl($s) {
		return ctype_cntrl($s);
	}

	/**
	 * Determine whether all characters in a string are decimal digits.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isDecimal($s) {
		return ctype_digit($s);
	}

	/**
	 * Determine whether all characters in a string are hexadecimal digits.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isHex($s) {
		return ctype_xdigit($s);
	}

	/**
	 * Determine whether all characters in a string are visible characters.
	 *
	 * Whitespace and control characters are not visible characters.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isVisible($s) {
		return ctype_graph($s);
	}

	/**
	 * Determine whether all characters in a string have printable output.
	 *
	 * Control characters do not have printable output.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isPrintable($s) {
		return ctype_print($s);
	}

	/**
	 * Determine whether all characters in a string are punctuation.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isPunctuation($s) {
		return ctype_punct($s);
	}

	/**
	 * Determine whether all characters in a string are whitespace.
	 *
	 * @param string $s
	 * @return bool Returns `false` if `$s` is empty.
	 */
	public static function isWhitespace($s) {
		return ctype_space($s);
	}

	/**
	 * Count the number of times a string contains a substring.
	 *
	 * Excludes overlaps.
	 *
	 * @param string $s
	 * @param string $substr
	 * @param int Optionally provide a starting offset.
	 * @param int|null Optionally provide a maximum length.
	 * @return int
	 */
	public static function count($s, $substr, $offset = 0, $length = null) {
		if(strlen($substr) === 0) {
			if($offset > strlen($s)) {
				return 0;
			} else {
				$r = strlen($s) - $offset;
				if($length !== null) $r = min($r, $length);
				return $r + 1;
			}
		} else {
			if($offset >= strlen($s)) {
				return 0;
			} else {
				if($length === null) {
					return substr_count($s, $substr, $offset);
				} else {
					$length = min(strlen($s) - $offset, $length);
					if($length === 0) {
						return 0;
					} else {
						return substr_count($s, $substr, $offset, $length);
					}
				}
			}
		}
	}

	/**
	 * Count a number of matching characters at the beginning of a string.
	 *
	 * Determines the length of the initial segment of a string which
	 * contains only the characters listed in `$chars`.
	 *
	 * @param string $s
	 * @param string $chars A list of characters.
	 * @param int $begin Optionally provide a starting offset.
	 * @param int|null $end Optionally provide an ending offset.
	 * @return int
	 */
	public static function span($s, $chars, $begin = 0, $end = null) {
		if($end === null) {
			return strspn($s, $chars, $begin);
		} else {
			return strspn($s, $chars, $begin, $end);
		}
	}

	/**
	 * Escape a string C-style.
	 *
	 * Escapes a string by adding backslashes in front of certain
	 * characters and encoding non-printable characters with octal codes,
	 * just like in C string literals.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function escapeCString($s) {
		return addcslashes($s, "\n\r\t\v\f\"'\\");
	}

	/**
	 * Un-escape the contents of a C-style string literal.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function unescapeCString($s) {
		return stripcslashes($s);
	}

	/**
	 * Escape a string PHP-style.
	 *
	 * Escapes a string by placing backslashes before special characters as
	 * required by PHP.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function escapePHPString($s) {
		return addslashes($s);
	}

	/**
	 * Remove all backslash (`\`) escape characters from a string.
	 *
	 * Note that this does not interpret `\n` as a newline, '\t' as tab,
	 * etc., but as the literal characters `n`, `t`, etc.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function unescapeBackslashes($s) {
		return stripslashes($s);
	}

	/**
	 * Parse a string as an integer according to a certain base.
	 *
	 * If `$base` is `null`, the base is deduced from the prefix of the
	 * string (`0x` for hexadecimal, `0` for octal, and decimal otherwise).
	 * Ignores any invalid trailing characters.
	 *
	 * @param string $s
	 * @param int|null $base
	 * @return string
	 */
	public static function parseInt($s, $base = null) {
		return intval($s, $base === null ? 0 : $base);
	}

	/**
	 * Parse a floating-point value.
	 *
	 * @param string $s
	 * @return string
	 * @throws RuntimeException Thrown if `$s` is not a valid float string.
	 */
	public static function parseReal($s) {
		if(is_numeric($s)) {
			return floatval($s);
		} else {
			throw new \RuntimeException('invalid real number string');
		}
	}

	/**
	 * Convert a binary string to a hexadecimal string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function encodeHex($s) {
		return bin2hex($s);
	}

	/**
	 * Parse a hexadecimal string into binary data.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function decodeHex($s) {
		return hex2bin($s);
	}

	/**
	 * Encode a binary string in base 64.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function encodeBase64($s) {
		return base64_encode($s);
	}

	/**
	 * Decode a base 64 string to binary.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function decodeBase64($s) {
		return base64_decode($s);
	}

	/**
	 * Convert an ASCII codepoint to the corresponding character.
	 *
	 * @param int $n
	 * @return string A single character.
	 */
	public static function fromASCII($n) {
		return chr($n);
	}

	/**
	 * Alias for `from_ascii`.
	 *
	 * @see \Jitsu\StringUtil::from_ascii()
	 *
	 * @param int $n
	 * @return string
	 */
	public static function chr($n) {
		return chr($n);
	}

	/**
	 * Convert a character to its ASCII codepoint.
	 *
	 * @param string $c A single character.
	 * @return int
	 */
	public static function toASCII($c) {
		return ord($c);
	}

	/**
	 * Alias for `to_ascii`.
	 *
	 * @see \Jitsu\StringUtil::to_ascii()
	 *
	 * @param string $c
	 * @return int
	 */
	public static function ord($c) {
		return ord($c);
	}

	/**
	 * Count the frequencies of the 256 possible byte values in a string.
	 *
	 * @param string $s
	 * @return int[] Maps each byte value (0-255) to the number of its
	 *               occurences in `$s`.
	 */
	public static function byteFrequencies($s) {
		return count_chars($s);
	}

	/**
	 * List all of the unique byte values in a string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function unique($s) {
		return count_chars($s, 3);
	}

	/**
	 * List all byte values which do not occur in a string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function unusedBytes($s) {
		return count_chars($s, 4);
	}

	/**
	 * Escape special HTML characters with character entities.
	 *
	 * @param string $s
	 * @param bool $noquote Whether double quotes (`"`) will be left
	 *                      un-escaped.
	 * @return string
	 */
	public static function encodeHTML($s, $noquote = false) {
		return htmlspecialchars(
			$s,
			($noquote ? ENT_NOQUOTES : ENT_COMPAT) | ENT_HTML5,
			'UTF-8'
		);
	}

	/**
	 * Alias of `encodeHTML`.
	 *
	 * @see \Jitsu\StringUtil::encodeHTML()
	 *
	 * @param string $s
	 * @param bool $noquote
	 * @return string
	 */
	public static function escapeHTML() {
		return call_user_func_array(
			array('self', 'encodeHTML'),
			func_get_args()
		);
	}

	/**
	 * Inverse of `encodeHTML`.
	 *
	 * The term "unencode" is used here as opposed to "decode" to emphasize
	 * the fact that this function is not suitable for decoding arbitrary
	 * HTML text, but rather HTML encoded by `encodeHTML` using only a
	 * minimal set of named character entity codes. This function does not
	 * recognize named entities except for those encoded by `encodeHTML`
	 * as well as `&apos;`. It will decode numeric entities except for
	 * those corresponding to non-printable characters, which it will leave
	 * encoded.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function unencodeHTML($s) {
		return html_entity_decode($s, ENT_QUOTES | ENT_HTML5);
	}

	/**
	 * Generate a minimal replacement dictionary for escaping special HTML
	 * characters using their HTML5 character entities.
	 *
	 * @param bool $noquote Whether the double quote (`"`) will be omitted.
	 * @return string[]
	 */
	public static function encodeHTMLDict($noquote = false) {
		return get_html_translation_table(
			HTML_SPECIALCHARS,
			($noquote ? ENT_NOQUOTES : ENT_COMPAT) | ENT_HTML5,
			'UTF-8'
		);
	}

	/**
	 * Replace characters in a string with their equivalent HTML5 named
	 * character entities wherever possible.
	 *
	 * This ability is not particularly useful, and `encodeHTML` should
	 * be preferred instead for efficiency.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function encodeHTMLEntities($s) {
		return htmlentities(
			$s,
			(ENT_QUOTES | ENT_SUBSTITUTE | ENT_DISALLOWED | ENT_HTML5),
			'UTF-8'
		);
	}

	/**
	 * Generate the (fairly large) replacement dictionary for encoding
	 * characters to named HTML5 character entities wherever possible.
	 *
	 * @return string[] Maps characters to character entities.
	 */
	public static function encodeHTMLEntitiesDict() {
		return get_html_translation_table(
			HTML_ENTITIES,
			ENT_QUOTES | ENT_HTML5,
			'UTF-8'
		);
	}

	/**
	 * Strip HTML and PHP tags from a string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function stripTags($s) {
		return strip_tags($s);
	}

	/**
	 * URL-decode and parse a query string.
	 *
	 * Note that this assumes the PHP convention of parameter names ending
	 * with `[]` to denote arrays of values; in cases where parameters
	 * share the same name, only the last one is included.
	 *
	 * Also note that this automatically URL-decodes the query string; it
	 * is incorrect to use this on a string which is not URL-encoded.
	 *
	 * @param string $s
	 * @return string[] Maps parameter names to string values.
	 */
	public static function parseRawQueryString($s) {
		parse_str($s, $result);
		return $result;
	}

	/**
	 * Format and URL-encode data as a query string.
	 *
	 * This adheres to the standard which does not encode spaces as `+`.
	 *
	 * @see \Jitsu\StringUtil::encodeQueryString() For compatibility
	 *          reasons, `encodeQueryString` should be preferred.
	 *
	 * @param array|object $data The data to encode in the query string.
	 * @param string $sep Optionally provide a separator other than `&`,
	 *                    such as `;`.
	 * @return string
	 */
	public static function encodeStandardQueryString($data, $sep = '&') {
		return http_build_query($data, '', $sep, PHP_QUERY_RFC3986);
	}

	/**
	 * Format and URL-encode data as a query string, encoding spaces as
	 * `+`.
	 *
	 * @param array|object $data The data to encode in the query string.
	 * @param string $sep Optionally provide a separator other than `&`,
	 *                    such as `;`.
	 * @return string
	 */
	public static function encodeQueryString($data, $sep = '&') {
		return http_build_query($data, '', $sep);
	}

	/**
	 * URL-encode a string.
	 *
	 * This adheres to the standard which does not encode spaces as `+`.
	 *
	 * @see \Jitsu\StringUtil::encodeURL() For compatibility
	 *          reasons, `encodeURL` should be preferred.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function encodeStandardURL($s) {
		return rawurlencode($s);
	}

	/**
	 * Decode a URL-encoded string.
	 *
	 * This adheres to the standard which does not encode spaces as `+`.
	 *
	 * @see \Jitsu\StringUtil::decodeURL() For compatibility
	 *          reasons, `decodeURL` should be preferred.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function decodeStandardURL($s) {
		return rawurldecode($s);
	}

	/**
	 * URL-encode a string, using `+` to encode spaces.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function encodeURL($s) {
		return urlencode($s);
	}

	/**
	 * Decode a URL-encoded string, treating `+` as space.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function decodeURL($s) {
		return urldecode($s);
	}

	/**
	 * Parse a CSV line into an array.
	 *
	 * @param string $s
	 * @param string $delim Optional delimiter character. Default is `,`.
	 * @param string $quote Optional enclosure (quote) character. Default
	 *                      is `"`.
	 * @param string $escape Optional escape character. Default is `\\`.
	 */
	public static function parseCSV(/* $s, $delim, $quote, $escape */) {
		return call_user_func_array(
			'str_getcsv',
			func_get_args()
		);
	}

	/**
	 * Compute the MD5 hash of a string as a 16-byte binary string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function md5($s) {
		return md5($s, true);
	}

	/**
	 * Compute the MD5 hash of a string as a hex string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function md5Hex($s) {
		return md5($s, false);
	}

	/**
	 * Compute the SHA1 hash of a string as a 20-byte binary string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function sha1($s) {
		return sha1($s, true);
	}

	/**
	 * Compute the SHA1 hash of a string as a hex string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function sha1Hex($s) {
		return sha1($s, false);
	}

	/**
	 * Apply rot13 encryption to a string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function rot13($s) {
		return str_rot13($s);
	}

	/**
	 * Randomly shuffle the characters of a string.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function shuffle($s) {
		return str_shuffle($s);
	}

	/**
	 * Format a number as a currency value using the current locale.
	 *
	 * Note that this requires setting the locale using
	 * `setlocale(LC_ALL, $locale)` or `setlocale(LC_MONETARY, $locale)`
	 * for some locale that is installed on the system.
	 *
	 * @param int|float $amount
	 * @return string
	 */
	public static function formatMoney($amount) {
		return money_format('%n', $amount);
	}

	/**
	 * Format a number with commas and a decimal point.
	 *
	 * @param int|float $number
	 * @param int Optional number of decimal placed. Default is 0.
	 * @param string Optional decimal point character. Default is `.`.
	 * @param string Optional thousands separator. Default is `,`.
	 * @return string
	 */
	public static function formatNumber(
		/* $number, $decimals, $decimal_point, $thousands_sep */)
	{
		return call_user_func_array(
			'number_format',
			func_get_args()
		);
	}

	/**
	 * Compute the Levenshtein distance between two strings.
	 *
	 * The Levenshtein distance is the minimum number of character
	 * replacements, insertions, and deletions necessary to transform `$s1`
	 * into `$s2`.
	 *
	 * @param string $s1
	 * @param string $s2
	 * @param int $ins Optional cost per insertion.
	 * @param int $repl Optional cost per replacement.
	 * @param int $del Optional cost per deletion.
	 * @return int
	 */
	public static function levenshtein(/* $s1, $s2, [$ins, $repl, $del] */) {
		return call_user_func_array(
			'levenshtein',
			func_get_args()
		);
	}

	/**
	 * Split a string in camel case into its components.
	 *
	 * Runs of consecutive capital letters are treated as acronyms and are
	 * grouped accordingly.
	 *
	 * For example, the string "XMLHttpRequest" would be split into "XML",
	 * "Http", "Request".
	 *
	 * @param string $s
	 * @return string
	 */
	public static function splitCamelCase($s) {
		return preg_split('/(?<=[^A-Z])(?=[A-Z])|(?<=[A-Z])(?=[A-Z][a-z])/', $s);
	}

	/**
	 * Convert an English word to its plural or "-s" form.
	 *
	 * One could use this to form the plural form of a noun or the third
	 * person singular form of a verb.
	 *
	 * This uses a naive algorithm which will not work for irregular forms
	 * and for certain other cases. However, it knows enough to convert
	 * common endings like "-y" to "-ies", "-s" to "-ses", and so on.
	 *
	 * @param string $s
	 * @return string
	 */
	public static function pluralize($s) {
		// Vowel y
		// -y => -ies
		$result = preg_replace('/([^aeiou])y$/', '$1ies', $s, 1, $count);
		if($count) return $result;

		// Sibilants
		// -s, -z, -x, -j, -sh, -tch, -zh => -ses, -zes, etc.
		// Note that this will fail for hard ch sometimes,
		// as in the word "hierarchs"
		$result = preg_replace('/([^aeiouy]ch|[sz]h|[szxj])$/', '$1es', $s, 1, $count);
		if($count) return $result;

		// Simple addition of s
		// - => -s
		return $s . 's';
	}

	/**
	 * Capture all output printed in a callback.
	 *
	 * Uses PHP output buffering to capture all of the output `echo`ed in
	 * a callback. If the callback throws an exception, the output will be
	 * ignored, and the exception will be re-thrown.
	 *
	 * @param callable $callback
	 * @return string
	 * @throws \Exception Whatever `$callback` throws.
	 */
	public static function capture($callback) {
		ob_start();
		try {
			call_user_func($callback);
		} catch(\Exception $e) {
			ob_end_clean();
			throw $e;
		}
		return ob_get_clean();
	}
}
