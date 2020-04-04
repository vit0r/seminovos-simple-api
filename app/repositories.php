<?php
declare(strict_types=1);

use App\Domain\SemiNovo\SemiNovoRepository;
use App\Infrastructure\Persistence\SemiNovo\ConsumeSemiNovosSiteRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        SemiNovoRepository::class => \DI\autowire(ConsumeSemiNovosSiteRepository::class),
    ]);
};
