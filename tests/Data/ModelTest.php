<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\Data\Model;
use Greymass\SteemPHP\Utils\Currency;

class DataModelTest extends \PHPUnit_Framework_TestCase
{

    public $sample = array(
        'foo' => 'bar'
    );

    public function testObject() {
        $data = new Model($this->sample);
        $this->assertInstanceOf('Greymass\SteemPHP\Data\Model', $data);
    }

    public function testGetSet() {
        $data = new Model();
        $data->foo = 'bar';
        $this->assertEquals('bar', $data->foo);
    }

    public function testExport() {
        $data = new Model($this->sample);
        $this->assertTrue(method_exists($data, 'export'));
        $this->assertEquals($this->sample, $data->export());
    }

    public function testJson() {
        $data = new Model($this->sample);
        $this->assertTrue(method_exists($data, 'json'));
        $this->assertEquals(json_encode($this->sample), $data->json());
    }

    public function testTypeMap() {
        $data = new ModelTestMock($this->sample);
        $this->assertInstanceOf('Greymass\SteemPHP\ModelTestMockType', $data->foo);
    }

}

class ModelTestMockType {}

class ModelTestMock extends Model {
    protected static $typeMap = array(
        'foo' => 'Greymass\SteemPHP\ModelTestMockType',
    );
}
