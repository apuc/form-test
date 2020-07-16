<?php

use App\Migrations\CityMigration;
use App\Migrations\RequestMigration;
use App\Migrations\UserMigration;
use App\Models\Database;
use samejack\PHP\ArgvParser;

require_once(__DIR__ . '/vendor/autoload.php');
require_once __DIR__ . '/config.php';
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/');

Database::getInstance();

$argvParser = new ArgvParser();

switch ($argv[1]) {
    case 'up':
        $arr_migrations = [new UserMigration(), new CityMigration(), new RequestMigration()];
        foreach ($arr_migrations as $migration) {
            $migration->up();
        }
        echo 'All tables are up';
        break;
    case 'down':
        $arr_migrations = [new RequestMigration(), new UserMigration(), new CityMigration()];
        foreach ($arr_migrations as $migration) {
            $migration->down();
        }
        echo 'All tables are down';
        break;
    default:
        echo 'There is no such param...';
}
