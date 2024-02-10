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

        //Add data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Avengers');
        $movie2->setReleaseYear(2011);
        $movie2->setDescription('This is description of the Avengers');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2019/05/10/18/21/thanos-4194122_1280.png');

        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));

        $manager->flush();
    }
}
