<?php

namespace App\Controller;

use App\Form\ContactType;
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
            
           
            $adresse = $data['email'];
            $message = $data['message'];

            $email = (new Email())
            ->from($adresse)
            ->to('jphilippe.champion@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text($message);
           
        $mailer->send($email);

       }

        return $this->renderForm('contact/index.html.twig', [
            'formulaire' => $form
        ]);
    }
}
