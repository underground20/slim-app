<?php

namespace App\Action;

use App\Repository\TaskRepository;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
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
        $tasks = $this->taskRepo->findAll();
        return new JsonResponse($tasks, 200, [], JSON_PRETTY_PRINT);
    }
}