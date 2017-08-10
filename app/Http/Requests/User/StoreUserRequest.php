<?php
/**
 * Created by PhpStorm.
 * @author Rivalani Simon Hlengani
 * @since 2017/08/05
 * Time: 6:40 PM
 */

namespace App\Http\Requests\User;


use Urameshibr\Requests\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|alpha_num|min:3|max:20|unique:users',
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:6',
            'role_id'=> 'required'
        ];
    }
}