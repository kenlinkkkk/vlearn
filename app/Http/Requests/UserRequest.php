<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password_new' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%]).*$/i'
            ],
            'password_confirm' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%]).*$/i',
                'same:password_new'
            ]
        ];
    }

    public function messages()
    {
        return [
            'password_new.required' => 'Mật khẩu mới không được bỏ trống',
            'password_new.min' => 'Mật khẩu phải dài ít nhất 8 ký tự',
            'password_new.regex' => 'Mật khẩu phải bao gồm chữ thường, chữ hoa, số và kí tự đặc biệt',
            'password_confirm.required' => 'Mật khẩu mới không được bỏ trống',
            'password_confirm.min' => 'Mật khẩu phải dài ít nhất 8 ký tự',
            'password_confirm.regex' => 'Mật khẩu phải bao gồm chữ thường, chữ hoa, số và kí tự đặc biệt',
            'password_confirm.same' => 'Mật khẩu mới và xác nhận mật khẩu không giống nhau'
        ];
    }
}
