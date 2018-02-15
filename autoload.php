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

try {
    // the logger is opened as default, but you can modify it.
    \sinri\DryDockOfArk\core\DryDock::loadLogger();

    // if you need cache support, add `loadCache`.
    // \sinri\DryDockOfArk\core\DryDock::loadCache();

    // if you need database, add `loadDatabase`.
    // \sinri\DryDockOfArk\core\DryDock::loadDatabase();
} catch (Exception $exception) {
    echo "FAILED IN LOADING COMPONENT... " . $exception;
    exit(1);
}