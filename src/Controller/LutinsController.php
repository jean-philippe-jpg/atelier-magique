<?php

namespace App\Controller;
use App\Entity\Elfes;
use App\Repository\ElfesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LutinsController extends AbstractController
{
    #[Route('/lutins', name: 'app_lutins')]
    public function index(ElfesRepository $ElfesRepository): Response
    {
        return $this->render('lutins/index.html.twig', [

            'lutins' => $ElfesRepository->findby([], [

                'username' => 'asc'])
            
            ]);
    }
}
