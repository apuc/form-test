<?php


namespace App\Migrations;


use App\Core\IMigrationable;
use App\Models\Database;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UserMigration extends Migration implements IMigrationable
{
    static public $table = 'user1';

    public function up()
    {
        if (!Database::getSchema()->hasTable(self::$table)) {
            Database::getSchema()->create(self::$table,
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name', 30);
                    $table->string('email', 50);
                });
        }
    }

    public function down()
    {
        Database::getInstance()::schema()->dropIfExists(self::$table);
    }
}