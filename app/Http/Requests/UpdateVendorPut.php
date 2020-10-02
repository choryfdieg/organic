<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorPut extends FormRequest
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

        $id = $this->route('vendor')->id;

        return [
            'title' => 'required|min:5|max:500',
            'url_clean' => ['required', 'min:5', 'max:500', Rule::unique('vendors')->ignore($id)],
            'description' => 'required|min:5',
            'long_description' => 'required|min:5',
            'service_description' => 'required|min:5',
            'phone' => 'required',
            'email' => 'required|email|max:255',
            'address' => 'required',
            'category_id' => 'required',
            'city_id' => 'required',
            'posted' => 'required',
            'tags' => 'required'
        ];
    }
}
