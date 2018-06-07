<?php
/**
 * Created by PhpStorm.
 * User: tomas
 * Date: 07/06/18
 * Time: 08:18
 */

namespace Test\Structure;

use Algo\Structure\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{

    /**
     * @var Stack
     */
    protected $stack;
    
    public function setUp()
    {
        parent::setUp();

        $this->stack = new Stack();
    }

    public function test_it_should_return_null_if_pop_empty()
    {
        $actual = $this->stack->pop();

        $this->assertNull($actual);
    }

    public function test_it_should_have_zero_size_if_empty()
    {
        $actual = $this->stack->size();

        $this->assertEquals(0, $actual);
    }

    public function test_after_push_and_pop_it_should_be_empty_and_sequential_pop_returns_null()
    {
        $this->stack->push(1);
        $this->stack->pop();

        $size = $this->stack->size();
        $item = $this->stack->pop();

        $this->assertEquals(0, $size);
        $this->assertNull($item);
    }

    public function test_it_should_pop_what_was_pushed()
    {
        $this->stack->push(1);

        $actual = $this->stack->pop();

        $this->assertEquals(1, $actual);
    }

    public function test_after_3_pushes_and_2_pops_it_should_have_length_of_1()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);
        $this->stack->pop();
        $this->stack->pop();

        $size = $this->stack->size();

        $this->assertEquals(1, $size);
    }

    public function test_it_should_pop_the_last_pushed_element_and_reduce_size_by_1()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);

        $actual = $this->stack->pop();
        $size = $this->stack->size();

        $this->assertEquals(3, $actual);
        $this->assertEquals(2, $size);
    }
}