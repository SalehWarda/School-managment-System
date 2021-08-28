<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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
            //
            'name'  => 'required|string|unique:grades,name->en,'.$this->id,
            'name_ar'  => 'required|string|unique:grades,name->ar,'.$this->id,
            'note'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            //
            'required'  => trans('validation.required'),


        ];
    }
}
