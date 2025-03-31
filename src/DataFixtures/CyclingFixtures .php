<?php

namespace App\DataFixtures;

use App\Entity\Cycling;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CyclingFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        for ($i = 0; $i < 100; $i++) {
            $cycling = new Cycling();
            
            $cycling->setName($faker->name); 
            $cycling->setUsername($faker->userName); 
            $cycling->setDateOfBirth($faker->dateTimeBetween('-40 years', '-20 years')); 
            $cycling->setWeight($faker->numberBetween(50, 90)); 
            $cycling->setSize($faker->numberBetween(160, 200)); 
            $cycling->setTeam($faker->company); 
            $cycling->setNationality($faker->country); 
            
            $manager->persist($cycling);
        }
        
        $manager->flush();
    }
}
