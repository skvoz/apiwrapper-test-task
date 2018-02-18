<?php

namespace App\Services;


use GuzzleHttp\Client;

class BaseAPI
{
    const BASE_URI = 'http://94.254.0.188:4000';

    /**
     * @var Client
     */
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => self::BASE_URI,
            'timeout' => 2.0,
        ]);
    }

    public function request($uri, $options, $method = 'GET')
    {
         //TODO cache
        $response = $this->httpClient->request($method, $uri, [
            'query' => $options
        ]);

        $result = json_decode((string) $response->getBody(), true);

        return $result;
    }


}