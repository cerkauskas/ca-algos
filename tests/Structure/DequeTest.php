<?php

namespace Test\Structure;

use Algo\Structure\Deque;
use PHPUnit\Framework\TestCase;

class DequeTest extends TestCase
{

    /**
     * @var Deque
     */
    protected $deque;

    protected function setUp()
    {
        parent::setUp();
        
        $this->deque = new Deque();
    }

    public function test_empty_dequeue_should_have_size_0()
    {
        $size = $this->deque->size();

        $this->assertEquals(0, $size);
    }

    public function test_after_pushing_3_elements_it_should_have_size_3() {
        $this->deque->push_front(1);
        $this->deque->push_front(2);
        $this->deque->push_front(3);

        $size = $this->deque->size();

        $this->assertEquals(3, $size);
    }

    public function test_after_5_pushes_and_4_pops_it_should_have_size_1()
    {
        $this->deque->push_front(5);
        $this->deque->push_back(50);
        $this->deque->push_front(95);
        $this->deque->push_back(5415);
        $this->deque->push_front(155);
        $this->deque->pop_back();
        $this->deque->pop_front();
        $this->deque->pop_back();
        $this->deque->pop_front();

        $size = $this->deque->size();

        $this->assertEquals(1, $size);
    }

    public function test_after_pushing_to_front_pop_front_should_return_item()
    {
        $this->deque->push_front(5);

        $item = $this->deque->pop_front();

        $this->assertEquals(5, $item);
    }

    public function test_after_pushing_to_front_pop_back_should_return_item()
    {
        $this->deque->push_front(8);

        $item = $this->deque->pop_back();

        $this->assertEquals(8, $item);
    }

    public function test_after_pushing_to_back_pop_front_should_return_item()
    {
        $this->deque->push_back(12);

        $item = $this->deque->pop_front();

        $this->assertEquals(12, $item);
    }

    public function test_after_pushing_to_back_pop_back_should_return_item()
    {
        $this->deque->push_back('string');

        $item = $this->deque->pop_back();

        $this->assertEquals('string', $item);
    }

    public function test_after_pushing_3_elements_to_back_pop_front_should_return_first_pushed_item()
    {
        $this->deque->push_back(1);
        $this->deque->push_back(2);
        $this->deque->push_back(3);

        $item = $this->deque->pop_front();

        $this->assertEquals(1, $item);
    }

    public function test_after_pushing_3_elements_to_back_pop_back_should_return_last_pushed_item()
    {
        $this->deque->push_back(4);
        $this->deque->push_back(5);
        $this->deque->push_back(6);

        $item = $this->deque->pop_back();

        $this->assertEquals(6, $item);
    }

    public function test_after_pushing_3_elements_to_front_pop_front_should_return_last_pushed_item()
    {
        $this->deque->push_front(7);
        $this->deque->push_front(8);
        $this->deque->push_front(9);

        $item = $this->deque->pop_front();

        $this->assertEquals(9, $item);
    }

    public function test_after_pushing_3_elements_to_front_pop_back_should_return_first_pushed_item()
    {
        $this->deque->push_front(10);
        $this->deque->push_front(11);
        $this->deque->push_front(12);

        $item = $this->deque->pop_back();

        $this->assertEquals(10, $item);
    }

    public function test_after_pushing_3_elements_to_front_and_back_pop_back_should_return_tail()
    {
        $this->deque->push_back(13);
        $this->deque->push_back(15);
        $this->deque->push_front(14);

        $item = $this->deque->pop_back();

        $this->assertEquals(15, $item);
    }
}