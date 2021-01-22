<?php

namespace App\Middlewares;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpMethodNotAllowedException;
use Slim\Exception\HttpNotFoundException;

class ErrorHandlerMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        }
        catch (HttpNotFoundException $exception) {
            return  new JsonResponse(['404' => 'Route not found'], 404);
        }
        catch (HttpMethodNotAllowedException $exception) {
            return new JsonResponse(['exception' => $exception->getMessage()], 405);
        }
        catch (HttpBadRequestException $exception) {
            return new JsonResponse(['exception' => 'Not pass request data']);
        }
    }
}