<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    #[Route('/movies', name: 'app_movies')]
    public function index(): Response
    {
        // findAll - SELECT * FROM REPOSITORY;
        // find() - SELECT * from movies WHERE id = 5;
        // findBy() - SELECT * from movies ORDER BY DESC
        // findOneBy() - SELECT * form movies WHERE id = 6 AND
        // title = "The Dark Knight" ORDER BY id DESC
        // count() - SELECT COUNT() from movies WHERE id = 6
        // getClassName()
        $repository = $this->em->getRepository(Movie::class);

        $movies = $repository->findAll();

        return $this->render('movies/index.html.twig');
    }
}
