<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyParentRequest extends FormRequest
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
            'email'                  => 'required|email|unique:my_parents,email,'.$this->id,
            'password'               => 'required',
            'confirm_password'       => 'required|same:password',

            'fnamee'                 => 'required|string|max:225',
            'fnamea'                 => 'required|string|max:225',
            'father_id_number'       =>'required|numeric|unique:my_parents,father_id_number,'.$this->id,
            'father_passport_number' =>'nullable|unique:my_parents,father_passport_number,'.$this->id,
            'father_phone'           =>'required|numeric',
            'fjobe'                  =>'required|string|max:225',
            'fjoba'                  =>'required|string|max:225',
            'father_nationality_id'  =>'required|exists:nationalitles,id',
            'father_blood_type_id'   =>'required|exists:type_bloods,id',
            'father_religion_id'     =>'required|exists:religions,id',
            'father_address'         =>'required|string|max:225',


            'mnamee'                 => 'required|string|max:225',
            'mnamea'                 => 'required|string|max:225',
            'mother_id_number'       =>'required|numeric|unique:my_parents,mother_id_number,'.$this->id,
            'mother_passport_number' =>'nullable|unique:my_parents,mother_passport_number,'.$this->id,
            'mother_phone'           =>'required|numeric',
            'mjobe'                  =>'required|string|max:225',
            'mjoba'                  =>'required|string|max:225',
            'mother_nationality_id'  =>'required|exists:nationalitles,id',
            'mother_blood_type_id'   =>'required|exists:type_bloods,id',
            'mother_religion_id'     =>'required|exists:religions,id',
            'mother_address'         =>'required|string|max:225',


        ];
    }
}
