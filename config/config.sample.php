<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:30
 */

$config['project_name'] = 'DryDock';

$config['log'] = [
    "default" => "DryDock",
    "list" => [
        "DryDock" => [
            "path" => __DIR__ . '/../log',
        ],
    ],
];

$config['cache'] = [
    "default" => "DummySample",
    "list" => [
        "FileSample" => [
            "type" => "file",
            "path" => __DIR__ . '/../cache',
        ],
        "DummySample" => [
            "type" => "dummy",
        ],
        "RedisSample" => [
            "type" => "redis",
            "host" => "",
            "port" => 6379,
            "database" => 255, // as your own
            "password" => null, // or "PASS"
        ]
    ],
];

$config['database'] = [
    "default" => "DryDock",
    "list" => [
        "DryDock" => [
            "host" => "",
            "port" => 3306,
            "username" => "",
            "password" => "",
            "database" => "",
            "charset" => "utf8",
            "engine" => "mysql",
            "options" => null,
        ],
    ],
];