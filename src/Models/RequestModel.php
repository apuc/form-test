<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RequestModel
 * @package App\Models
 */
class RequestModel extends Model
{
    public $timestamps = false;
    protected $table = 'request';
    protected $fillable = ['city_id', 'user_id', 'request'];

    public static function insertRequest($city_id, $user_id, $request)
    {
        $request = RequestModel::create([
            'city_id' => $city_id,
            'user_id' => $user_id,
            'request' => $request
        ]);
        return $request;
    }

    /**
     * @return array
     */
    public static function selectAllRequest()
    {
        $requests = RequestModel::with('city')->with('user')->get()->toArray();
        return $requests;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\CityModel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\UserModel');
    }
}