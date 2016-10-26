<?php

namespace Greymass\SteemPHP\Utils;

use Greymass\SteemPHP\Data;

class Currency {

    public $amount, $type;

    public function __construct($value) {
        $parts = explode(" ", $value);
        $this->amount = (float) $parts[0];
        $this->type = $parts[1];
    }

    public function __toString() {
        return implode(" ", [
            number_format($this->amount, 3, '.', ''),
            $this->type
        ]);
    }

}
