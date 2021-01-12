<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TaskRepository
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createTask($name)
    {
        $task = new Task();
        $task->setName($name);

        $this->em->persist($task);
        $this->em->flush();

        return $task->getId();
    }
}