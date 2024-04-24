<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceFilterRequest extends FormRequest
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
            'customerId' => 'integer',
            'amountFrom' => 'integer',
            'amountTo' => 'integer',
            'status' => Rule::in(['B', 'P', 'V']),
            'billedDateFrom' => 'date', // 2023-05-16
            'billedDateTo' => 'date', // 2023-05-16
            'paidDateFrom' => ['date'], // 2023-05-16
            'paidDateTo' => ['date'], // 2023-05-16
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
