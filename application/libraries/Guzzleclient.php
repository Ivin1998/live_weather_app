<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'../vendor/autoload.php';

use GuzzleHttp\Client;

class Guzzleclient {

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function request($method, $uri = '', array $options = [])
    {
        $response = $this->client->request($method, $uri, $options);
        return $response->getBody()->getContents();
    }

}
