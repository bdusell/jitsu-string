<?php

namespace Jitsu\Tests;

use Jitsu\StringUtil as s;

class StringUtilTest extends \PHPUnit_Framework_TestCase {

	private function eq($a, $b) {
		return $this->assertEquals($a, $b);
	}

	private function ne($a, $b) {
		return $this->assertNotEquals($a, $b);
	}

	private function lt($a, $b) {
		return $this->assertGreaterThanOrEqual($a, $b);
	}

	private function gt($a, $b) {
		return $this->assertLessThanOrEqual($a, $b);
	}

	public function testLength() {
		$this->eq(s::length('aaa'), 3);
		$this->eq(s::length(''), 0);
		$this->eq(s::size(''), 0);
	}

	public function testEqual() {
		$this->eq(s::equal('aaa', 'aaa'), true);
		$this->eq(s::equal('aaa', 'bbb'), false);
		$this->eq(s::equal('', ''), true);
		$this->eq(s::equal('aaa', 'AAA'), false);
	}

	public function testIequal() {
		$this->eq(s::iequal('aaa', 'AAA'), true);
		$this->eq(s::iequal('aaa', 'bbb'), false);
		$this->eq(s::iequal('', ''), true);
	}

	public function testChars() {
		$this->eq(s::chars('abc'), array('a', 'b', 'c'));
		$this->eq(s::chars(''), array());
	}

	public function testChunks() {
		$this->eq(
			s::chunks('abcde', 2),
			array('ab', 'cd', 'e')
		);
		$this->eq(
			s::chunks('abc', 4),
			array('abc')
		);
		$this->eq(
			s::chunks('', 3),
			array()
		);
	}

	public function testSplit() {
		$this->eq(s::split('a b'), array('a', 'b'));
		$this->eq(s::split(''), array());
		$this->eq(s::split('  a  b  '), array('a', 'b'));
		$this->eq(s::split(" \tabc\n  "), array('abc'));
		$this->eq(s::split('aba', 'b'), array('a', 'a'));
		$this->eq(s::split('a', 'a'), array('', ''));
		$this->eq(s::split('abbaba', 'bb'), array('a', 'aba'));
		$this->eq(s::split('ababa', 'b', 1), array('a', 'aba'));
		$this->eq(s::split('ababa', 'b', -1), array('a', 'a'));
	}

	public function testTokenize() {
		$this->eq(s::tokenize('xabcxyabc', 'abc'), array('x', 'xy'));
		$this->eq(s::tokenize('abcabc', 'abc'), array());
		$this->eq(s::tokenize('', 'abc'), array());
		$this->eq(s::tokenize('', ''), array());
	}

	public function testJoin() {
		$this->eq(s::join(array('a', 'b', 'c')), 'abc');
		$this->eq(s::join(' ', array('a', 'b', 'c')), 'a b c');
	}

	public function testTrim() {
		$this->eq(s::trim('   a   '), 'a');
		$this->eq(s::trim("\n\ta "), 'a');
		$this->eq(s::trim('   a'), 'a');
		$this->eq(s::trim('a   '), 'a');
		$this->eq(s::trim('a'), 'a');
		$this->eq(s::trim('  a   a  '), 'a   a');
		$this->eq(s::trim(''), '');
		$this->eq(s::trim('abcxyzcba', 'abc'), 'xyz');
	}

	public function testRtrim() {
		$this->eq(s::rtrim('  a  '), '  a');
		$this->eq(s::rtrim('abcxyzcba', 'abc'), 'abcxyz');
		$this->eq(s::rtrim(''), '');
	}

	public function testLtrim() {
		$this->eq(s::ltrim('  a  '), 'a  ');
		$this->eq(s::ltrim('abcxyzcba', 'abc'), 'xyzcba');
		$this->eq(s::ltrim(''), '');
	}

	public function testLower() {
		$this->eq(s::lower('ABC'), 'abc');
		$this->eq(s::lower('abc'), 'abc');
		$this->eq(s::lower(':;"'), ':;"');
		$this->eq(s::lower('AbC'), 'abc');
		$this->eq(s::lower(''), '');
	}

	public function testUpper() {
		$this->eq(s::upper('abc'), 'ABC');
		$this->eq(s::upper('ABC'), 'ABC');
		$this->eq(s::upper(''), '');
	}

