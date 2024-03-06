<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername('axel');
        $admin->setEmail('axel.hayalian@gmail.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'coucricacou94'));
        $manager->persist($admin);

        $zula = new User();
        $zula->setUsername('zula');
        $zula->setEmail('zula.haya@gmail.com');
        $zula->setPassword($this->passwordHasher->hashPassword($zula, 'coucricacou94'));
        $manager->persist($zula);

        $manager->flush();
    }
}
