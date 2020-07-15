<?php


namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Database
 * @package App\Models
 */
class Database
{
    /**
     * Database constructor.
     */
    function __construct() {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => DBDRIVER,
            'host'      => DBHOST,
            'database'  => DBNAME,
            'username'  => DBUSER,
            'password'  => DBPASSWORD,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->bootEloquent();
    }
}