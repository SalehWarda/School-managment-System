<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudenRequest extends FormRequest
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
            'name_ar'                  => 'required|string|max:225',
            'name_en'                  => 'required|string|max:225',
            'email'                    => 'required|email|unique:students,email,'.$this->id,
            'password'                 => 'required',


            'gender_id'               => 'required|exists:genders,id',
            'nationalitles_id'        =>'required|exists:nationalitles,id',
            'blood_id'                =>'required|exists:type_bloods,id',


            'birth_date'                  =>'required|date',
            'grade_id'                    =>'required|exists:grades,id',
            'classroom_id'                =>'required|exists:class_rooms,id',
            'section_id'                  =>'required|exists:sections,id',
            'parent_id'                  =>'required|exists:my_parents,id',
            'academic_year'                  =>'required',


        ];
    }
}
