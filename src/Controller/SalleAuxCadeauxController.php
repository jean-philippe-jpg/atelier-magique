<?php

namespace App\Controller;
use App\Entity\Cadeaux;
use App\Repository\CadeauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/salle')]
class SalleAuxCadeauxController extends AbstractController
{

    #[route('/', name: 'detail', methods: ['GET'])]
    public function detail(CadeauxRepository $CadeauxRepository): response
    {   
        return $this->render('salle_aux_cadeaux/index.html.twig', [

            'tata' => $CadeauxRepository->findBy([], [
                
                'age' => 'asc'])
        ]);
    }

}
