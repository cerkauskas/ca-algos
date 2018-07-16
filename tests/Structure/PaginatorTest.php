<?php

namespace Test\Structure;

use Algo\Structure\Paginator;
use PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{
    public function test_correct_number_amount_with_no_items()
    {
        $paginator = new Paginator([], 5);
        $pages = $paginator->getPages();

        $this->assertEquals(0, $pages);
    }

    public function test_correct_number_with_5_items_and_3_per_page()
    {
        $paginator = new Paginator([1, 2, 3, 4, 5], 3);
        $pages = $paginator->getPages();

        $this->assertEquals(2, $pages);
    }

    public function test_correct_number_of_pages_with_99_items_and_5_per_page()
    {
        $paginator = new Paginator(range(0, 99), 5);
        $pages = $paginator->getPages();

        $this->assertEquals(20, $pages);
    }

    public function test_it_should_return_all_items_for_1st_page_with_3_of_them_and_5_per_page()
    {
        $paginator = new Paginator([1, 2, 3], 5);
        $items = $paginator->getForPage(1);

        $this->assertEquals([1, 2, 3], $items);
    }

    public function test_it_should_return_only_first_5_items_for_first_page()
    {
        $paginator = new Paginator([1, 2, 3, 4, 5, 6, 7, 8], 5);
        $items = $paginator->getForPage(1);

        $this->assertEquals([1, 2, 3, 4, 5], $items);
    }

    public function test_it_should_return_array_of_5_items_for_second_page()
    {
        $paginator = new Paginator([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], 5);
        $items = $paginator->getForPage(2);

        $this->assertEquals([6, 7, 8, 9, 10], $items);
    }

    public function test_it_should_return_all_items_from_last_page_but_not_more()
    {
        $paginator = new Paginator([1, 2, 3, 4, 5, 6, 7, 8, 9], 4);
        $items = $paginator->getForPage(3);

        $this->assertEquals([9], $items);
    }

    public function it_should_throw_InvalidArgumentException_when_page_is_0()
    {
        $paginator = new Paginator([1, 2, 3], 5);

        try {
            $paginator->getForPage(0);
        }
        catch (\InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }

    public function test_it_should_throw_InvalidArgumentException_when_page_is_negative()
    {
        $paginator = new Paginator([1, 2, 3], 5);

        try {
            $paginator->getForPage(-5);
            $this->assertFalse(true);
        }
        catch (\InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }

    public function test_ith_should_throw_InvalidArgumentException_when_page_is_too_big()
    {
        $paginator = new Paginator([1, 2, 3], 5);

        try {
            $paginator->getForPage(5);
            $this->assertFalse(true);
        }
        catch (\InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }
}