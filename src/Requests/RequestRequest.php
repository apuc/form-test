<?php


namespace App\Requests;

/**
 * Class RequestRequest
 * @package App\Requests
 */
class RequestRequest extends Request
{
    public $city;
    public $name;
    public $email;
    public $request;


    public function rules()
    {
        return [
            'city' => 'required',
            'name' => 'required|max:30',
            'email' => 'required|email|max:50',
            'request' => 'required|max:1000'
        ];
    }
}