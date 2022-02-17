<?php

namespace App\Controller;
require __DIR__ . '\..\..\vendor\autoload.php';

use \Ovh\Api;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OvhController extends AbstractController
{
    /**
     * @Route("/ovh", name="ovh")
     */
    public function index(): Response
    {
        /** appel Ovh - Test de connexion */
        $APPLICATION_KEY = 'DBWuBNxqpRAObcCW';
        $APPLICATION_SECRET = 'eKQokJYNoN2m2qF2lpF1ed7JiP1mVsxz';
        $CONSUMER_KEY = 'jlOFQEN6idAJznlFt5IdlzLTWnn843Xy';
        $endpoint = 'ovh-eu';
        $ovh = new Api( $APPLICATION_KEY,
        $APPLICATION_SECRET,
        $endpoint,
        $CONSUMER_KEY);
        $response = "Welcome " . $ovh->get('/me')['firstname'];

        /** appel Ovh - Nom de la personne liée à un compte particulier */
        echo "Personne liée au compte OVH BillingAccount :".$ovh->get('/telephony/rn29418-ovh-7')['description'];

        /** appel Ovh - liste numéro de téléphone - ServiceName */
        /*dd($ovh->get('/telephony/rn29418-ovh-7/line')); */

        /** appel Ovh - liste id d'historique d'appel */
        /*dd($ovh->get('/telephony/rn29418-ovh-7/service/0033428295541/voiceConsumption')); */

        /** appel Ovh - détail d'un appel */
        dd($ovh->get('/telephony/rn29418-ovh-7/service/0033428295541/voiceConsumption/11181123155'));



        return $this->render('ovh/index.html.twig', [
            'controller_name' => 'OvhController',
            'response' => $response,
        ]);
    }
}
