<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address_line_1' => ['required'],
            'address_line_2' => ['nullable'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'zip_code' => ['nullable'],
            'city_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
