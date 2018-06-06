<?php

namespace Test\String;

use Algo\String\LetterCalculator;
use PHPUnit\Framework\TestCase;

class LetterCalculatorTest extends TestCase
{
    /** @var LetterCalculator */
    protected $letterCalculator;

    protected function setUp()
    {
        parent::setUp();

        $this->letterCalculator = new LetterCalculator();
    }

    public function test_it_works_with_empty_string()
    {
        $actual = $this->letterCalculator->calculate("");

        $this->assertEquals([], $actual);
    }

    public function test_it_counts_with_single_character_string()
    {
        $actual = $this->letterCalculator->calculate("a");

        $this->assertArrayHasKey('a', $actual);
        $this->assertEquals($actual['a'], 1);
    }

    public function test_it_returns_only_needed_characters_with_single_character_string()
    {
        $actual = $this->letterCalculator->calculate("a");

        $this->assertCount(1, $actual);
    }

    public function test_it_counts_with_multichar_string()
    {
        $actual = $this->letterCalculator->calculate("bobobas");

        # check that all keys exist
        $this->assertArrayHasKey('b', $actual);
        $this->assertArrayHasKey('o', $actual);
        $this->assertArrayHasKey('a', $actual);
        $this->assertArrayHasKey('s', $actual);

        # check whether it gives correct counts
        $this->assertEquals($actual['b'], 3);
        $this->assertEquals($actual['o'], 2);
        $this->assertEquals($actual['a'], 1);
        $this->assertEquals($actual['s'], 1);

    }

    public function test_it_returns_only_needed_characters_with_multichar_string()
    {
        $actual = $this->letterCalculator->calculate("hello world");

        $this->assertCount(8, $actual);
    }
}