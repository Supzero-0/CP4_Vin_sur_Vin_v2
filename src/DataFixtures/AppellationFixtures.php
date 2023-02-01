<?php

namespace App\DataFixtures;

use App\Entity\Appellation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppellationFixtures extends Fixture implements DependentFixtureInterface
{
    const ALSACE = [
        'Alsace',
        'Grand Cru',
        'Crémant',
    ];

    const BEAUJOLAIS = [
        'Beaujolais',
        'Beaujolais Village',
        'Brouilly',
        'Chénas',
        'Chirouble',
        'Côtes de Brouilly',
        'Fleurie',
        'Juliénas',
        'Morgon',
        'Moulin-à-vent',
        'Régnié',
        'Saint-Amour'
    ];

    const BORDEAUX = [
        'Bordeaux',
        'Côtes de Bordeaux',
        'Cérons',
        'Côtes de Blaye',
        'Crémant',
        'Fronsac',
        'Loupiac',
        'Médoc',
        'Pessac-Léognan',
        'Pormerol',
        'Saint-Emilion',
        'Saint-Julien'
    ];

    const BOURGOGNE = [
        'Bâtard-Montrachet',
        'Bourgogne',
        'Chablis',
        'Chambertin',
        'Charlemagne',
        'Clos de la Roche',
        'Corton',
        'Crémant',
        'Gevrey-Chambertin',
        'La Tâche',
        'Mâcon',
        'Mercurey',
        'Nuits-Saint-Georges',
        'Pommard',
        'Pouilly-Fuissé',
        'Romanée-Conti',
        'Saint-Véran',
        'Viré-Clessé'
    ];

    const JURA = [
        'Arbois',
        'Côtes de Jura',
        'Crémant',
        'Macvin',
    ];

    const LANGUEDOC = [
        'Cabardès',
        'Collioure',
        'Côtes du Rousillon',
        'Crémant',
        'Fitou',
        'Languedoc',
        'Minervois',
        'Muscat',
        'Saint-Chinian'
    ];

    const LOIRE = [
        'Anjou',
        'Chinon',
        'Côte Roannaise',
        'Crémant',
        'Muscadet',
        'Pouilly-Fumé',
        'Quincy',
        'Sancerre',
        'Vouvray'
    ];

    const RHONE = [
        'Châteauneuf-du-Pape',
        'Clairette de Die',
        'Condrieu',
        'Côte Rotie',
        'Côtes du Rhône',
        'Crozes-Hermitage',
        'Luberon',
        'Saint-Joseph',
        'Ventoux',
        'Vinsobres'
    ];

    const SAVOIE = [
        'Bugey',
        'Roussette',
        'Savoie',
        'Seyssel',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ALSACE as $key => $name) {
            $alsace = new Appellation();
            $alsace->setName($name);
            $alsace->setVineyard($this->getReference('vineyard_Alsace'));
            $manager->persist($alsace);
        }

        foreach (self::BEAUJOLAIS as $key => $name) {
            $beaujolais = new Appellation();
            $beaujolais->setName($name);
            $beaujolais->setVineyard($this->getReference('vineyard_Beaujolais'));
            $manager->persist($beaujolais);
        }

        foreach (self::BORDEAUX as $key => $name) {
            $bordeaux = new Appellation();
            $bordeaux->setName($name);
            $bordeaux->setVineyard($this->getReference('vineyard_Bordeaux'));
            $manager->persist($bordeaux);
        }

        foreach (self::BOURGOGNE as $key => $name) {
            $bourgogne = new Appellation();
            $bourgogne->setName($name);
            $bourgogne->setVineyard($this->getReference('vineyard_Bourgogne'));
            $manager->persist($bourgogne);
        }

        foreach (self::JURA as $key => $name) {
            $jura = new Appellation();
            $jura->setName($name);
            $jura->setVineyard($this->getReference('vineyard_Jura'));
            $manager->persist($jura);
        }

        foreach (self::LANGUEDOC as $key => $name) {
            $languedoc = new Appellation();
            $languedoc->setName($name);
            $languedoc->setVineyard($this->getReference('vineyard_Languedoc-Roussilon'));
            $manager->persist($languedoc);
        }

        foreach (self::LOIRE as $key => $name) {
            $loire = new Appellation();
            $loire->setName($name);
            $loire->setVineyard($this->getReference('vineyard_Loire'));
            $manager->persist($loire);
        }

        foreach (self::RHONE as $key => $name) {
            $rhone = new Appellation();
            $rhone->setName($name);
            $rhone->setVineyard($this->getReference('vineyard_Rhône'));
            $manager->persist($rhone);
        }

        foreach (self::SAVOIE as $key => $name) {
            $savoie = new Appellation();
            $savoie->setName($name);
            $savoie->setVineyard($this->getReference('vineyard_Savoie'));
            $manager->persist($savoie);
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
