<?php

namespace App\Controller;

use App\Service\CallApiServiceZoho;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(CallApiServiceZoho $callApiServiceZoho): Response
    {

        return $this->render('list/index.html.twig',[
            'contacts'=>$callApiServiceZoho->getListContact(),
        ]);
    }


    
}
