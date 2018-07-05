<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            
             'link_name' => 'required|max:6|min:2',
            'link_url' => 'required',
            'link_url' => array('regex:/(http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|cn)(\/[\w-\.\/\?\%\&\=]*)?/i'),
           

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

            'link_name.required' => '链接名不能为空',
            'link_name.max' => '请输入2-6位的链接名称',
            'link_name.min' => '请输入2-6位的链接名称',
            'link_url.required' => '链接地址不能为空', 
            'link_url.regex' => '链接格式不正确,正确格式为http://www.***.com或者http://www.***.cn',
  

        ];

    }
}
