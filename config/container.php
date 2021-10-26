<?php

use DI\ContainerBuilder;
use Doctrine\DBAL\Connection;

$builder = new ContainerBuilder();

$builder->addDefinitions([
    Connection::class => \GroupLife\Api\database()
]);

return $builder->build();
