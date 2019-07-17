<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:30
 */

use sinri\ark\core\ArkHelper;

require_once __DIR__ . '/vendor/autoload.php';

ArkHelper::registerAutoload(
    "sinri\DryDockOfArk",
    __DIR__,
    ".php"
);