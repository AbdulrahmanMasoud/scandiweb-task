<?php
namespace Scandiweb\Product\Database;

use Exception;
use PDO;
use PDOException;

class DB
{
    /**
     * Database instance
     */
    protected static $instance;

    /**
     * Database connection
     */
    protected static $connection;
    /**
     * Database Config
     */
    protected static $config = [
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'blog',
        'username' => 'masoud',
        'password' => 'password',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]
    ];
    
    /**
     * Connect to database
     */
    private static function connect()
    {
        if (! static::$connection) {
            try {
                static::$connection = new PDO(
                    "mysql:dbname=".static::$config['database'].";host=".static::$config['host']."",
                    static::$config['username'],
                    static::$config['password'],
                    static::$config['options']
                );
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    /**
     * Get the instance of the class
     */
    public static function instance()
    {
        static::connect();
        if (! self::$instance) {
            self::$instance = new DB();
        }

        return self::$instance;
    }
}