	public function testLcfirst() {
		$this->eq(s::lcfirst('ABC'), 'aBC');
		$this->eq(s::lcfirst('FooBar'), 'fooBar');
		$this->eq(s::lcfirst(''), '');
		$this->eq(s::lowerFirst('ABC'), 'aBC');
	}

	public function testUcfirst() {
		$this->eq(s::ucfirst('abc'), 'Abc');
		$this->eq(s::ucfirst(''), '');
		$this->eq(s::upperFirst('abc'), 'Abc');
	}

	public function testUcwords() {
		$this->eq(s::ucwords('alpha beta gamma'),
			'Alpha Beta Gamma');
		$this->eq(s::ucwords(''), '');
		$this->eq(s::capitalizeWords('alpha beta gamma'),
			'Alpha Beta Gamma');
	}

	public function testReplace() {
		$this->eq(s::replace('abcxabc', 'x', 'y'), 'abcyabc');
		$this->eq(s::replace('afoobara', 'foobar', 'b'), 'aba');
		$this->eq(s::replace('aaxyaaaxya', 'xy', 'b'), 'aabaaaba');
		$this->eq(s::replace('', 'abc', ''), '');
		$this->eq(s::replace('abc', '', 'x'), 'xaxbxcx');
		$this->eq(s::replace('', '', 'x'), 'x');
	}

	public function testReplaceCount() {
		$this->eq(s::replaceCount('abcxabc', 'x', 'y'),
			array('abcyabc', 1));
		$this->eq(s::replaceCount('afoobara', 'foobar', 'b'),
			array('aba', 1));
		$this->eq(s::replaceCount('aaxyaaaxya', 'xy', 'b'),
			array('aabaaaba', 2));
		$this->eq(s::replaceCount('', 'abc', ''),
			array('', 0));
		$this->eq(s::replaceCount('abc', '', 'x'),
			array('xaxbxcx', 4));
		$this->eq(s::replaceCount('', '', 'x'),
			array('x', 1));
	}

	public function testIreplace() {
		$this->eq(s::ireplace('abcXabc', 'x', 'y'), 'abcyabc');
		$this->eq(s::ireplace('afoOBara', 'foobar', 'b'), 'aba');
		$this->eq(s::ireplace('aaxYaaaXya', 'xy', 'b'), 'aabaaaba');
		$this->eq(s::ireplace('', 'abc', ''), '');
		$this->eq(s::ireplace('abc', '', 'x'), 'xaxbxcx');
		$this->eq(s::ireplace('', '', 'x'), 'x');
	}

	public function testIreplaceCount() {
		$this->eq(s::ireplaceCount('abcXabc', 'x', 'y'),
			array('abcyabc', 1));
		$this->eq(s::ireplaceCount('afoOBara', 'foobar', 'b'),
			array('aba', 1));
		$this->eq(s::ireplaceCount('aaxYaaaXya', 'xy', 'b'),
			array('aabaaaba', 2));
		$this->eq(s::ireplaceCount('', 'abc', ''),
			array('', 0));
		$this->eq(s::ireplaceCount('abc', '', 'x'),
			array('xaxbxcx', 4));
		$this->eq(s::ireplaceCount('', '', 'x'),
			array('x', 1));
	}

	public function testReplaceMultiple() {
		$this->eq(
			s::replaceMultiple(':one :two', array(
				':one' => 'a',
				':two' => 'b'
			)),
			'a b'
		);
		$this->eq(
			s::replaceMultiple(':one :two', array(
				':one' => ':one :two',
				':two' => 'b'
			)),
			':one :two b'
		);
		$this->eq(
			s::replaceMultiple('', array(
				'a' => 'b',
				'b' => 'c'
			)),
			''
		);
		$this->eq(
			s::replaceMultiple('abcdef', array()),
			'abcdef'
		);
	}

	public function testTranslate() {
		$this->eq(s::translate('abcba', 'abc', '123'), '12321');
		$this->eq(s::translate('', 'abc', '123'), '');
		$this->eq(s::translate('abc', '', ''), 'abc');
	}

	public function testSubstring() {
		$this->eq(s::substring('abcdef', 2, 3), 'cde');
		$this->eq(s::substring('abcdef', 2), 'cdef');
		$this->eq(s::substring('abcdef', 2, 1000), 'cdef');
		$this->eq(s::substring('abcdef', 1000), '');
		$this->eq(s::substring('abcdef', 1000, 3), '');
		$this->eq(s::substring('abcdef', 2, 0), '');
		$this->eq(s::substring('abcdef', -2), 'ef');
		$this->eq(s::substring('abcdef', -4, 2), 'cd');
		$this->eq(s::substring('abcdef', -1000), 'abcdef');
		$this->eq(s::substring('abcdef', -7, 3), 'ab');
		$this->eq(s::substring('', 2, 4), '');
	}

