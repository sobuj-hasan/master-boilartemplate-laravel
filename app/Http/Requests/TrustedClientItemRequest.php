<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrustedClientItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        
        $rules = [
            'title' => 'required',
            'trusted_client_id' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['photo'    => 'required'];
        }

        return $rules;
    }
}
