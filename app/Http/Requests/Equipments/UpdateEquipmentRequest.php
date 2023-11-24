<?php

namespace App\Http\Requests\Equipments;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateEquipmentRequest extends FormRequest
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
            'serial_number' => [
                'required',
                Rule::unique('equipments')
                    ->ignore($this->serial_number, 'serial_number')
            ],
            'type' => 'required',
            'manufacturer' => 'required',
            'year_model' => 'required|numeric|digits:4',
            'department' => 'required'
        ];
    }
}
