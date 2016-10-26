<?php

namespace Greymass\SteemPHP;

use JsonRPC\Client as RpcClient;
use JsonRPC\HttpClient;

class RPC {

    protected $client;
    protected $host = 'https://node.steem.ws';
    protected $mapping = [
        'get_block' => 'Greymass\SteemPHP\Data\Block',
        'get_content' => 'Greymass\SteemPHP\Data\Comment',
        'get_state' => 'Greymass\SteemPHP\Data\State',
    ];

    public function __construct($host = null) {
        if($host) $this->host = $host;
        if(version_compare(PHP_VERSION, '5.6.0', '<')) {
            $httpClient = new HttpClient($this->host);
            $httpClient->withoutSslVerification();
            $this->client = new RpcClient($this->host, false, $httpClient);
        } else {
            $this->client = new RpcClient($this->host);
        }
    }

    public function getClient() {
        return $this->client;
    }

    public function getConnection() {
        return $this->host;
    }

    public function __call($name, $arguments) {
        $response = $this->client->$name($arguments);
        if(array_key_exists($name, $this->mapping)) {
            return new $this->mapping[$name]($response);
        }
        return $response;
    }

}
