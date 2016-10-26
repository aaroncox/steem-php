<?php

namespace Greymass\SteemPHP\Data;

class Model {

    protected $_data;
    protected static $typeMap = [];

    public function __construct(Array $properties = array()) {
        $properties = $this->setTypeMap($properties);
        $this->_data = $properties;
    }

    public function __set($property, $value) {
      return $this->_data[$property] = $value;
    }

    public function __get($property) {
      return array_key_exists($property, $this->_data)
        ? $this->_data[$property]
        : null
      ;
    }

    public function setTypeMap($properties) {
        foreach($properties as $key => $value) {
            if(array_key_exists($key, static::$typeMap)) {
                $properties[$key] = new static::$typeMap[$key]($value);
            }
        }
        return $properties;
    }

    public function export() {
        return $this->_data;
    }

    public function json() {
        return json_encode($this->export());
    }

}
