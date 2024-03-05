<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $travelAndAdventures = new Category();
        $travelAndAdventures->setName('Travel and adventures');
        $manager->persist($travelAndAdventures);
        $this->addReference('category_travel_and_adventure', $travelAndAdventures);

        $sports = new Category();
        $sports->setName('Sports');
        $manager->persist($sports);
        $this->addReference('category_sports', $sports);

        $entertainments = new Category();
        $entertainments->setName('Hobbies');
        $manager->persist($entertainments);
        $this->addReference('category_entertainment', $entertainments);

        $humanRelations = new Category();
        $humanRelations->setName('Relations humaines');
        $manager->persist($humanRelations);
        $this->addReference('category_human_relations', $humanRelations);

        $others = new Category();
        $others->setName('Others');
        $manager->persist($others);
        $this->addReference('category_others', $others);


        $manager->flush();
    }
}
