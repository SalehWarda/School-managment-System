<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomRequest extends FormRequest
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
            'List_Classes.*.name_class'  => 'required|string|unique:class_rooms,name_class->en,'.$this->id,
            'List_Classes.*.name_class_ar'  => 'required|string|unique:class_rooms,name_class->ar,'.$this->id,
            'List_Classes.*.grade_id'  => 'required',


        ];
    }

    public function messages()
    {
        return [
            //

            'required' => trans('validation.required'),





        ];
    }
}
