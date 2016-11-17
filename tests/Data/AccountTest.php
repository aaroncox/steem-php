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
                        'json_metadata' => '{"profile":{"profile_image":"avatar.jpg"}}',
                    ],
                    'profileImage' => 'avatar.jpg',
                    'reputation' => 58,
                ],[
                    'invalid-reputation' => [
                        'name' => 'invalid-reputation',
                        'reputation' => 'invalid-reputation',
                        'json_metadata' => '',
                    ],
                    'profileImage' => null,
                    'reputation' => 0,
                ]];
    }

    /**
     * @dataProvider sampleProvider
     */
    public function testSampleModels($data, $profileImage, $reputation) {
        $account = new Account($data);
        $this->assertEquals($reputation, $account->reputation());
        $this->assertEquals($profileImage, $account->profileImage());
    }

}
