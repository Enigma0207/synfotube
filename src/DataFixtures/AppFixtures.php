<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    { 
        $faker = Factory::create('fr_FR');//variable générator
        for($i = 0; $i <= 50; $i++){
        $ingredient = new Ingredient();
        $ingredient->setName($faker->word());
        $ingredient->setPrix(0, 100); // Assurez-vous que le prix est défini correctement ici.
        $manager->persist($ingredient);
    }
        $manager->flush();
    }
}


