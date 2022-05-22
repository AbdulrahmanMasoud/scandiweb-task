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
     * Table
     */
    protected static $table;

    /**
     * Database query
     */
    protected static $query;

    /**
     * Database select
     */
    protected static $select;

    /**
     * Where query
     */
    protected static $where;

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
    private static function instance()
    {
        static::connect();
        if (! self::$instance) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    /**
     * Define table
     * @param string $table
     * @return object $instance
     */
    public static function table($table)
    {
        static::$table = '`'.$table.'`';
        return static::instance();
    }

    /**
     * Select from database
     * @return object $instance
     */
    public static function select()
    {
        $select = func_get_args();
        $select = implode(',', $select);

        static::$select = $select;
        return static::instance();
    }

    /**
     * Where query
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return object $instance
     */
    public static function where($column, $operator, $value)
    {
        $where = '`'. $column .'`'. $operator . $value;

        static::$where = $where;
        return static::instance();
    }

    /**
     * Database Query
     */
    public static function query($query = null)
    {
        static::instance();
        if ($query == null) {
            if (! static::$table) {
                throw new Exception("Pleas select your table");
            }
            $query = "SELECT ";
            $query .= static::$select ?: ' * ';
            $query .= " FROM ".static::$table." ";
            $query .= " WHERE ".static::$where ?: " ";
        }
        static::$query = $query;
        return static::instance();
    }

    public static function getQuery()
    {
        static::query(static::$query);
        $x= DB::$connection->query(static::$query, PDO::FETCH_ASSOC);
        var_dump($x->fetch());
    }
}
