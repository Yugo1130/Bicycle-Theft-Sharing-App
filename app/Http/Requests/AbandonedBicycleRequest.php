<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbandonedBicycleRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:1000'],
            'abandonedbicycle.model' => ['required', 'string', 'max:50'],
            'abandonedbicycle.manufacturer' => ['required', 'string', 'max:50'],
            'abandonedbicycle.model_name' => ['nullable', 'string', 'max:100'],
            'abandonedbicycle.frame_num' => ['nullable', 'string', 'max:50'],
            'abandonedbicycle.color' => ['nullable', 'string', 'max:30'],
            'abandonedbicycle.prefecture' => ['nullable', 'string', 'max:20'],
            'abandonedbicycle.bouhan_num' => ['nullable', 'string', 'max:50'],
            'abandonedbicycle.found_at' => ['required', 'date'],
            'abandonedbicycle.found_location' => ['required', 'string', 'max:255'],
            'abandonedbicycle.features' => ['nullable', 'string', 'max:2000'],
            'abandonedbicycle.other' => ['nullable', 'string', 'max:2000'],
 
        ];
    }
}
