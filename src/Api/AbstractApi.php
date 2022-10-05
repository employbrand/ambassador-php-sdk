<?php

namespace EmploybrandAmbassador\Api;

use EmploybrandAmbassador\EmploybrandAmbassadorClient;


abstract class AbstractApi
{

    protected $baseUri = '/app/v1/';

    protected $client;


    public function __construct(EmploybrandAmbassadorClient $client)
    {
        $this->client = $client;
    }


    protected function getRequest(string $uri, array $query = []): array|\stdClass
    {
        return $this->client->makeAPICall($this->baseUri . $uri, 'GET', [
            'query' => $query
        ]);
    }


    protected function postRequest(string $uri, $params = []): array|\stdClass
    {
        $body = $this->prepareJsonBody($params);

        return $this->client->makeAPICall($this->baseUri . $uri, 'POST', [
            'json' => $body
        ]);
    }


    protected function putRequest(string $uri, $params = []): array|\stdClass
    {
        $body = $this->prepareJsonBody($params);

        return $this->client->makeAPICall($this->baseUri . $uri, 'PUT', [
            'json' => $body
        ]);
    }


    protected function deleteRequest(string $uri): array|\stdClass
    {
        return $this->client->makeAPICall($this->baseUri . $uri, 'DELETE');
    }


    private static function prepareJsonBody($params): ?array
    {
        if( is_object($params) && method_exists($params, 'toArray') ) {
            return $params->toArray();
        }

        return $params;
    }


}
