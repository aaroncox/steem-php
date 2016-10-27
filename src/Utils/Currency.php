<?php

namespace Greymass\SteemPHP\Utils;

class Currency {

    public $amount, $type;

    public function __construct($value) {
        $parts = explode(" ", $value);
        if(sizeof($parts) == 2) {
            $this->amount = (float) $parts[0];
            $this->type = $parts[1];
        } else {

        }

    }

    public function __toString() {
        return implode(" ", [
            number_format($this->amount, 3, '.', ''),
            $this->type
        ]);
    }

}
