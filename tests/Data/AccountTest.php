<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\RPC;
use Greymass\SteemPHP\Data\Account;

class DataAccountTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAccount() {
        $steem = new RPC();
        $account = $steem->get_account('greymass');
        $this->assertInstanceOf('Greymass\SteemPHP\Data\Account', $account);
        $this->assertEquals('greymass', $account->name);
    }

    public function sampleProvider() {
        return [[
                    'greymass' => [
                        'name' => 'greymass',
                        'reputation' => 5599807414460,
                    ],
                    'reputation' => 58
                ],[
                    'invalid-reputation' => [
                        'name' => 'invalid-reputation',
                        'reputation' => 'invalid-reputation',
                    ],
                    'reputation' => 0
                ]];
    }

    /**
     * @dataProvider sampleProvider
     */
    public function testReputation($data, $reputation) {
        $account = new Account($data);
        $this->assertEquals($reputation, $account->reputation());
    }

}
