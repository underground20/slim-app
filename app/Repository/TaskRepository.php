<?php

namespace App\Repository;

use App\Entity\Task;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Join;

class TaskRepository
{
    private $em;
    private $builder;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->builder = $this->em->createQueryBuilder();
    }

    public function createTask($name, $userId)
    {
        $task = new Task();
        $task->setName($name);
        $task->setUserId($userId);

        $this->em->persist($task);
        $this->em->flush();

        return $task->getId();
    }

    public function findAll()
    {
        return $this->builder->select('task.id, task.name, user.name as user_name')
            ->from(Task::class, 'task')
            ->innerjoin(User::class, 'user', Join::WITH, 'task.userId=user.id')
            ->getQuery()
            ->getArrayResult();
    }

    public function findAllByUser($id)
    {
        return $this->builder->select('task.id, task.name, user.name as user_name')
            ->from(Task::class, 'task')
            ->innerjoin(User::class, 'user', Join::WITH, 'task.userId=user.id')
            ->where('user.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getArrayResult();
    }

    public function findOneByUser($userId, $id)
    {
        return $this->builder->select('task.id, task.name, user.name as user_name')
            ->from(Task::class, 'task')
            ->innerjoin(User::class, 'user', Join::WITH, 'task.userId=user.id')
            ->where('user.id = :userId')
            ->setParameter(':userId', $userId)
            ->andWhere('task.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getResult();
    }

    public function delete($id)
    {
        $task = $this->em->find(Task::class, $id);
        $this->em->remove($task);
        $this->em->flush();
    }
}