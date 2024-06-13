<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DatabaseController extends AbstractController
{
    #[Route('/database', name: 'app_database')]
    public function index(): Response
    {
        return $this->render('database/database.html.twig', [
            'controller_name' => 'DatabaseController',
        ]);
    }
}