<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {

       $form = $this->createForm(ContactType::class);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            
            $adresse= $data['email'];
            $nom= $data['nom'];
            $prenom= $data['prenom'];
            $postale= $data['adresse'];
            $texte= $data['message'];

            $email = (new Email())

            ->from($adresse)
            ->to('admin@admin.com')
            ->subject('Time for Symfony Mailer!')
            ->text($texte);
            
           
        $mailer->send($email);

       }

        return $this->renderForm('contact/index.html.twig', [
            'formulaire' => $form
        ]);
    }
}
