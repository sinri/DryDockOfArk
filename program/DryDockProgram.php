<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 20:53
 */

namespace sinri\DryDockOfArk\program;


use sinri\ark\cli\ArkCliProgram;

class DryDockProgram extends ArkCliProgram
{
    public function actionDefault()
    {
        echo "DryDockProgram Default Method here!" . PHP_EOL;
    }

    public function actionWork($a, $b = 'default_value')
    {
        echo "DryDockProgram Work: {$a}, {$b}" . PHP_EOL;
    }
}