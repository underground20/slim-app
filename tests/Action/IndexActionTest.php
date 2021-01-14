<?php

namespace Test\Action;

use App\Action\IndexAction;
use App\Repository\TaskRepository;
use Laminas\Diactoros\ServerRequestFactory;
use PHPUnit\Framework\TestCase;

class IndexActionTest extends TestCase
{
    public function testSuccess()
    {
        $repository = $this->createMock(TaskRepository::class);
        $action = new IndexAction($repository);
        $request = ServerRequestFactory::fromGlobals();
        $response = $action->handle($request);

        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('Create task', $response->getBody()->getContents());
    }
}