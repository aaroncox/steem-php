<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\RPC;

class DataCommentTest extends \PHPUnit_Framework_TestCase
{

    public function testGetComment() {
        $steem = new RPC();
        $comment = $steem->get_content('steemit', 'firstpost');
        $this->assertInstanceOf('Greymass\SteemPHP\Data\Comment', $comment);
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\DateTime', $comment->created);
        $this->assertEquals('Welcome to Steem!', $comment->title);
        $this->assertEquals('steemit', $comment->author);
    }

}
