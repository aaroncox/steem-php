<?php

namespace Greymass\SteemPHP\Data;

class Posts extends Model {

    protected static $typeMap = array(
        'content' => 'Greymass\SteemPHP\Data\Collection\Comments',
    );

}
