<?php

namespace App\DataFixtures;

use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WishFixtures extends Fixture

{
    public function load(ObjectManager $manager): void
    {
        $wish1 = new Wish();
        $wish1->setTitle('Saut en parachute');
        $wish1->setDescription('Faire un saut en parachute au moins une fois dans sa vie');
        $wish1->setAuthor('John Doe');
        $wish1->setIsPublished(true);
        $wish1->setCreatedAt(new \DateTimeImmutable('2024-01-01 12:00:00'));
        $manager->persist($wish1);

        $wish2 = new Wish();
        $wish2->setTitle('Aller à la montagne');
        $wish2->setAuthor('John Doe');
        $wish2->setIsPublished(true);
        $wish2->setCreatedAt(new \DateTimeImmutable('2024-01-02 12:00:00'));
        $manager->persist($wish2);

        $wish3 = new Wish();
        $wish3->setTitle('Apprendre à jouer de la guitare');
        $wish3->setDescription('Pour pouvoir enfin jouer "Hotel California" à la guitare');
        $wish3->setAuthor('Pierre Jehan');
        $wish3->setIsPublished(true);
        $wish3->setCreatedAt(new \DateTimeImmutable('2024-01-02 09:30:00'));
        $manager->persist($wish3);

        $wish4 = new Wish();
        $wish4->setTitle('Partir en vacances');
        $wish4->setDescription('Partir en vacances au moins une fois par an');
        $wish4->setAuthor('Pierre Jehan');
        $wish4->setIsPublished(false);
        $wish4->setCreatedAt(new \DateTimeImmutable('2024-01-03 12:00:00'));
        $manager->persist($wish4);

        $manager->flush();
    }
}
