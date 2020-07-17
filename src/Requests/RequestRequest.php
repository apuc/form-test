<?php


namespace App\Requests;

/**
 * Class RequestRequest
 * @package App\Requests
 * @property string $city
 * @property string $name
 * @property string $email
 * @property string $request
 */
class RequestRequest extends Request
{
    public $city;
    public $name;
    public $email;
    public $request;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'city' => 'required',
            'name' => 'required|max:30',
            'email' => 'required|email|max:50',
            'request' => 'required|max:1000'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле ":attribute" обязательно к заполнению',
            'email' => 'Поле "Email" заполненно некорректно',
            'max' => 'Поле не должно содержать больше :max симолов'
        ];
    }
}
