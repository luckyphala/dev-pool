<?php
/**
 * Created by PhpStorm.
 * @author Rivalani Simon Hlengani
 * @since 2017/08/05
 * Time: 7:44 PM
 */

namespace App\Http\Requests\User;


use Urameshibr\Requests\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

        ];
    }
}