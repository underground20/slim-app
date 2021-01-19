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
        return $builder->select('task.id, task.name, user.name as user_name')
            ->from(Task::class, 'task')
            ->innerjoin(User::class, 'user', Join::WITH, 'task.userId=user.id')
            ->getQuery()
            ->getArrayResult();
    }
}