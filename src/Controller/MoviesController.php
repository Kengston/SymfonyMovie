<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        $names = ['Joe', 'Biden', 'Donald', 'Trump'];

        return $this->render('movies/index.html.twig', [
            'controller_name' => 'MoviesController',
            'names' => $names
        ]);
    }
}
