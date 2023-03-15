<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'regex:/^([^0-9]*)$/'],
            'text' => ['required', 'max:60000'],
            'image_url' => ['required', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:2000']
        ];
    }
}
