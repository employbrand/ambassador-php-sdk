<?php

namespace EmploybrandAmbassador;

use EmploybrandAmbassador\Entity\Candidate;
use EmploybrandAmbassador\Exceptions\Http\InternalServerError;
use EmploybrandAmbassador\Exceptions\Http\NotFound;
use EmploybrandAmbassador\Exceptions\Http\NotValid;
use EmploybrandAmbassador\Exceptions\Http\PerformingMaintenance;
use EmploybrandAmbassador\Exceptions\Http\TooManyAttempts;
use EmploybrandAmbassador\Exceptions\Http\Unauthenticated;
use Exception;
use GuzzleHttp\Client;


class EmploybrandAmbassadorClient
{


    private $guzzle;

    private $url = 'https://api.ambassador.employbrand.app';

    private $candidates;


    public function __construct(string $companyId, string $token)
    {
        $this->guzzle = new Client([
            'base_uri' => $this->url,
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'X-Company' => $companyId,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }


    public function makeAPICall(string $url, string $method = 'GET', array $options = []): \stdClass|array
    {
        if( !in_array($method, ['GET', 'POST', 'PUT', 'DELETE']) ) {
            throw new Exception('Invalid method type');
        }

        $response = $this->guzzle->request($method, $url, $options);

        switch ( $response->getStatusCode() ) {
            case 401:
                throw new Unauthenticated($response->getBody());
            case 404:
                throw new NotFound($response->getBody());
            case 422:
                throw new NotValid($response->getBody());
            case 429:
                throw new TooManyAttempts($response->getBody());
            case 500:
                throw new InternalServerError($response->getBody());
            case 503:
                throw new PerformingMaintenance($response->getBody());
        }

        return json_decode($response->getBody()->getContents(), true);
    }


    public function candidates(): Candidate
    {
        if( $this->candidates == null )
            $this->candidates = new Candidate($this);

        return $this->candidates;
    }


}
