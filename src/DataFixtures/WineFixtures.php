<?php

namespace App\DataFixtures;

use App\Entity\Wine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class WineFixtures extends Fixture
{
    const VINEYARD = [
        'vineyard_Alsace',
        'vineyard_Beaujolais',
        'vineyard_Bordeaux',
        'vineyard_Bourgogne',
        'vineyard_Jura',
        'vineyard_Languedoc-Roussilon',
        'vineyard_Loire',
        'vineyard_Rhône',
        'vineyard_Savoie',
    ];

    const COLOR = [
        'Blanc',
        'Rouge',
        'Rosé',
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $wine = new Wine();
            $wine->setColor($faker->randomElement(self::COLOR));
            $wine->setYear($faker->year());
            $wine->setPrice($faker->numberBetween(6, 25));
            $wine->setDescription($faker->realText($faker->numberBetween(150, 300)));
            $wine->setVineyard($this->getReference($faker->randomElement(self::VINEYARD)));
            $manager->persist($wine);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            VineyardFixtures::class,
        ];
    }
}
