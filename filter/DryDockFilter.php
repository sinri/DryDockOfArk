<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 16:30
 */

namespace sinri\DryDockOfArk\filter;


use sinri\ark\web\ArkRequestFilter;

class DryDockFilter extends ArkRequestFilter
{

    /**
     * Check request data with $_REQUEST, $_SESSION, $_SERVER, etc.
     * And decide if the request should be accepted.
     * If return false, the request would be thrown.
     * You can pass anything into $preparedData, that controller might use it (not sure, by the realization)
     * @param $path
     * @param $method
     * @param $params
     * @param null $preparedData @since 1.3.6
     * @param int $responseCode @since 2.2.0
     * @param null $error @since 2.2.0
     * @return bool
     */
    public function shouldAcceptRequest($path, $method, $params, &$preparedData = null, &$responseCode = 200, &$error = null)
    {
        return true;
    }

    /**
     * Give filter a name for Error Report
     * @return string
     */
    public function filterTitle()
    {
        return "DryDockFilter";
    }
}