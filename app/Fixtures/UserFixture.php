<?php

namespace App\Fixtures;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixture extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $user = new User();
        $user->setName($faker->userName);

        $manager->persist($user);
        $manager->flush();
        $this->addReference('user-id', $user);
    }
}