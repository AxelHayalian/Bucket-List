<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/wishes', name: 'wish_')]

class WishController extends AbstractController
{
    #[Route(name: 'list')]

    public function list (): Response
    {
        return $this->render('wish/list.html.twig',[
            ]);

    }

    #[Route ('/details/{id</d+}', name: 'detail')] // </d+} identique à ceci requirements={'id'='\d+'}
    public function detailsList (int $id): Response
    {
        return $this->render('wish/detail.html.twig',[

        ]);
    }
}