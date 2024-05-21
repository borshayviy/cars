<?php

namespace App\Services\AbstractApi;


use GuzzleHttp\Client;

class AbstractApiService
{
    public $client;
    public function __construct()
    {
        $client = new Client([

            // Base URI is used with relative requests
            'base_uri' => 'https://exchange-rates.abstractapi.com/v1/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
    public function live()
    {
        $response = $this->client->get('live', [
            'query' => [
                'api_key' => getenv('ABSTRACTAPI_KEY'),
                'base' => 'USD',
            ]
        ]);
        return json_decode($response->getBody());
    }
}
