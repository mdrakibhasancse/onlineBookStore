<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name'=>'required|max:255',
            'category_id'=>'required',
            'publisher_id'=>'required',
            'authors'=>'required',
            'price'=>'required|numeric',
            'page'=>'required|numeric',
            'stock'=>'numeric',
            'language'=>'required|max:255',
            'image'=>'required|image',
            'ISBN_NO'=>'required|max:255'
        ];
    }
}
