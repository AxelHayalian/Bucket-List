<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/wishes')]

class WishController extends AbstractController
{
    #[Route(name: 'wish_list')]

    public function list (WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository->findBy(['isPublished' => true], ['createdAt' => 'DESC']);

        return $this->render('wish/list.html.twig',[
            "wishes" => $wishes
            ]);

    }

    #[Route ('/details/{id}', name: 'wish_detail', requirements: ['id' => '\d+'])] // </d+} identique à ceci requirements=['id'='\d+']
    public function detailsList (Wish $wish): Response
    {
        return $this->render('wish/detail.html.twig',[
            'wish'=>$wish
        ]);
    }
}
