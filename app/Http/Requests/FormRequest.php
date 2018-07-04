<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest extends FormRequest
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
            'goods_name' => 'required|unique:shop_goods|max:100',
            'goods_price'=>'required|regex:/^\d{0,9}\.\d{0,2}$/',
            'goods_stock'=>'required|regex:/^\d+$/',
            'goods_pic'=>'required',
            'goods_desc'=>'required',
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
            'goods_name.required'=>'商品名不能为空',
            'goods_name.unique'=>'商品名不能重复',
            'goods_name.max'=>'商品名格式不正确',
            'goods_price.required'=>'商品价格不能为空',
            'goods_price.regex'=>'商品价格格式不正确',
            'goods_stock.required'=>'商品库存不能为空',
            'goods_stock.regex'=>'商品库存格式不正确',
            'goods_pic.required'=>'商品图片不能为空',
            'goods_desc.required'=>'商品描述不能为空',
        ];
    }
}
