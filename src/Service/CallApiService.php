<?php

namespace App\Service;
/** recherche du dossier autoload pour le wrapper de ApiOvh */
require __DIR__ . '\..\..\vendor\autoload.php';

use \Ovh\Api;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /** fonction d'appel de l'Api Zoho Desk - recherche sur un numéro spécifique */
    public function getListContact(): array
    {
        $response = $this->client->request(
            'GET',
            'https://desk.zoho.eu/api/v1/contacts/search',[
                'headers' => [
                    /** Bearer valable 1h - rafraichis manuellement */
                    'Authorization' => 'Bearer 1000.a73d2e0d912c392cd30ce1bf2e98ef59.e764ab078d628f04602f4ce974a86944'
                ],
                'query' => ['phone' => '33 1 47 63 85 72','sortBy'=> '-createdTime', 'limit'=> '30' ]
            ]);
        return $response->toArray();
    }



    /** fonction d'appel de l'Api OVH - liste des billingAccount */
    public function getOvh() :array
    {
        $APPLICATION_KEY = 'DBWuBNxqpRAObcCW';
        $APPLICATION_SECRET = 'eKQokJYNoN2m2qF2lpF1ed7JiP1mVsxz';
        $CONSUMER_KEY = 'jlOFQEN6idAJznlFt5IdlzLTWnn843Xy';
        $endpoint = 'ovh-eu';
        $ovh = new Api( $APPLICATION_KEY,
        $APPLICATION_SECRET,
        $endpoint,
        $CONSUMER_KEY);
        $response =$ovh->get('/telephony');


        return $response;
    }

}

