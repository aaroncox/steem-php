<?php

namespace Greymass\SteemPHP\Data\Collection;

class Collection extends \ArrayObject {

    protected $collection = array();

    public function __construct($data) {
        foreach($data as $idx => $model) {
            $this[$idx] = new static::$type($model);
        }
    }

    public function export() {
        $export = array();
        foreach($this as $idx => $model) {
            $export[] = $model->export();
        }
        return $export;
    }

    public function json() {
        return json_encode($this->export());
    }
}
