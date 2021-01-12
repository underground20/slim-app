<?php

namespace App\Action;

use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class IndexAction implements RequestHandlerInterface
{
    private $taskRepo;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $this->taskRepo->createTask('watch');
        return new HtmlResponse('Create task: ' . $id);
    }
}