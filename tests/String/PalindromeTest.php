<?php

namespace Test\String;

use PHPUnit\Framework\TestCase;
use Algo\String\Palindrome;

class PalindromeTest extends TestCase
{
    protected $palindrome;

    protected function setUp()
    {
        parent::setUp();

        $this->palindrome = new Palindrome();
    }

    /**
     * @dataProvider correctDataProvider
     */
    public function test_correct_palindromes($value)
    {
        $actual = $this->palindrome->isValid($value);

        $this->assertTrue($actual);
    }

    /**
     * @dataProvider incorrectDataProvider
     */
    public function test_incorrect_palindromes($value)
    {
        $actual = $this->palindrome->isValid($value);

        $this->assertFalse($actual);
    }

    public function correctDataProvider()
    {
        return [
            [12321],
            ['madam'],
            ['racecar'],
            [7890987],
            ['ABBA'],
            [''],
            [0],
            [121],
            ['aha'],
            ['12321']
        ];
    }

    public function incorrectDataProvider()
    {
        return [
            [1234],
            [456],
            ['hello'],
            [986541],
            ['test'],
            ['AbBa']
        ];
    }
}