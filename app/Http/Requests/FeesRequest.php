<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesRequest extends FormRequest
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

            'title_ar'  => 'required',
            'title_en'  => 'required',
            'amount'    => 'required|numeric',
            'grade_id'  => 'required|exists:grades,id',
            'classroom_id' => 'required',
            'year'   => 'required',
            'fee_type' => 'required'
        ];
    }
}