	public function testReplaceSubstring() {
		$this->eq(s::replaceSubstring('abcdef', 'x', 2, 3), 'abxf');
		$this->eq(s::replaceSubstring('abcdef', 'x', 2), 'abx');
		$this->eq(s::replaceSubstring('abcdef', 'x', 2, 1000), 'abx');
		$this->eq(s::replaceSubstring('abcdef', 'x', 1000), 'abcdefx');
		$this->eq(s::replaceSubstring('abcdef', 'x', 1000, 3), 'abcdefx');
		$this->eq(s::replaceSubstring('abcdef', 'x', 2, 0), 'abxcdef');
		$this->eq(s::replaceSubstring('abcdef', 'x', -2), 'abcdx');
		$this->eq(s::replaceSubstring('abcdef', 'x', -4, 2), 'abxef');
		$this->eq(s::replaceSubstring('abcdef', 'x', -1000), 'x');
		$this->eq(s::replaceSubstring('abcdef', 'x', -1000, -100), 'xabcdef');
		$this->eq(s::replaceSubstring('abcdef', 'x', -7, 3), 'xcdef');
		$this->eq(s::replaceSubstring('', 'x', 2, 4), 'x');
	}

	public function testSlice() {
		$this->eq(s::slice('abcdef', 1, 3), 'bc');
		$this->eq(s::slice('abcdef', 3, 4), 'd');
		$this->eq(s::slice('abcdef', 3, 3), '');
		$this->eq(s::slice('abcdef', 3, 2), '');
		$this->eq(s::slice('abcdef', 2), 'cdef');
		$this->eq(s::slice('abcdef', 2, 1000), 'cdef');
		$this->eq(s::slice('abcdef', 1000), '');
		$this->eq(s::slice('abcdef', 1000, 4), '');
		$this->eq(s::slice('abcdef', 1000, 2000), '');
		$this->eq(s::slice('abcdef', 0, -2), 'abcd');
		$this->eq(s::slice('abcdef', 1, -1), 'bcde');
		$this->eq(s::slice('abcdef', 3, -3), '');
		$this->eq(s::slice('abcdef', 4, -5), '');
		$this->eq(s::slice('abcdef', -4, -2), 'cd');
		$this->eq(s::slice('abcdef', -4, 4), 'cd');
		$this->eq(s::slice('abcdef', -1000), 'abcdef');
		$this->eq(s::slice('abcdef', -1000, -2), 'abcd');
		$this->eq(s::slice('abcdef', -1000, -100), '');
		$this->eq(s::slice('', 3, 5), '');
	}

	public function testReplaceSlice() {
		$this->eq(s::replaceSlice('abcdef', 'x', 2, 4), 'abxef');
		$this->eq(s::replaceSlice('abcdef', 'x', 2), 'abx');
		$this->eq(s::replaceSlice('abcdef', 'x', 2, 1000), 'abx');
		$this->eq(s::replaceSlice('abcdef', 'x', 1000), 'abcdefx');
		$this->eq(s::replaceSlice('abcdef', 'x', 1000, 1003), 'abcdefx');
		$this->eq(s::replaceSlice('abcdef', 'x', 1000, 3), 'abcdefx');
		$this->eq(s::replaceSlice('abcdef', 'x', 2, 2), 'abxcdef');
		$this->eq(s::replaceSlice('abcdef', 'x', -2), 'abcdx');
		$this->eq(s::replaceSlice('abcdef', 'x', -4, 4), 'abxef');
		$this->eq(s::replaceSlice('abcdef', 'x', -1000), 'x');
		$this->eq(s::replaceSlice('abcdef', 'x', -1000, -100), 'xabcdef');
		$this->eq(s::replaceSlice('abcdef', 'x', -7, -4), 'xcdef');
		$this->eq(s::replaceSlice('', 'x', 2, 4), 'x');
	}

	public function testInsert() {
		$this->eq(s::insert('abcdef', 'x', 2), 'abxcdef');
		$this->eq(s::insert('abcdef', 'x', -2), 'abcdxef');
		$this->eq(s::insert('abcdef', 'x', 100), 'abcdefx');
		$this->eq(s::insert('abcdef', 'x', -100), 'xabcdef');
		$this->eq(s::insert('', 'x', 5), 'x');
	}

