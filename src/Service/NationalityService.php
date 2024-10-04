<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class NationalityService{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client){
        $this->client = $client;
    }

    public function getNationalities(): array{
        $response = $this->client->request('GET', 'http://127.0.0.1:9000/nationalities');
        return $response->toArray();
    }
}