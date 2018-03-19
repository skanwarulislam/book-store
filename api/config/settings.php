<?php

$settings = [];
$mysql_host = getenv('MYSQL_HOST');
$mysql_password = getenv('MYSQL_ROOT_PASSWORD');
// Slim settings
$settings['displayErrorDetails'] = true;
$settings['determineRouteBeforeAppMiddleware'] = true;

// Path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

// Database settings
$settings['db']['host'] = $mysql_host;
$settings['db']['username'] = 'root';
$settings['db']['password'] = $mysql_password;
$settings['db']['database'] = 'bookstore';
$settings['db']['charset'] = 'utf8';
$settings['db']['collation'] = 'utf8_unicode_ci';

return $settings;
