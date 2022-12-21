<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminpanelsettingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
         'SystemName'=>'required',
         'CompanyCode'=>'required',
         'CompanyPhone'=>'required',
         'CompanyAddress'=>'required',
         'CompanyStatue'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'SystemName.required'=>'اسم الشركة مطلوب' ,
            'CompanyCode.required'=>'كود الشركة مطلوب',
            'CompanyPhone.required'=>'تليفون الشركة مطلوب',
            'CompanyAddress.required'=>'عنوان الشركة مطلوب',
            'CompanyStatue.required'=>'حالة الشركة مطلوب',
        ];
    }
}