	public function testPad() {
		$this->eq(s::pad('x', 5), '  x  ');
		$this->eq(s::pad('x', 9, 'yy'), 'yyyyxyyyy');
	}

	public function testLpad() {
		$this->eq(s::lpad('x', 5), '    x');
		$this->eq(s::lpad('x', 6, 'yz'), 'yzyzyx');
	}

	public function testRpad() {
		$this->eq(s::rpad('x', 5), 'x    ');
		$this->eq(s::rpad('x', 6, 'abc'), 'xabcab');
	}

	public function testWrap() {
		$this->eq(s::wrap('abcdef', 2), "ab\ncd\nef");
		$this->eq(s::wrap('abcdef', 10), 'abcdef');
		$this->eq(s::wrap('abcdefg', 3, 'x'), 'abcxdefxg');
	}

	public function testRepeat() {
		$this->eq(s::repeat('x', 5), 'xxxxx');
		$this->eq(s::repeat('x', 0), '');
		$this->eq(s::repeat('abc', 2), 'abcabc');
	}

	public function testReverse() {
		$this->eq(s::reverse('abcdef'), 'fedcba');
		$this->eq(s::reverse(''), '');
	}

	public function testStartingWith() {
		$this->eq(s::startingWith('abcdef', 'cd'), 'cdef');
		$this->eq(s::startingWith('abcdef', ''), 'abcdef');
		$this->eq(s::startingWith('abcdef', 'xyz'), null);
		$this->eq(s::startingWith('aaxaaxaa', 'x'), 'xaaxaa');
	}

	public function testIstartingWith() {
		$this->eq(s::istartingWith('abCdef', 'cd'), 'Cdef');
	}

	public function testRstartingWith() {
		$this->eq(s::rstartingWith('aaxaa', 'x'), 'xaa');
		$this->eq(s::rstartingWith('aaxaaxaa', 'x'), 'xaa');
		$this->eq(s::rstartingWith('abcdef', 'x'), null);
	}

	public function testStartingWithChars() {
		$this->eq(s::startingWithChars('aaxxaa', 'x'), 'xxaa');
		$this->eq(s::startingWithChars('aayxaa', 'xy'), 'yxaa');
	}

	public function testPreceding() {
		$this->eq(s::preceding('abcdef', 'c'), 'ab');
		$this->eq(s::preceding('abcdef', 'x'), null);
		$this->eq(s::preceding('abcdef', 'de'), 'abc');
		$this->eq(s::preceding('abcdef', ''), '');
	}

	public function testIpreceding() {
		$this->eq(s::ipreceding('aBcDef', 'cde'), 'aB');
		$this->eq(s::ipreceding('abCdEf', 'x'), null);
	}

	public function testWords() {
		$this->eq(s::words('these are words'),
			array('these', 'are', 'words'));
		$this->eq(s::words("  these   are\n\twords  \n"),
			array('these', 'are', 'words'));
		$this->eq(s::words(''), array());
		$this->eq(s::words("  \tabc  \t\n  ", "\n\t"),
			array("\tabc", "\t\n"));
	}

	public function testWordCount() {
		$this->eq(s::wordCount('these are words'), 3);
		$this->eq(s::wordCount("  \nsome\t\twords  "), 2);
		$this->eq(s::wordCount('   '), 0);
		$this->eq(s::wordCount(''), 0);
		$this->eq(s::wordCount(" \n \n ", "\n"), 2);
	}

	public function testFindWords() {
		$this->eq(s::findWords('a b c'),
			array(0 => 'a', 2 => 'b', 4 => 'c'));
		$this->eq(s::findWords(''),
			array());
		$this->eq(s::findWords("  \n  ", "\n"),
			array(2 => "\n"));
	}

	public function testWordWrap() {
		$this->eq(s::wordWrap('abc def ghi', 5),
			"abc\ndef\nghi");
		$this->eq(s::wordWrap('', 5), '');
		$this->eq(s::wordWrap('abc def ghi', 8),
			"abc def\nghi");
		$this->eq(s::wordWrap('abc def', 5, 'X'),
			'abcXdef');
	}

