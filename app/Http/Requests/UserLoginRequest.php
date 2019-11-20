<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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

    public function rules()
    {
        return [
            'account' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'account.required' => '帳號不可為空',
            'password.required' => '密碼不可為空',
        ];
    }
}
