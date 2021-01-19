<?php

namespace App\Repository;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;

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

    public function findAll()
    {
        $builder = $this->em->createQueryBuilder();
        return $builder->select('task')
            ->from(Task::class, 'task')
            ->getQuery()
            ->getArrayResult();
    }
}