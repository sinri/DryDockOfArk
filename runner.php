<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 20:54
 */


require_once __DIR__ . '/autoload.php';

date_default_timezone_set("Asia/Shanghai");

require_once __DIR__ . '/loadComponents.php';

\sinri\ark\cli\ArkCliProgram::run('sinri\DryDockOfArk\program\\');

// you may call:
// php runner.php DryDockProgram
// php runner.php DryDockProgram Default
// php runner.php DryDockProgram Work CustomizedValue
// php runner.php DryDockProgram Work CustomizedValue OverrodeValue

// Note, you need to use PHP 7, such as
// /usr/local/Cellar/php70/7.0.23_15/bin/php runner.php DryDockProgram
