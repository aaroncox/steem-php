<?php

namespace Greymass\SteemPHP\Data;

class Model {

    protected static $typeMap = [];

    public function __construct(Array $properties = array()) {
        $this->setProperties($properties);
        if(method_exists($this, 'populate')) {
            $this->populate();
        }
        $this->parseJSON();
    }

    protected function parseJSON() {
        if($this->json_metadata && !is_array($this->json_metadata)) {
          $this->json_metadata = json_decode($this->json_metadata, true);
        }
    }


    public function get($key) {
        return $this->$key;
    }

    public function setProperties($properties) {
        foreach($properties as $key => $value) {
            if(array_key_exists($key, static::$typeMap)) {
                $this->$key = new static::$typeMap[$key]($value);
            } else {
                $this->$key = $value;
            }
        }
    }

    public function export() {
        return get_object_vars($this);
    }

    public function json() {
        return json_encode($this->export());
    }

}
