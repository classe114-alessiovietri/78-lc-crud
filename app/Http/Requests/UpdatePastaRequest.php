<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePastaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'src'               => 'nullable|max:1024|url',
            'title'             => 'required|max:64',
            'type'              => 'required|max:16|in:corta,cortissima,lunga',
            'cooking_time'      => 'nullable|numeric|min:1|max:20',
            'weight'            => 'required|numeric|min:100|max:5000',
            'description'       => 'nullable|max:4096',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'MESSAGGIO CUSTOM TITLE REQUIRED',
            'title.max' => 'MESSAGGIO CUSTOM TITLE MAX',
        ];
    }
}
