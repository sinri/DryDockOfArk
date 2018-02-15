<?php
/**
 * Created by PhpStorm.
 * User: Sinri
 * Date: 2018/2/15
 * Time: 15:33
 */

namespace sinri\DryDockOfArk\core;


use sinri\ark\cache\implement\ArkDummyCache;
use sinri\ark\cache\implement\ArkFileCache;
use sinri\ark\cache\implement\ArkRedisCache;
use sinri\ark\core\ArkHelper;
use sinri\ark\core\ArkLogger;
use sinri\ark\database\ArkPDO;
use sinri\ark\database\ArkPDOConfig;

class DryDock
{
    /**
     * @param $keychain
     * @param null $default
     * @param string $aspect
     * @return mixed|null
     */
    public static function readConfig($keychain, $default = null, $aspect = "config")
    {
        $config_file = __DIR__ . '/../config/' . $aspect . ".php";
        if (!file_exists($config_file)) {
            return $default;
        }
        $config = [];

        /** @noinspection PhpIncludeInspection */
        require $config_file;

        return ArkHelper::readTarget($config, $keychain, $default);
    }

    /**
     * @param null $name
     * @throws \Exception
     */
    public static function loadDatabase($name = null)
    {
        if ($name === null) {
            $name = self::readConfig(['database', 'default'], 'default');
        }
        $config_array = self::readConfig(['database', 'list', $name]);
        ArkHelper::assertItem($config_array, 'The config of database is lack');
        $db = new ArkPDO();
        $db->setPdoConfig(new ArkPDOConfig($config_array));
        $db->connect();

        Ark()->registerDb($name, $db);
    }

    /**
     * @param null $name
     * @return ArkPDO
     */
    public static function db($name = null)
    {
        if ($name === null) {
            $name = self::readConfig(['database', 'default'], 'default');
        }
        return Ark()->db($name);
    }

    /**
     * @param null $name
     * @param bool $cliUseSTDOUT
     */
    public static function loadLogger($name = null, $cliUseSTDOUT = true)
    {
        if ($name === null) {
            $name = self::readConfig(['log', 'default'], 'DryDock');
        }
        $log_path = self::readConfig(['log', 'list', $name, 'path'], __DIR__ . '/../log');
        $logger = new ArkLogger($log_path, $name, $cliUseSTDOUT);

        Ark()->registerLogger($name, $logger);
    }

    /**
     * @param null $name
     * @return ArkLogger
     */
    public static function logger($name = null)
    {
        if ($name === null) {
            $name = self::readConfig(['log', 'default'], 'DryDock');
        }
        return Ark()->logger($name);
    }

    /**
     * @param null $name
     */
    public static function loadCache($name = null)
    {
        if ($name === null) {
            $name = self::readConfig(['cache', 'default'], 'DryDock');
        }
        $cache_config = self::readConfig(['cache', 'list', $name]);

        $cache_type = ArkHelper::readTarget($cache_config, 'type', 'dummy');

        switch ($cache_type) {
            case 'file':
                $path = ArkHelper::readTarget($cache_config, 'path', __DIR__ . '/../cache');
                $cache = new ArkFileCache($path);
                break;
            case 'redis':
                $host = ArkHelper::readTarget($cache_config, "host", "");
                $port = ArkHelper::readTarget($cache_config, "port", 6379);
                $database = ArkHelper::readTarget($cache_config, "database", 255);
                $password = ArkHelper::readTarget($cache_config, "password", null);
                $cache = new ArkRedisCache($host, $port, $database, $password);
                break;
            case 'dummy':
            default:
                $cache = new ArkDummyCache();
                break;
        }

        Ark()->registerCache($name, $cache);
    }

    /**
     * @param null $name
     * @return \sinri\ark\cache\ArkCache
     */
    public static function cache($name = null)
    {
        if ($name === null) {
            $name = self::readConfig(['cache', 'default'], 'DryDock');
        }
        return Ark()->cache($name);
    }
}