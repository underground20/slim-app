<?php


namespace App\Action;


use App\Repository\TaskRepository;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TaskViewAction implements RequestHandlerInterface
{
    private $taskRepo;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getAttribute('id');
        $tasks = $this->taskRepo->findAllByUser($id);
        return new JsonResponse($tasks, 200, [], JSON_PRETTY_PRINT);
    }
}