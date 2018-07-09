<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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

                'position_name' => 'required|max:12|min:2',
                'position_price' => 'required',
                'position_url' => 'required',
                'position_url' => array('regex:/(http?|ftp?):\/\/(www)\.([^\.\/]+)\.(com|cn)(\/[\w-\.\/\?\%\&\=]*)?/i'),
                'position_desc' => 'required',
                'position_image' => 'image|required',

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

                'position_name.required' => '广告名不能为空',
                'position_name.max' => '请输入2~12位的广告名称',
                'position_name.min' => '请输入2~12位的广告名称',
                'position_price.required' => '广告价格不能为空',
                'position_url.required' => '广告链接不能为空',
                'position_url.regex' => '广告链接输入格式不正确',
                'position_desc.required' => '广告描述不能为空',
                'position_image.image' => '广告图片格式不正确',
                'position_image.required' => '广告图片不能为空',
            ];
        }
}
