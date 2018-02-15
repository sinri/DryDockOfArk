<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 16:31
 */

namespace sinri\DryDockOfArk\controller;


use sinri\ark\web\implement\ArkWebController;

class Welcome extends ArkWebController
{
    public function index()
    {
        $this->_sayOK("Welcome to Dry Dock of Ark!");
    }
}