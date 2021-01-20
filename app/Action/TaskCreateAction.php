<?php

namespace App\Action;

use App\Entity\User;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TaskCreateAction implements RequestHandlerInterface
{
    private $taskRepo;
    private $userRepo;

    public function __construct(TaskRepository $taskRepo, UserRepository $userRepo)
    {
        $this->taskRepo = $taskRepo;
        $this->userRepo = $userRepo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getParsedBody();
        $user = $this->userRepo->findOne($params['userId']);
        $id = $this->taskRepo->createTask($params['name'], $user);
        return (new EmptyResponse())->withHeader('Location', "/tasks/view/user/{$params['userId']}");
    }
}