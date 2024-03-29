<?php

namespace App\Http\Requests\V1\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'title' => 'required',
            'section' => 'required',
            'degree' => 'required',
            'batch' => 'required',
            'institute' => 'required',
            'detail' => 'required',
        ];
    }
}
