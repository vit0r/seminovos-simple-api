<?php
declare(strict_types=1);

use App\Application\Actions\Seminovos\ListSemiNovoAction;
use App\Application\Actions\Seminovos\ViewSemiNovoAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListSemiNovoAction::class);
        $group->get('/{id}', ViewSemiNovoAction::class);
    });
};
