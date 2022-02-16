<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiServiceZoho
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function getListContact(): array
    {
        $response = $this->client->request(
            'GET',
            'https://desk.zoho.eu/api/v1/contacts/search',[
                'headers' => [
                    'Authorization' => 'Bearer 1000.8433d5dd78aff2dcabc18086a65401b1.7ca7cc3c0c5397c594a32b52647a5bba'
                ],
                'query' => ['phone' => '33 1 47 63 85 72','sortBy'=> '-createdTime', 'limit'=> '30' ]
            ]);
        return $response->toArray();
    }

}

