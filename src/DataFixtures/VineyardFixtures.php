<?php

namespace App\DataFixtures;

use App\Entity\Vineyard;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VineyardFixtures extends Fixture
{
    const VINEYARD = [
        'Alsace',
        'Beaujolais',
        'Bordeaux',
        'Bourgogne',
        'Jura',
        'Languedoc-Roussilon',
        'Loire',
        'Rhône',
        'Savoie',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::VINEYARD as $key => $name) {
            $vineyard = new Vineyard();
            $vineyard->setName($name);
            $manager->persist($vineyard);
            $this->addReference('vineyard_' . $name, $vineyard);
        }
        $manager->flush();
    }
}
