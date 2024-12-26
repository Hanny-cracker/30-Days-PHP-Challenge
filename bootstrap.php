<?php

use Core\App;
use Core\Container;

$container = new Container();

$container->bind('Database', function () {
    $config = require(base_path('config.php'));

    return new Database($config['database']);
});

$db = $container->resolve('Database');

App::setContainer($container);