<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CityModel
 * @package App\Models
 */
class CityModel extends Model
{
    protected $table = 'city';
    protected $fillable = ['id', 'city'];

    /**
     * @return array
     */
    public static function selectAllArray(): array
    {
        return self::all()->toArray();
    }
}