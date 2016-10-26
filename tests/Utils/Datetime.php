<?php

namespace Greymass\SteemPHP;

class DatetimeTest extends \PHPUnit_Framework_TestCase
{

    public $comment;

    public function __construct() {
        $steem = new RPC();
        $this->comment = $steem->get_content('steemit', 'firstpost');
    }

    public function testDatetime() {
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\Datetime', $this->comment->last_update);
    }

    public function testDefaultDatetime() {
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\Datetime', new Utils\Datetime("invalid-time"));
    }

    public function testDatetimeToString() {
        $this->assertEquals('2016-03-30T18:30:18', (string) $this->comment->last_update);
    }


}
