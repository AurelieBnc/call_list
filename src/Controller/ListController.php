<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(CallApiService $callApiService): Response
    {
        /** appel Ovh pour avoir liste des billingAccount */
        var_dump($callApiService->getOvh());


        return $this->render('list/index.html.twig',[
            'contacts'=>$callApiService->getListContact(),
            /* 'test' =>$callApiService->getOvh(), */

        ]);
    }



}
