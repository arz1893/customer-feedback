<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'image_cover' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your product name',
            'description.required' => 'Please enter your product description',
            'image_cover.required' => 'PLease insert product picture'
        ];
    }
}
