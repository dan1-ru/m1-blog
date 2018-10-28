<?php 
namespace Blog\Core;

/**
 * Parent DataMapper-pattern class
 */
class DataMapper
{
    public static $db;
    
    /**
     * DataMapper initialization from PDO instance
     *
     * @param $db - PDO instance
     * @return void
     */
    public static function init($db)
    {
        self::$db = $db;
    }
}