<?php

namespace App\Http\Requests\V1\About;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'short_discription' => 'required',
            'birth_date' => 'required',
            'website_url' => 'required',
            'degree' => 'required',
            'website_url' => 'required',
            'freelance' => 'required',
            'image' => 'required',
        ];
    }
}
