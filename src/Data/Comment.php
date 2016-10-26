<?php

namespace Greymass\SteemPHP\Data;

class Comment extends Model {

    protected static $typeMap = array(
        // Datetime
        'active' => 'Greymass\SteemPHP\Utils\Datetime',
        'cashout_time' => 'Greymass\SteemPHP\Utils\Datetime',
        'created' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_payout' => 'Greymass\SteemPHP\Utils\Datetime',
        'last_update' => 'Greymass\SteemPHP\Utils\Datetime',
        'max_cashout_time' => 'Greymass\SteemPHP\Utils\Datetime',
        // Currencies
        'curator_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
        'max_accepted_payout' => 'Greymass\SteemPHP\Utils\Currency',
        'pending_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
        'promoted' => 'Greymass\SteemPHP\Utils\Currency',
        'total_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
        'total_pending_payout_value' => 'Greymass\SteemPHP\Utils\Currency',
    );

    public function populate() {
        $this->parseJSON();
        $this->parseHTML();
        $this->parsePreview();
        $this->parseImages();
        $this->ts = property_exists($this, 'created') ? strtotime($this->created) : time();
    }

    protected function parseImages() {
        $this->image = (isset($this->json_metadata['image']))
            ? array_shift($this->json_metadata['image'])
            : $this->parseFirstImage();
    }

    protected function parseJSON() {
        if(!is_array($this->json_metadata)) {
          $this->json_metadata = json_decode($this->json_metadata, true);
        }
    }

    protected function parseHTML() {
        $string = $this->body;
        // Let's turn image URLs into <img> tags
        $regex = "~<img[^>]*>(*SKIP)(*FAIL)|\\[[^\\]]*\\](*SKIP)(*FAIL)|\\([^\\)]*\\)(*SKIP)(*FAIL)|https?://[^/\\s]+/\\S+\\.(?:jpg|png|gif)~i";
        $string = preg_replace($regex, '<img src="${0}">', $string);
        // Then let's parse the markdown
        $string = \Michelf\Markdown::defaultTransform($string);
        // Now clean it
        $purifier = new \HTMLPurifier();
        $string = $purifier->purify($string);
        $this->html = $string;
    }

    public function parsePreview($maxElements = 2, $maxStrLength = 25) {
        $elements = array();
        $dom = new \DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">'.$this->html);
        foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $node) {
          if($node->nodeType === XML_ELEMENT_NODE && sizeof($elements) <= $maxElements - 1 && strlen($node->nodeValue) > $maxStrLength) {
            $elements[] = $node->ownerDocument->saveXML($node);
          }
        }
        $this->html_preview = strip_tags(implode($elements),'<p><br>');
    }

    protected function parseFirstImage() {
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->html, $matches);
        if($matches[1] && $matches[1][0]) {
          return $matches[1][0];
        }
        return null;
    }

    public function getCategory() {
        return (is_array($this->json_metadata) && array_key_exists('tags', $this->json_metadata)) ? $this->json_metadata['tags'][0] : 'unknown';
    }

    public function getTags() {
        return (is_array($this->json_metadata) && array_key_exists('tags', $this->json_metadata)) ? $this->json_metadata['tags'] : [];
    }

}
