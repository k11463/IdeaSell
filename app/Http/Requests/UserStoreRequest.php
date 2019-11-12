<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'username' => 'required',
            'legal_name' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email不可為空',
            'username.required' => '使用者名稱不可為空',
            'legal_name.required' => '姓名不可為空',
            'birthday.required' => '生日不可為空',
            'phone.required' => '電話不可為空',
            'password.required' => '密碼不可為空',
        ];
    }
}
