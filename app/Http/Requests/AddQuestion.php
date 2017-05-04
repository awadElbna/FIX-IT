<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddQuestion extends FormRequest
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
           'title' => 'required|min:5|max:255',
            'desc' => 'required|min:10',
            'img' => 'mimes:jpeg,png|max:3072',
            'cat_id' => 'required|integer'            
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'أدخل عنوان السؤال',
            'title.min' => 'أدخل عنوان لايقل 5 حرف',
            'title.max' => 'أدخل عنوان ﻻ يزيد عن 255 حرف',
            'desc.required' => 'أدخل وصف المشكلة',
            'desc.min' => 'أدخل وصف للمشكلة ﻻ يقل عن 10 حرف',
            'img.mimes' => 'أدخل صورة صحيحة من نوع (jpeg, png)',
            'img.size'  => 'هذه الصورة حجمها كبير',
            'cat_id.required' => 'يجب ادخال القسم',
            'cat_id.integer' => 'من فضلك اختر قسم صحيح'
        ];
    }
}
