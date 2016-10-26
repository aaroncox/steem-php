<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\Data\Model;
use Greymass\SteemPHP\Utils\Currency;

class CurrencyTest extends \PHPUnit_Framework_TestCase
{

    public $comment;

    public function __construct() {
        $steem = new RPC();
        $this->comment = $steem->get_content('steemit', 'firstpost');
    }

    public function testCurrency() {
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\Currency', $this->comment->total_pending_payout_value);
    }

    public function testCurrencyAmount() {
        $this->assertEquals(0, $this->comment->total_pending_payout_value->amount);
    }

    public function testCurrencyType() {
        $this->assertEquals('SBD', $this->comment->total_pending_payout_value->type);
    }

    public function testCurrencyToString() {
        $this->assertEquals('0.000 SBD', (string) $this->comment->total_pending_payout_value);
    }

}
