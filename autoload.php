<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:30
 */

require_once __DIR__ . '/vendor/autoload.php';

\sinri\ark\core\ArkHelper::registerAutoload(
    "sinri\DryDockOfArk",
    __DIR__,
    ".php"
);