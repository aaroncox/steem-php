<?php

namespace Greymass\SteemPHP;

use Greymass\SteemPHP\RPC;
use Greymass\SteemPHP\Data\Comment;

class DataCommentTest extends \PHPUnit_Framework_TestCase
{

    public function testGetComment() {
        $steem = new RPC();
        $comment = $steem->get_content('greymass', 'reprint-build-your-blog-or-website-on-the-blockchain');
        $this->assertInstanceOf('Greymass\SteemPHP\Data\Comment', $comment);
        $this->assertInstanceOf('Greymass\SteemPHP\Utils\DateTime', $comment->created);
        $this->assertEquals('Reprint - Build your blog or website on the blockchain', $comment->title);
        $this->assertEquals('greymass', $comment->author);
        $this->assertEquals('reprint', $comment->getCategory());
        $this->assertEquals(['reprint', 'greymass', 'steem', 'project'], $comment->getTags());
    }

    public function sampleProvider() {
        return [['content' => [
                    'title' => 'Test Post',
                    'body' => '<p>Paragraph</p><p>Paragraph</p><img src="https://greymass.com/themes/greymass/img/logo.png"/><p>Paragraph</p><p>Paragraph</p>',
                    'json_metadata' => '{"links": ["https:\/\/github.com\/greymass"],"tags": ["greymass"]}',
                ]]];
    }

    /**
     * @dataProvider sampleProvider
     */
    public function testParseFirstImage($content) {
        $comment = new Comment($content);
        $this->assertEquals('https://greymass.com/themes/greymass/img/logo.png', $comment->image);
    }

    /**
     * @dataProvider sampleProvider
     */
    public function testParseJSON($content) {
        $comment = new Comment($content);
        $this->assertEquals('greymass', $comment->getCategory());
        $this->assertEquals(['greymass'], $comment->getTags());
    }

}
