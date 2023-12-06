<?php

namespace App\Controller;

use App\Entity\Elfes;
use App\Form\ElfesType;
use App\Repository\ElfesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/elfes')]
class ElfesController extends AbstractController
{
    #[Route('/', name: 'app_elfes_index', methods: ['GET'])]
    public function index(ElfesRepository $elfesRepository): Response
    {
        return $this->render('elfes/index.html.twig', [
            'elfes' => $elfesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_elfes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $elfe = new Elfes();
        $form = $this->createForm(ElfesType::class, $elfe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($elfe);
            $entityManager->flush();

            return $this->redirectToRoute('app_elfes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('elfes/new.html.twig', [
            'elfe' => $elfe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_elfes_show', methods: ['GET'])]
    public function show(Elfes $elfe): Response
    {
        return $this->render('elfes/show.html.twig', [
            'elfe' => $elfe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_elfes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Elfes $elfe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ElfesType::class, $elfe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_elfes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('elfes/edit.html.twig', [
            'elfe' => $elfe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_elfes_delete', methods: ['POST'])]
    public function delete(Request $request, Elfes $elfe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$elfe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($elfe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_elfes_index', [], Response::HTTP_SEE_OTHER);
    }
}
