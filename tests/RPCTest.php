<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\RPC;

class RPCTest extends \PHPUnit_Framework_TestCase
{

    public function testDefaultRPC() {
        $steem = new RPC();
        $this->assertInstanceOf('Greymass\SteemPHP\RPC', $steem);
        $this->assertInstanceOf('JsonRPC\Client', $steem->getClient());
        $this->assertEquals($steem->getConnection(), 'https://node.steem.ws');
        $steem->get_dynamic_global_properties();
    }

    public function testAlternateHostRPC() {
        $steem = new RPC('https://this.piston.rocks');
        $this->assertInstanceOf('Greymass\SteemPHP\RPC', $steem);
        $this->assertInstanceOf('JsonRPC\Client', $steem->getClient());
        $this->assertEquals($steem->getConnection(), 'https://this.piston.rocks');
        $steem->get_dynamic_global_properties();
    }

}
