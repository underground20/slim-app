<?php

namespace App\Action;

use App\Repository\TaskRepository;
use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpBadRequestException;

class TaskDeleteAction implements RequestHandlerInterface
{
    private $taskRepo;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $params = $request->getParsedBody();
        $id = $params['id'];
        if (!$id) {
           throw new HttpBadRequestException($request);
        }
        $this->taskRepo->delete($params['id']);
        return (new EmptyResponse())->withHeader('Location', "/tasks");
    }
}