	public function testCmp() {
		$this->eq(s::cmp('', ''), 0);
		$this->lt(s::cmp('aaa', 'aaaa'), 0);
		$this->lt(s::cmp('aaa', 'aab'), 0);
		$this->gt(s::cmp('bbb', 'aaa'), 0);
		$this->eq(s::cmp('aaa', 'aaa'), 0);
	}

	public function testIcmp() {
		$this->eq(s::icmp('', ''), 0);
		$this->eq(s::icmp('aaa', 'AAA'), 0);
		$this->lt(s::icmp('aaa', 'bbb'), 0);
		$this->lt(s::icmp('aaa', 'BBB'), 0);
	}

	public function testNcmp() {
		$this->eq(s::ncmp('abc', 'abcdef', 3), 0);
		$this->lt(s::ncmp('abc', 'abcdef', 5), 0);
		$this->eq(s::ncmp('', '', 5), 0);
		$this->eq(s::ncmp('abc', 'def', 0), 0);
	}

	public function testIncmp() {
		$this->eq(s::incmp('abcdef', 'ABCdefghi', 6), 0);
		$this->eq(s::incmp('', '', 10), 0);
		$this->eq(s::incmp('fsdfgf', 'gfsd', 0), 0);
		$this->lt(s::incmp('abcxxx', 'ABDxxx', 3), 0);
	}

	public function testLocaleCmp() {
		$this->eq(s::localeCmp('', ''), 0);
		$this->eq(s::localeCmp('a', 'a'), 0);
		$this->lt(s::localeCmp('a', 'b'), 0);
	}

	public function testHumanCmp() {
		$this->eq(s::humanCmp('', ''), 0);
		$this->lt(s::humanCmp('test9', 'test10'), 0);
	}

	public function testIhumanCmp() {
		$this->eq(s::ihumanCmp('', ''), 0);
		$this->lt(s::ihumanCmp('TEST9', 'test10'), 0);
		$this->lt(s::ihumanCmp('test9', 'TEST10'), 0);
	}

	public function testSubstringCmp() {
		$this->eq(s::substringCmp('xabcx', 1, 3, 'abc'), 0);
		$this->ne(s::substringCmp('xabcx', 1, 3, 'def'), 0);
		$this->lt(s::substringCmp('xabcx', 1, 0, 'xyz'), 0);
		$this->eq(s::substringCmp('xabcx', 1, 0, ''), 0);
		$this->eq(s::substringCmp('xxabc', 2, 5, 'abc'), 0);
		$this->lt(s::substringCmp('xxabc', 2, 5, 'abcd'), 0);
		$this->eq(s::substringCmp('xxxxx', 5, 5, ''), 0);
		$this->lt(s::substringCmp('xxxxx', 5, 5, 'a'), 0);
		$this->eq(s::substringCmp('xabcx', 10, 5, ''), 0);
		$this->lt(s::substringCmp('xabcx', 10, 5, 'xyz'), 0);
		$this->eq(s::substringCmp('xxabc', 2, null, 'abc'), 0);
		$this->eq(s::substringCmp('xxabc', -3, null, 'abc'), 0);
		$this->eq(s::substringCmp('abcxx', -7, 5, 'abc'), 0);
		$this->eq(s::substringCmp('abcde', -7, null, 'abcde'), 0);
		$this->eq(s::substringCmp('abcde', -15, 5, ''), 0);
		$this->eq(s::substringCmp('abcde', -15, null, 'abcde'), 0);
		$this->lt(s::substringCmp('', 0, 1, 'abc'), 0);
		$this->lt(s::substringCmp('', -5, 1, 'abc'), 0);
		$this->lt(s::substringCmp('', -3, null, 'abc'), 0);
	}

	public function testIsubstringCmp() {
		$this->eq(s::isubstringCmp('xabcx', 1, 3, 'ABC'), 0);
		$this->ne(s::isubstringCmp('xabcx', 1, 3, 'DEF'), 0);
		$this->lt(s::isubstringCmp('xabcx', 1, 0, 'XYZ'), 0);
		$this->eq(s::isubstringCmp('xabcx', 1, 0, ''), 0);
		$this->eq(s::isubstringCmp('xxabc', 2, 5, 'ABC'), 0);
		$this->lt(s::isubstringCmp('xxabc', 2, 5, 'ABCD'), 0);
		$this->eq(s::isubstringCmp('xxxxx', 5, 5, ''), 0);
		$this->lt(s::isubstringCmp('xxxxx', 5, 5, 'A'), 0);
		$this->eq(s::isubstringCmp('xabcx', 10, 5, ''), 0);
		$this->lt(s::isubstringCmp('XABCX', 10, 5, 'xyz'), 0);
		$this->eq(s::isubstringCmp('XXABC', 2, null, 'abc'), 0);
		$this->eq(s::isubstringCmp('xxabc', -3, null, 'abc'), 0);
		$this->eq(s::isubstringCmp('abcxx', -7, 5, 'abc'), 0);
		$this->eq(s::isubstringCmp('abcde', -7, null, 'abcde'), 0);
		$this->eq(s::isubstringCmp('abcde', -15, 5, ''), 0);
		$this->eq(s::isubstringCmp('abcde', -15, null, 'abcde'), 0);
	}

