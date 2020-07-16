<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class UserModel
 * @package App\Models
 */
class UserModel extends Model
{
    public $timestamps = false;
    protected $table = 'user';
    protected $fillable = ['email', 'name'];

    /**
     * @param $email
     * @param $name
     * @return mixed
     */
    public static function insertUser($email, $name): int
    {
        $user_model = new UserModel();
        $user_model->name = strip_tags($name);
        $user_model->email = strip_tags($email);
        $user_model->save();

        return $user_model->id;
    }
}