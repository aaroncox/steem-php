<?php

namespace Greymass\SteemPHP\Utils;

class Datetime {

    public $amount, $type;

    public function __construct($string = false) {
        if (strtotime($string) === false) {
            $this->datetime = new \DateTime();
            // Check if this is a timestamp
            if((is_numeric($string) && (int)$string == $string)) {
              $this->datetime->setTimestamp($string);
            }
        } else {
            $this->datetime = new \DateTime($string);
        }
    }

    public function __toString() {
        return $this->datetime->format('Y-m-d\TH:i:s');
    }

}