	public function testContains() {
		$this->eq(s::contains('xabcx', 'abc'), true);
		$this->eq(s::contains('xabcx', 'def'), false);
		$this->eq(s::contains('xxxxx', ''), true);
		$this->eq(s::contains('', ''), true);
		$this->eq(s::contains('', 'xxx'), false);
		$this->eq(s::contains('xxxabcxx', 'abc', 2), true);
		$this->eq(s::contains('xxxabcxx', 'abc', 4), false);
	}

	public function testIcontains() {
		$this->eq(s::icontains('xabcx', 'ABC'), true);
		$this->eq(s::icontains('xabcx', 'DEF'), false);
		$this->eq(s::icontains('xxxxx', ''), true);
		$this->eq(s::icontains('', ''), true);
		$this->eq(s::icontains('', 'xxx'), false);
		$this->eq(s::icontains('xxxAbCxx', 'aBc', 2), true);
		$this->eq(s::icontains('xxxabcxx', 'abc', 4), false);
	}

	public function testContainsChars() {
		$this->eq(s::containsChars('abcdef', 'xycz'), true);
		$this->eq(s::containsChars('abcdef', 'xyz'), false);
		$this->eq(s::containsChars('abcdef', ''), false);
	}

	public function testContainsChar() {
		$this->eq(s::containsChar('abcdef', 'e'), true);
		$this->eq(s::containsChar('abcdef', 'x'), false);
	}

	public function testBeginsWith() {
		$this->eq(s::beginsWith('abcdef', 'abc'), true);
		$this->eq(s::beginsWith('abcdef', 'xyz'), false);
		$this->eq(s::beginsWith('abcdef', 'cde'), false);
		$this->eq(s::beginsWith('', 'abc'), false);
		$this->eq(s::beginsWith('abcdef', ''), true);
		$this->eq(s::beginsWith('abc', 'abcdef'), false);
	}

	public function testIbeginsWith() {
		$this->eq(s::ibeginsWith('aBcdef', 'AbC'), true);
		$this->eq(s::ibeginsWith('abcdef', 'xyz'), false);
		$this->eq(s::ibeginsWith('abcdef', 'cde'), false);
		$this->eq(s::ibeginsWith('', 'abc'), false);
		$this->eq(s::ibeginsWith('AbCdef', ''), true);
		$this->eq(s::ibeginsWith('abc', 'abcdef'), false);
	}

	public function testEndsWith() {
		$this->eq(s::endsWith('abcdef', 'def'), true);
		$this->eq(s::endsWith('abcdef', 'xyz'), false);
		$this->eq(s::endsWith('abcdef', 'bcd'), false);
		$this->eq(s::endsWith('a', 'def'), false);
		$this->eq(s::endsWith('', 'def'), false);
		$this->eq(s::endsWith('abcdef', ''), true);
		$this->eq(s::endsWith('def', 'abcdef'), false);
	}

	public function testIendsWith() {
		$this->eq(s::iendsWith('abcDeF', 'Def'), true);
		$this->eq(s::iendsWith('abcdef', 'xyz'), false);
		$this->eq(s::iendsWith('abcdef', 'bcd'), false);
		$this->eq(s::iendsWith('a', 'def'), false);
		$this->eq(s::iendsWith('', 'def'), false);
		$this->eq(s::iendsWith('abcdef', ''), true);
		$this->eq(s::iendsWith('def', 'abcdef'), false);
	}

