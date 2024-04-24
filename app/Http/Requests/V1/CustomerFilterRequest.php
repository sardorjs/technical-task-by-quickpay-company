<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerFilterRequest extends FormRequest
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
            'id' => 'integer',
            'name' => 'string',
            'type' => Rule::in(['I', 'B']),
            'email' => 'string',
            'address' => 'string',
            'city' => 'string',
            'state' => 'string',
            'postalCode' => 'string',
            'sortBy' => Rule::in(['id']),
            'sortOrder' => Rule::in(['asc', 'desc']),
        ];
    }

    /**
     * Сообщения ошибок
     * @return array[]
     */
    public function messages(): array
    {
        return [
            'sortBy' => "sortBy: Query can be Sorted By 'id'",
            'sortOrder' => "sortOrder: must be asc or desc",
        ];
    }
}
