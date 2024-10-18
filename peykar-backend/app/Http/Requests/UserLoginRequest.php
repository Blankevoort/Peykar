<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => ['string'],
            'email' => ['string', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
}
