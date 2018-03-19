<?php

use Slim\Container;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Connection;

/* @var \Slim\App $app */
$container = $app->getContainer();

// Activating routes in a subfolder
$container['environment'] = function () {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);
    return new Slim\Http\Environment($_SERVER);
};
$container[Connection::class] = function (Container $container) {
    $settings = $container->get('settings');
    $config = [
        'driver' => 'mysql',
        'host' => $settings['db']['host'],
        'database' => $settings['db']['database'],
        'username' => $settings['db']['username'],
        'password' => $settings['db']['password'],
        'charset'  => $settings['db']['charset'],
        'collation' => $settings['db']['collation'],
        'prefix' => '',
    ];
    $factory = new ConnectionFactory(new \Illuminate\Container\Container());
    $conn = $factory->make($config);
    $resolver = new \Illuminate\Database\ConnectionResolver();
    $resolver->addConnection('default', $conn);
    $resolver->setDefaultConnection('default');
    \Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
    return $conn;
};

$container[PDO::class] = function (Container $container) {
    return $container->get(Connection::class)->getPdo();
};

