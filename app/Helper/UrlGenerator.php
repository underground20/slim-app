<?php

namespace App\Helper;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;

class UrlGenerator
{
    public static function create(ServerRequestInterface $request, string $routeName, array $params): string
    {
        $routeContext = RouteContext::fromRequest($request);
        return $routeContext->getRouteParser()->urlFor($routeName, $params);
    }
}