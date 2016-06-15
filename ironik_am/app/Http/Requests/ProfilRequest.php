<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfilRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image',
            'description'=>'',
            'name' => 'max:255',
            'lastname'=>'max:255',
            'username'=>'max:255|unique:users',
            'city'=>'max:255',
            'naissance'=>'date_format:Y-m-d',
            'genre'=>'boolean',
            'email' => 'email|max:255|unique:users',
            'password' => 'min:6|confirmed',

        ];
    }
}
