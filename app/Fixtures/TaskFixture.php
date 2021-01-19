<?php

namespace App\Fixtures;

use App\Entity\Task;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TaskFixture extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $task = new Task();
        $task->setName('do some');
        $task->setUserId($this->getReference('user-id'));
        $manager->persist($task);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class
        ];
    }
}