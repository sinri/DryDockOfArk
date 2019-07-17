<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:30
 */

use Psr\Log\LogLevel;

$config['project_name'] = 'DryDockOfArk';

$config['log'] = [
    "path" => __DIR__ . '/../log',
    "level" => LogLevel::INFO,
];

$config['cache'] = [
    "FileSample" => [
        "type" => "file",
        "path" => __DIR__ . '/../cache',
    ],
    "DummySample" => [
        "type" => "dummy",
    ],
    // need ark redis components
    "RedisSample" => [
        "type" => "redis",
        "host" => "",
        "port" => 6379,
        "database" => 255, // as your own
        "password" => null, // or "PASS"
    ],
];

$config['pdo'] = [
    "default" => [
        "host" => "",
        "port" => 3306,
        "username" => "",
        "password" => "",
        "database" => "",
        "charset" => "utf8",
        "engine" => "mysql",
        "options" => null,
    ],
];