<?php

namespace Test\Structure;

use Algo\Structure\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase {

    /**
     * @var Collection
     */
    protected $collection;

    protected function setUp()
    {
        parent::setUp();

        $this->collection = new Collection();
    }

    public function test_it_should_give_0_size_when_empty()
    {
        $size = $this->collection->getSize();

        $this->assertEquals(0, $size);
    }

    public function test_it_should_give_1_size_after_appending_single_element()
    {
        $this->collection->append(5);

        $size = $this->collection->getSize();

        $this->assertEquals(1, $size);
    }

    public function test_it_should_give_2_size_after_appending_4_items_and_removing_2()
    {
        $this->collection->append("first");
        $this->collection->append("second");
        $this->collection->append("third");
        $this->collection->append("fourth");
        $this->collection->remove("first");
        $this->collection->remove("third");

        $size = $this->collection->getSize();

        $this->assertEquals(2, $size);
    }

    public function test_it_should_tell_that_item_doesnt_exist_before_appending_it() {
        $actual = $this->collection->contains(8);

        $this->assertFalse($actual);
    }

    public function test_it_should_tell_that_item_exists_after_appending_it()
    {
        $this->collection->append("test");

        $actual = $this->collection->contains("test");

        $this->assertTrue($actual);
    }

    public function test_it_should_tell_that_item_doesnt_exist_after_appending_and_removing() {
        $this->collection->append("string");
        $this->collection->remove("string");

        $actual = $this->collection->contains("string");

        $this->assertFalse($actual);
    }

    public function test_it_should_tell_that_index_is_zero_for_first_element()
    {
        $this->collection->append("sample");

        $index = $this->collection->indexOf("sample");

        $this->assertEquals(0, $index);
    }

    public function test_it_should_tell_that_index_is_2()
    {
        $this->collection->append(11);
        $this->collection->append(22);
        $this->collection->append(33);
        $this->collection->append(44);

        $index = $this->collection->indexOf(33);

        $this->assertEquals(2, $index);
    }

    public function test_it_should_reset_index_when_removing_element()
    {
        $this->collection->append(111);
        $this->collection->append(112);
        $this->collection->append(113);
        $this->collection->remove(112);

        $index = $this->collection->indexOf(113);

        $this->assertEquals(1, $index);
    }

    public function test_it_should_return_index_of_first_occurence_when_values_duplicate()
    {
        $this->collection->append(123);
        $this->collection->append(456);
        $this->collection->append(456);

        $index = $this->collection->indexOf(456);

        $this->assertEquals(1, $index);
    }

    public function test_indexOf_should_return_negative_one_when_collection_is_empty()
    {
        $index = $this->collection->indexOf(123);

        $this->assertEquals(-1, $index);
    }

    public function test_indexOf_should_return_negative_one_when_value_is_not_present_in_collection()
    {
        $this->collection->append("sample item");
        $this->collection->append("another item");

        $index = $this->collection->indexOf("non-existant");

        $this->assertEquals(-1, $index);
    }

    public function test_remove_should_work_on_empty_collection()
    {
        $this->collection->remove("123");

        $this->assertTrue(true);
    }

    public function test_when_collection_consists_of_same_items_remove_should_remove_them_all()
    {
        $this->collection->append(25);
        $this->collection->append(25);
        $this->collection->append(25);
        $this->collection->append(25);
        $this->collection->append(25);
        $this->collection->remove(25);

        $size = $this->collection->getSize();

        $this->assertEquals(0, $size);
    }

    public function test_when_removing_first_three_identical_items_it_should_keep_all_others()
    {
        $this->collection->append("hi");
        $this->collection->append("hi");
        $this->collection->append("hi");
        $this->collection->append("larry");
        $this->collection->append("where");
        $this->collection->append("are");
        $this->collection->append("you");
        $this->collection->remove('hi');

        $actual = $this->collection->get(0);

        $this->assertEquals("larry", $actual);
    }

    public function test_get_should_return_value_at_that_index_when_only_element_is_given() {
        $this->collection->append("my");
        $this->collection->append("name");
        $this->collection->append("is");

        $this->assertEquals("my", $this->collection->get(0));
        $this->assertEquals("name", $this->collection->get(1));
        $this->assertEquals("is", $this->collection->get(2));
    }

    public function test_get_should_return_null_on_empty_collection()
    {
        $result = $this->collection->get(0);

        $this->assertNull($result);
    }
}