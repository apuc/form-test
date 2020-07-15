<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = ['email', 'name'];

    public static function insertRequest($email, $name)
    {
        $user = self::create([
            'email' => $email,
            'name' => $name,
        ]);

        return $user;
    }
}