	public function testRemovePrefix() {
		$this->eq(s::removePrefix('abcdef', 'abc'), 'def');
		$this->eq(s::removePrefix('abcdef', 'xyz'), null);
		$this->eq(s::removePrefix('abcdef', 'cde'), null);
		$this->eq(s::removePrefix('abcdef', ''), 'abcdef');
		$this->eq(s::removePrefix('abcdef', 'abcdef'), '');
		$this->eq(s::removePrefix('abc', 'xyzijk'), null);
		$this->eq(s::removePrefix('abc', 'abcdef'), null);
		$this->eq(s::removePrefix('', 'abc'), null);
		$this->eq(s::removePrefix('', ''), '');
	}

	public function testIremovePrefix() {
		$this->eq(s::iremovePrefix('aBCdEf', 'ABc'), 'dEf');
		$this->eq(s::iremovePrefix('abcdef', 'xyz'), null);
		$this->eq(s::iremovePrefix('abcdef', 'cde'), null);
		$this->eq(s::iremovePrefix('abcdef', ''), 'abcdef');
		$this->eq(s::iremovePrefix('abcdef', 'aBcDEf'), '');
		$this->eq(s::iremovePrefix('abc', 'xyzijk'), null);
		$this->eq(s::iremovePrefix('abc', 'abcdef'), null);
		$this->eq(s::iremovePrefix('', 'abc'), null);
		$this->eq(s::iremovePrefix('', ''), '');
	}

	public function testRemoveSuffix() {
		$this->eq(s::removeSuffix('abcdef', 'def'), 'abc');
		$this->eq(s::removeSuffix('abcdef', 'xyz'), null);
		$this->eq(s::removeSuffix('abcdef', 'bcd'), null);
		$this->eq(s::removeSuffix('abcdef', ''), 'abcdef');
		$this->eq(s::removeSuffix('abcdef', 'abcdef'), '');
		$this->eq(s::removeSuffix('abc', 'xyzijk'), null);
		$this->eq(s::removeSuffix('abc', 'abcdef'), null);
		$this->eq(s::removeSuffix('', 'abc'), null);
		$this->eq(s::removeSuffix('', ''), '');
	}

	public function testIremoveSuffix() {
		$this->eq(s::iremoveSuffix('aBcdEf', 'DeF'), 'aBc');
		$this->eq(s::iremoveSuffix('abcdef', 'xyz'), null);
		$this->eq(s::iremoveSuffix('abcdef', 'bcd'), null);
		$this->eq(s::iremoveSuffix('abcdef', ''), 'abcdef');
		$this->eq(s::iremoveSuffix('abcdef', 'AbcdEf'), '');
		$this->eq(s::iremoveSuffix('abc', 'xyzijk'), null);
		$this->eq(s::iremoveSuffix('abc', 'abcdef'), null);
		$this->eq(s::iremoveSuffix('', 'abc'), null);
		$this->eq(s::iremoveSuffix('', ''), '');
	}

	public function testFind() {
		$this->eq(s::find('abcdef', 'cde'), 2);
		$this->eq(s::find('abcdef', 'xyz'), null);
		$this->eq(s::find('abcdef', 'abcdef'), 0);
		$this->eq(s::find('abcdef', 'abcdefghi'), null);
		$this->eq(s::find('abcdef', ''), 0);
		$this->eq(s::find('', 'abc'), null);
		$this->eq(s::find('', ''), 0);
		$this->eq(s::find('abcdef', 'bcd', 2), null);
		$this->eq(s::find('abcdef', 'de', 2), 3);
		$this->eq(s::find('abcdef', '', 2), 2);
		$this->eq(s::find('abcdef', 'bcd', 10), null);
		$this->eq(s::find('xxxabcxxxabcxxx', 'abc'), 3);
	}

	public function testIfind() {
		$this->eq(s::ifind('abCdEf', 'cDe'), 2);
		$this->eq(s::ifind('abcdef', 'xyz'), null);
		$this->eq(s::ifind('abCDef', 'aBcdeF'), 0);
		$this->eq(s::ifind('abcdef', 'abcdefghi'), null);
		$this->eq(s::ifind('abcdef', ''), 0);
		$this->eq(s::ifind('', 'abc'), null);
		$this->eq(s::ifind('', ''), 0);
		$this->eq(s::ifind('abcdef', 'bcd', 2), null);
		$this->eq(s::ifind('abcDef', 'de', 2), 3);
		$this->eq(s::ifind('abcdef', '', 2), 2);
		$this->eq(s::ifind('abcdef', 'bcd', 10), null);
		$this->eq(s::ifind('xxxABCxxxabcxxx', 'abc'), 3);
	}

