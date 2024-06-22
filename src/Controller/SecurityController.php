<?php

namespace App\Controller;

use App\Form\UserLoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(Request $request): Response
    {
        $form = $this->createForm(UserLoginFormType::class);

        return $this->render('user/login.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        // Cette méthode ne sera jamais exécutée, car la déconnexion est gérée par Symfony Security
        throw new \Exception('This should never be reached!');
    }

    #[Route('/forgot-password', name: 'forgot_password')]
    public function forgotPassword(): Response
    {
        return $this->render('user/motdepasse.html.twig');
    }
}
