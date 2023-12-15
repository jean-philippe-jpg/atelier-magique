<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(Request $request): Response
    {
            // systeme de commentaire
            $commentaire = new Commentaire;

            // formulaire
            $commentaireForm = $this->createForm( CommentaireType::class, $commentaire);
            $commentaireForm->handleRequest($request);

            if ($commentaireForm->isSubmitted() && $commentaireForm->isValid()){

                
                $entityManager->persist($commentaire);
                $entityManager->flush();
                

                $this->addFlash('message', 'je te souhaite un joyeux noel');
                return $this->redirectToRoute('app_accueil_index', [], Response::HTTP_SEE_OTHER);
            }

        return $this->render('home/index.html.twig', [
            'commentaireForm' => $commentaireForm->createView(),
        ]);
    }

}
