<?php
declare(strict_types=1);

use App\Application\Actions\Seminovos\ListSemiNovoAction;
use App\Application\Actions\Seminovos\ViewSemiNovoAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->group('/seminovos', function (Group $group) {
        $group->get('/{tipo_veiculo}', ListSemiNovoAction::class);
        $group->get('/{tipo_veiculo}/{descricao}', ViewSemiNovoAction::class);
    });
};
