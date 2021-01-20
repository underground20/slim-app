<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository
{
    private $em;
    private $builder;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->builder = $this->em->createQueryBuilder();
    }

    public function findOne($id)
    {
        return $this->em->find(User::class, $id);
    }
}