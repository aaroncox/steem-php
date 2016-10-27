<?php

namespace Greymass\SteemPHP\Utils;

class Key {

    public $account_auths = [], $key_auths = [], $threshold = 1;

    public function __construct($data = []) {
        foreach(['account_auths','key_auths','weight_threshold'] as $field) {
            $this->$field = $data[$field];
        }
    }

    public function __tostring() {
        return json_encode(array(
            'weight_threshold' => $this->weight_threshold,
            'account_auths' => $this->account_auths,
            'key_auths' => $this->key_auths,
        ));
    }

}
