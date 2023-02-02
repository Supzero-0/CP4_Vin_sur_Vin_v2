<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création d’un utilisateur de type partner (= partenaire)
        $partner = new User();
        $partner->setFirstname('Jean');
        $partner->setLastname('La Vignasse');
        $partner->setDomain('Du trou');
        $partner->setEmail('partner@vin.com');
        $partner->setRoles(['ROLE_PARTNER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $partner,
            'partner'
        );
        $partner->setPassword($hashedPassword);
        $manager->persist($partner);

        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setFirstname('Jean');
        $admin->setLastname('L\'admin');
        $admin->setEmail('admin@vin.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            'admin'
        );
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        $faker = Factory::create();

        for ($i = 0; $i < 25; $i++) {
            $partnerFixtures = new User();
            $partnerFixtures->setFirstname($faker->firstName());
            $partnerFixtures->setLastname($faker->lastName());
            $partnerFixtures->setDomain($faker->company());
            $partnerFixtures->setEmail($faker->email());
            $partnerFixtures->setRoles(['ROLE_PARTNER']);
            $hashedPassword = $this->passwordHasher->hashPassword(
                $partnerFixtures,
                'partner'
            );
            $partnerFixtures->setPassword($hashedPassword);
            $partnerFixtures->setIsVerified(1);

            $manager->persist($partnerFixtures);
            $this->addReference('partner_' . $i, $partnerFixtures);
        }

        // Sauvegarde des 2 nouveaux utilisateurs :
        $manager->flush();
    }
}
