<?php

namespace Greymass\SteemPHP\Utils;

class Datetime {

    public $amount, $type;

    public function __construct($string = false) {
        if (strtotime($string) === false) {
            $this->datetime = new \DateTime();
        } else {
            $this->datetime = new \DateTime($string);
        }
    }

    public function __toString() {
        return $this->datetime->format('Y-m-d\TH:i:s');
    }

}
