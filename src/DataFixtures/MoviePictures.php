<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is description of the Dark Knight');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2023/03/14/21/53/sculpture-7853242_1280.jpg');
        $manager->persist($movie);
    }
}
