<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies', methods: ['GET'],  name: 'app_movies')]
    public function index(): Response
    {
        // findAll - SELECT * FROM REPOSITORY;
        // find() - SELECT * from movies WHERE id = 5;
        // findBy() - SELECT * from movies ORDER BY DESC
        // findOneBy() - SELECT * form movies WHERE id = 6 AND
        // title = "The Dark Knight" ORDER BY id DESC
        // count() - SELECT COUNT() from movies WHERE id = 6
        // getClassName()

        $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies/{id}', methods: ['GET'], name: 'app_movie')]
    public function show($id): Response
    {
        // findAll - SELECT * FROM REPOSITORY;
        // find() - SELECT * from movies WHERE id = 5;
        // findBy() - SELECT * from movies ORDER BY DESC
        // findOneBy() - SELECT * form movies WHERE id = 6 AND
        // title = "The Dark Knight" ORDER BY id DESC
        // count() - SELECT COUNT() from movies WHERE id = 6
        // getClassName()

        $movie = $this->movieRepository->find($id);

        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }
}
