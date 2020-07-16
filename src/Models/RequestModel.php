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

    /**
     * @param $city_id
     * @param $user_id
     * @param $request
     * @return int
     */
    public static function insertRequest($city_id, $user_id, $request): int
    {
        $request_model = new RequestModel();
        $request_model->city_id = strip_tags($city_id);
        $request_model->user_id = strip_tags($user_id);
        $request_model->request = strip_tags($request);
        $request_model->save();

        return $request_model->id;
    }

    /**
     * @return array
     */
    public static function selectAllRequest(): array
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