	public function testRfind() {
		$this->eq(s::rfind('xxxabcxxxabcxxx', 'abc'), 9);
		$this->eq(s::rfind('abcdef', 'cde'), 2);
		$this->eq(s::rfind('abcdef', 'xyz'), null);
		$this->eq(s::rfind('abcdef', 'abcdef'), 0);
		$this->eq(s::rfind('abcdef', 'abcdefghi'), null);
		$this->eq(s::rfind('abcdef', ''), 6);
		$this->eq(s::rfind('', 'abc'), null);
		$this->eq(s::rfind('', ''), 0);
		$this->eq(s::rfind('abcdef', 'cde', 2), 2);
		$this->eq(s::rfind('abcdef', 'cde', 4), 2);
		$this->eq(s::rfind('abcdef', 'cde', 5), null);
		$this->eq(s::rfind('abcdef', 'bc', 2), 1);
		$this->eq(s::rfind('abcdef', '', 2), 4);
		$this->eq(s::rfind('abcdef', 'bcd', 10), null);
	}

	public function testBefore() {
		$this->eq(s::before('abc/def', '/'), 'abc');
		$this->eq(s::before('abc/def/ghi', '/'), 'abc');
		$this->eq(s::before('abc', '/'), 'abc');
		$this->eq(s::before('abcdef', ''), '');
		$this->eq(s::before('abcdef', 'abcdef'), '');
		$this->eq(s::before('abc', 'abcdef'), 'abc');
		$this->eq(s::before('', ''), '');
		$this->eq(s::before('', 'abc'), '');
	}

	public function testAfter() {
		$this->eq(s::after('abc/def', '/'), 'def');
		$this->eq(s::after('abc/def/ghi', '/'), 'ghi');
		$this->eq(s::after('abc', '/'), 'abc');
		$this->eq(s::after('abcdef', ''), '');
		$this->eq(s::after('abcdef', 'abcdef'), '');
		$this->eq(s::after('abc', 'abcdef'), 'abc');
		$this->eq(s::after('', ''), '');
		$this->eq(s::after('', 'abc'), '');
	}

	public function testIsLower() {
		$this->eq(s::isLower('a'), true);
		$this->eq(s::isLower('A'), false);
		$this->eq(s::isLower('abcdef'), true);
		$this->eq(s::isLower('ABCDEF'), false);
		$this->eq(s::isLower('abcDEF'), false);
		$this->eq(s::isLower(''), false);
	}

	public function testIsUpper() {
		$this->eq(s::isUpper('a'), false);
		$this->eq(s::isUpper('A'), true);
		$this->eq(s::isUpper('abcdef'), false);
		$this->eq(s::isUpper('ABCDEF'), true);
		$this->eq(s::isUpper('ABCdef'), false);
	}

	/* The other is_ functions aren't really worth it. */

	public function testIsWhitespace() {
		$this->eq(s::isWhitespace(' '), true);
		$this->eq(s::isWhitespace("\n\n\t "), true);
		$this->eq(s::isWhitespace('abc'), false);
		$this->eq(s::isWhitespace("\n\tgfdgfd"), false);
		$this->eq(s::isWhitespace(''), false);
	}

	public function testCount() {
		$this->eq(s::count('xxabcxxxabcxxabcx', 'abc'), 3);
		$this->eq(s::count('xxxx', 'abc'), 0);
		$this->eq(s::count('ababa', 'aba'), 1);
		$this->eq(s::count('', 'abc'), 0);
		$this->eq(s::count('abcdef', ''), 7);
		$this->eq(s::count('xxabcxxxabcxxabcx', 'abc', 6), 2);
		$this->eq(s::count('xxabcxxxabcxxabcx', 'abc', 30), 0);
		$this->eq(s::count('xxabcxxxabcxxabcx', 'abc', 6, 5), 1);
		$this->eq(s::count('xxabcxxxabcxxabcx', 'abc', 6, 0), 0);
		$this->eq(s::count('abc', 'abcdef'), 0);
		$this->eq(s::count('abcdef', '', 3), 4);
		$this->eq(s::count('abcdef', '', 3, 2), 3);
		$this->eq(s::count('abcdef', '', 10), 0);
		$this->eq(s::count('abcdef', 'abc', 6), 0);
		$this->eq(s::count('abcdef', '', 6), 1);
	}

	public function testSpan() {
		$this->eq(s::span('aaab', 'a'), 3);
		$this->eq(s::span('xyz', 'a'), 0);
	}
}
