<?php


namespace App\Core;


interface IMigrationable
{
    public function up();

    public function down();
}
