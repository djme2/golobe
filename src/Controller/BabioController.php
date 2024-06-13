<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BabioController extends AbstractController
{
    #[Route('/babio', name: 'app_babio')]
    public function index(): Response
    {
        return $this->render('babio/index.html.twig', [
            'controller_name' => 'BabioController',
        ]);
    }
}
