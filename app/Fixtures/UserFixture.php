<?php

namespace App\Fixtures;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('John');

        $manager->persist($user);
        $manager->flush();
        $this->addReference('user-id', $user);
    }
}