<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/wishes')]

class WishController extends AbstractController
{
    #[Route(name: 'wish_list')]

    public function list (WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository->findLastWishes();

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
    #[Route('/create', name: 'wish_create')]
    #[IsGranted('ROLE_USER')]
    public function creatWish(Request $request, EntityManagerInterface $entityManager): Response{

        $wish = new Wish();
        //$wish->setCreatedAt(new \DateTimeImmutable());
        $form = $this->createForm(WishType::class, $wish);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('success', 'Wish added!');
            return $this->redirectToRoute('wish_detail',["id"=>$wish->getId()]);
        }


        return $this->render('wish/create.html.twig', [
            'formWish'=>$form
            ]);
    }

    #[Route('/edit/{id}', name: 'wish_edit')]
    public function edit(Wish $wish, Request $request, EntityManagerInterface $entityManager)
    {

        $form = $this->createForm(WishType::class, $wish);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('success', 'Wish has been modified!');
            return $this->redirectToRoute('wish_detail', ["id" => $wish->getId()]);

        }
        return $this->render('wish/edit.html.twig', [
            'wish' => $wish,
            'formWish' => $form
        ]);
    }

}
