<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:30
 */

use sinri\ark\io\ArkWebOutput;
use sinri\ark\web\ArkRouteErrorHandler;
use sinri\DryDockOfArk\filter\DryDockFilter;

require_once __DIR__ . '/autoload.php';

date_default_timezone_set("Asia/Shanghai");

require_once __DIR__ . '/loadComponents.php';

$web_service = Ark()->webService();
$web_service->setLogger(Ark()->logger('web'));

$web_service->getRouter()->setErrorHandler(
    ArkRouteErrorHandler::buildWithCallback(
        function ($error_message, $status_code) {
            Ark()->webOutput()->sendHTTPCode($status_code);
            Ark()->webOutput()->jsonForAjax(ArkWebOutput::AJAX_JSON_CODE_FAIL, ['error' => $error_message]);
        }
    )
);

$web_service->getRouter()->loadAllControllersInDirectoryAsCI(
    __DIR__ . '/controller',
    'api/',
    'sinri\DryDockOfArk\controller\\',
    [
        DryDockFilter::class,
    ]
);

$web_service->getRouter()->get("", function () {
    header("Location: frontend/");
});

$web_service->handleRequest();