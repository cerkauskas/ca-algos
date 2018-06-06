<?php

namespace Test\Collection;

use PHPUnit\Framework\TestCase;
use Algo\Collection\LargestNumber;

class LargestNumberTest extends TestCase
{
    /** @var LargestNumber\ */
    protected $largestNumber;

    protected function setUp()
    {
        parent::setUp();

        $this->largestNumber = new LargestNumber();
    }

    public function test_it_returns_null_if_array_is_empty()
    {
        $actual = $this->largestNumber->find([]);

        $this->assertNull($actual);
    }

    public function test_it_works_with_array_of_single_element()
    {
        $actual = $this->largestNumber->find([5]);

        $this->assertEquals(5, $actual);
    }

    public function test_it_works_with_array_of_only_positive_elements()
    {
        $actual = $this->largestNumber->find([1, 5, 3, 4]);

        $this->assertEquals(5, $actual);
    }

    public function test_it_works_with_array_of_only_negative_elements()
    {
        $actual = $this->largestNumber->find([-8, -9, -4, -3]);

        $this->assertEquals(-3, $actual);
    }

    public function test_it_works_with_array_of_positive_and_negative_elements()
    {
        $actual = $this->largestNumber->find([-1, 1]);

        $this->assertEquals(1, $actual);
    }

    public function test_it_works_with_array_of_single_lowest_possible_element()
    {
        $actual = $this->largestNumber->find([PHP_INT_MIN]);

        $this->assertEquals(PHP_INT_MIN, $actual);
    }

    public function test_it_works_with_array_that_contains_highest_possible_element()
    {
        $actual = $this->largestNumber->find([PHP_INT_MAX, 5]);

        $this->assertEquals(PHP_INT_MAX, $actual);
    }
}
