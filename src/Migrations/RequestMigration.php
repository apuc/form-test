<?php


namespace App\Migrations;


use App\Core\IMigrationable;
use App\Models\Database;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RequestMigration extends Migration implements IMigrationable
{
    static public $table = 'request1';

    public function up()
    {
        if (!Database::getSchema()->hasTable(self::$table)) {
            Database::getSchema()->create(self::$table,
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('city_id')->unsigned();
                    $table->foreign('city_id')->references('id')->on(CityMigration::$table);
                    $table->integer('user_id')->unsigned();
                    $table->foreign('user_id')->references('id')->on(UserMigration::$table);
                    $table->text('request');
                });
        }
    }

    public function down()
    {
        Database::getSchema()->dropIfExists(self::$table);
    }
}