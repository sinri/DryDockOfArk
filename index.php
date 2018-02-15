<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:30
 */

require_once __DIR__ . '/autoload.php';

date_default_timezone_set("Asia/Shanghai");

require_once __DIR__ . '/loadComponents.php';

$web_service = Ark()->webService();
$web_service->setLogger(\sinri\DryDockOfArk\core\DryDock::logger());

$web_service->getRouter()->setErrorHandler(function ($error) {
    echo json_encode(['error' => $error]);
});

$web_service->getRouter()->loadAllControllersInDirectoryAsCI(
    __DIR__ . '/controller',
    'api/',
    'sinri\DryDockOfArk\controller\\',
    [
        \sinri\DryDockOfArk\filter\DryDockFilter::class,
    ]
);

$web_service->getRouter()->get("", function () {
    header("Location: frontend/");
});

$web_service->handleRequest();