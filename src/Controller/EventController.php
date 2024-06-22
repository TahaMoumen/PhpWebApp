<?php

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Attribute\Route;

// class EventController extends AbstractController
// {
//     #[Route('/event', name: 'app_event')]
//     public function index(): Response
//     {
//         return $this->render('event/index.html.twig', [
//             'controller_name' => 'EventController',
//         ]);
//     }
// }

// // src/Controller/EventController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Form\EventType;

class EventController extends AbstractController
{
    #[Route('/event/new', name: 'event_new')]
    public function new(Request $request): Response
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Logique pour sauvegarder l'événement
        }

        return $this->render('event/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/events', name: 'event_list')]
    public function list(): Response
    {
        // Logique pour récupérer les événements
        return $this->render('event/list.html.twig', [
            'events' => [], // Remplacer par la liste des événements
        ]);
    }
}

