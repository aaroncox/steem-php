<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\RPC;

class RPCGetStateTest extends \PHPUnit_Framework_TestCase
{

    public function testGetStateTrending() {
        $rpc = new RPC();
        $state = $rpc->get_state('trending');
    }

}
