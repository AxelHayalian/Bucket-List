<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'main_')]

class MainController extends AbstractController
{
    #[Route(name: 'home')]

    public function home (): Response
    {
        return $this->render('main/home.html.twig');
    }

    #[Route('about-us', name: 'about_us' )]

    public function aboutUs(): Response
    {
        return  $this->render('main/about_us.html.twig');
    }

    public function login(): Response
    {

    }


}