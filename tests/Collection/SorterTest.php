<?php

namespace Test\Collection;

use Algo\Collection\Sorter;
use PHPUnit\Framework\TestCase;

class SorterTest extends TestCase
{
    /**
     * @var Sorter
     */
    protected $sorter;

    protected function setUp()
    {
        parent::setUp();

        $this->sorter = new Sorter();
    }

    public function test_it_works_with_empty_array()
    {
        $actual = $this->sorter->sort([]);

        $this->assertEquals([], $actual);
    }

    public function test_it_works_with_single_element_array()
    {
        $actual = $this->sorter->sort([5]);

        $this->assertEquals([5], $actual);
    }

    public function test_it_sorts_array_with_only_positive_elements()
    {
        $actual = $this->sorter->sort([5, 3, 9]);

        $this->assertEquals([3, 5, 9], $actual);
    }

    public function test_it_sorts_array_with_only_negative_elements()
    {
        $actual = $this->sorter->sort([-9, -4, -256]);

        $this->assertEquals([-256, -9, -4], $actual);
    }

    public function test_it_sorts_array_with_positive_and_negative_elements()
    {
        $actual = $this->sorter->sort([1, -8, 9, 123, -1585]);

        $this->assertEquals([-1585, -8, 1, 9, 123], $actual);
    }

    public function test_it_sorts_array_with_max_int()
    {
        $actual = $this->sorter->sort([PHP_INT_MAX, 5, -4, PHP_INT_MAX]);

        $this->assertEquals([-4, 5, PHP_INT_MAX, PHP_INT_MAX], $actual);
    }

    public function test_it_sorts_array_with_min_int()
    {
        $actual = $this->sorter->sort([PHP_INT_MIN, 5, -4, PHP_INT_MIN]);

        $this->assertEquals([PHP_INT_MIN, PHP_INT_MIN, -4, 5], $actual);
    }

}