<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'title' => 'required|min:5|max:500',
            'url_clean' => 'required|min:5|max:500',
            'short_description' => 'required|min:5',
            'description' => 'required|min:5',
            'price' => 'required|numeric',
            'offer_price' => 'numeric',
            'stock' => 'required',
            'member_id' => 'required',
            'category_product_id' => 'required',
            'status_product_id' => 'required',
            'type_product_id' => 'required',
            'posted' => 'required'
        ];
    }
}
