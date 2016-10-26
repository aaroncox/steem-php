<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\RPC;

class RPCGetBlockTest extends \PHPUnit_Framework_TestCase
{

    public function testGetBlock() {
        $rpc = new RPC();
        $block = $rpc->get_block(1);
        $this->assertInstanceOf('Greymass\SteemPHP\Data\Block', $block);
        $expected = array(
            "previous" => "0000000000000000000000000000000000000000",
            "timestamp" => "2016-03-24T16:05:00",
            "witness" => "initminer",
            "transaction_merkle_root" => "0000000000000000000000000000000000000000",
            "extensions" => [],
            "witness_signature" => "204f8ad56a8f5cf722a02b035a61b500aa59b9519b2c33c77a80c0a714680a5a5a7a340d909d19996613c5e4ae92146b9add8a7a663eef37d837ef881477313043",
            "transactions" => []
        );
        $this->assertEquals($block->previous, "0000000000000000000000000000000000000000");
        $this->assertEquals($expected, $block->export());
    }

}
