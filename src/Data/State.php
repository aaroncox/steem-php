<?php

namespace Greymass\SteemPHP\Data;

class State extends Model {

    protected static $typeMap = array(
        'content' => 'Greymass\SteemPHP\Data\Collection\Comments',
    );

}
