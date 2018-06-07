<?php

namespace Test\Structure;

use Algo\Structure\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    /**
     * @var Queue
     */
    protected $queue;

    protected function setUp()
    {
        parent::setUp();

        $this->queue = new Queue();
    }

    public function test_empty_queue_should_have_size_0()
    {
        $size = $this->queue->size();
        
        $this->assertEquals(0, $size);
    }

    public function test_it_should_have_size_0_after_enqueue_and_dequeue()
    {
        $this->queue->enqueue(1);
        $this->queue->dequeue();

        $size = $this->queue->size();

        $this->assertEquals(0, $size);
    }

    public function test_it_should_have_size_1_after_2_enqueues_and_1_dequeue()
    {
        $this->queue->enqueue(1);
        $this->queue->enqueue(2);
        $this->queue->dequeue();

        $size = $this->queue->size();

        $this->assertEquals(1, $size);
    }

    public function test_it_should_return_same_element_after_enqueue()
    {
        $this->queue->enqueue(5);

        $item = $this->queue->dequeue();

        $this->assertEquals(5, $item);
    }

    public function test_dequeue_should_return_firstly_added_item_to_queue()
    {
        $this->queue->enqueue(5);
        $this->queue->enqueue(8);

        $item = $this->queue->dequeue();

        $this->assertEquals(5, $item);
    }

    public function test_dequeue_should_return_sequentially_added_items()
    {
        $this->queue->enqueue(5);
        $this->queue->enqueue(6);
        $this->queue->enqueue(9);
        $this->queue->dequeue();

        $item = $this->queue->dequeue();

        $this->assertEquals(6, $item);
    }
}