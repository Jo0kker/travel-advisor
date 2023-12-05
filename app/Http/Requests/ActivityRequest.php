<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'address_id' => ['required', 'exists:addresses,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
