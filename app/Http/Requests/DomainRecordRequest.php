<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRecordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'domain_name' => ['required', 'string', 'max:63', 'regex:/^(?!-)[A-Za-z0-9-]+(?<!-)$/'],
            'domain_extension' => ['required', 'string', 'max:64', 'regex:/^\.[A-Za-z]{2,63}$/'],
            'registrar' => ['required', 'string', 'max:120'],
            'registration_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date', 'after_or_equal:registration_date'],
            'status' => ['required', 'in:active,pending,inactive'],
            'auto_renewal' => ['required', 'boolean'],
            'price' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
            'notes' => ['nullable', 'string', 'max:3000'],
        ];
    }

    public function messages(): array
    {
        return [
            'domain_name.regex' => 'Use letters, numbers, and hyphens only; do not start or end with a hyphen.',
            'domain_extension.regex' => 'Enter an extension such as .com or .org.',
            'expiry_date.after_or_equal' => 'The expiry date must be on or after the registration date.',
        ];
    }
}
