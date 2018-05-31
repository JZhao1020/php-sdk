<?php
namespace PHPSDK;
/**
 * 类的自动加载
 */
spl_autoload_register(function ($calss_name){
    /**
     * 1.判断文件是否存在
     * 2.加载文件
     */
    $filename = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $calss_name) . '.php';
    file_exists($filename) && require($filename);
});

/**
 * Class Loader
 * @package lib
 */
class Loader{
    /**
     * 对象缓存
     * @var array
     */
    protected static $cache = array();

    static function & get($calss_name){
        $index = md5(strtolower($calss_name));
        if (!isset(self::$cache[$index])) {
            $class = '\\lib\\'.$calss_name;
            self::$cache[$index] = new $class();
        }
        return self::$cache[$index];
    }

}