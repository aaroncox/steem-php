<?php

namespace Greymass\SteemPHP\Utils;

use Greymass\SteemPHP\Data;

class Datetime {

    public $amount, $type;

    public function __construct($value) {
        try {
            $this->datetime = new \DateTime($value);
        } catch (Exception $e) {
            $this->datetime = new \DateTime();
        }

    }

    public function __toString() {
        return $this->datetime->format('Y-m-d\TH:i:s');
    }

}
