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
            
            'info_name' => 'required',
            'info_telphone' => 'required|regex:/^1[3456789]\d{9}$/',
            'info_nickname'=> 'required|max:12|min:2',
            'info_address' => 'required',
        ];
    }


       /**
         * 获取已定义验证规则的错误消息。
         *
         * @return array
         */
        public function messages()
        {
            return [

                'info_name.required' => '姓名不能为空',
                'info_telphone.required' => '手机号不能为空',
                'info_telphone.regex' => '手机号输入格式不正确',
                'info_nickname.required' => '昵称不能为空',
                'info_nickname.max' => '请输入2~16位的用户名',
                'info_nickname.min' => '请输入2~16位的用户名',
                'info_address.required' => '地址不能为空',
               
            ];
        }
}
