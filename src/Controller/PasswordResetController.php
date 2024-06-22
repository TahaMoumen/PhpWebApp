<?php

namespace App\Controller;

use App\Form\PasswordResetFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PasswordResetController extends AbstractController
{
    #[Route('/reset-password', name: 'reset_password')]
    public function resetPassword(Request $request): Response
    {
        $form = $this->createForm(PasswordResetFormType::class);

        // Handle form submission logic if needed
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Process form data, e.g., send email for password reset
        }

        return $this->render('user/motdepasse.html.twig', [
            'form' => $form->createView(), // Pass the form to the template
        ]);
    }
}
