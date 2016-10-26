<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\Data\Collection\Collection;
use Greymass\SteemPHP\Data\Model;

class DataCollectionCollectionTest extends \PHPUnit_Framework_TestCase
{

    public $sample = array(
        array('foo' => 'bar1'),
        array('foo' => 'bar2'),
    );


    public function testCollection() {
        $collection = new CollectionTestMock($this->sample);
        $this->assertInstanceOf('Greymass\SteemPHP\CollectionTestMockModel', $collection[0]);
        $this->assertInstanceOf('Greymass\SteemPHP\CollectionTestMockModel', $collection[1]);
    }

    public function testCollectionExport() {
        $collection = new CollectionTestMock($this->sample);
        $this->assertEquals($collection->export(), $this->sample);
    }

    public function testCollectionJson() {
        $collection = new CollectionTestMock($this->sample);
        $this->assertEquals($collection->json(), json_encode($this->sample));
    }

}


class CollectionTestMockModel extends Model {}

class CollectionTestMock extends Collection {
    protected static $type = 'Greymass\SteemPHP\CollectionTestMockModel';
}
