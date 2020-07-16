<?php


namespace App\Migrations;


use App\Core\IMigrationable;
use App\Models\Database;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CityMigration extends Migration implements IMigrationable
{
    static public $table = 'city1';

    public function up()
    {
        if (!Database::getSchema()->hasTable(self::$table)) {
            Database::getSchema()->create(self::$table,
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('city', 30);
                });
        }
    }

    public function down()
    {
        Database::getSchema()->dropIfExists(self::$table);
    }
}