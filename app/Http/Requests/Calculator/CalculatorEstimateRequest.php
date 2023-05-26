<?php

namespace App\Http\Requests\Calculator;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorEstimateRequest extends FormRequest
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
            'length' => ['required', 'numeric'],
            'width' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'category' => ['required', 'string'],
            'email' => ['required', 'email'],
            'approveSaveEmail' => ['required', 'string']
        ];
    }
    public function getLength() : float
    {
        return $this->input('length');
    }
    public function getWidth() : float
    {
        return $this->input('width');
    }
    public function getHeight() : float
    {
        return $this->input('height');
    }
    public function getCategory() : string
    {
        return $this->input('category');
    }
    public function getEmail() : string
    {
        return $this->input('email');
    }
    public function isApprovedEmailSaving() : bool
    {
        return $this->input('approveSaveEmail');
    }
}
