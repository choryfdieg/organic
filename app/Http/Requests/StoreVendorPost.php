<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorPost extends FormRequest
{

    static function getRules(){
        return [
            'title' => 'required|min:5|max:500',
            'url_clean' => 'max:500|unique:vendors',
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
        return $this->getRules();
    }
}
