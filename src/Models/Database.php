<?php


namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Database
 * @package App\Models
 */
class Database
{
    private static $capsule = null;

    protected function __construct()
    {
    }

    public static function getSchema()
    {
        return self::getInstance()::schema();
    }

    public static function getInstance(): Capsule
    {
        if (self::$capsule === null) {
            self::$capsule = new Capsule();
            self::$capsule->addConnection([
                'driver' => DB_DRIVER,
                'host' => DB_HOST,
                'database' => DB_NAME,
                'username' => DB_USER,
                'password' => DB_PASSWORD,
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]);
            self::$capsule->bootEloquent();
            self::$capsule->setAsGlobal();
        }
        return self::$capsule;
    }

    /**
     * Одиночки не должны быть восстанавливаемыми из строк.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * Одиночки не должны быть клонируемыми.
     */
    protected function __clone()
    {
    }
}
