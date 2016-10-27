<?php

namespace Greymass\SteemPHP;

class KeyTest extends \PHPUnit_Framework_TestCase
{

    public $account;

    public function __construct() {
        $steem = new RPC();
        $this->account = $steem->get_account('greymass');
    }

    public function testObjects() {
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\Key', $this->account->owner);
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\Key', $this->account->active);
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\Key', $this->account->posting);
    }

    public function testToString() {
        $data = json_decode((string) $this->account->posting, true);
        $this->assertArrayHasKey('weight_threshold', $data);
        $this->assertArrayHasKey('account_auths', $data);
        $this->assertArrayHasKey('key_auths', $data);
    }

}
