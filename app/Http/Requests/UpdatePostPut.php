<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updatePostPut extends FormRequest
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

        $id = $this->route('post')->id;

        return [
            'title' => 'required|min:5|max:500',
            'url_clean' => ['required', 'min:5', 'max:500', Rule::unique('posts')->ignore($id)],
            'content' => 'required|min:5',
            'category_id' => 'required',
            'posted' => 'required'
        ];
    }
}
