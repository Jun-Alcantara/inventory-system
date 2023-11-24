<?php

namespace App\Http\Requests\Equipments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'asset_number' => 'required|unique:equipments',
            'serial_number' => 'required|unique:equipments',
            'type' => 'required',
            'manufacturer' => 'required',
            'year_model' => 'required|numeric|digits:4',
            'department' => 'required'
        ];
    }
}
