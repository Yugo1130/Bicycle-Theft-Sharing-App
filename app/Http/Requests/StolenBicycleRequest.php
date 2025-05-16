<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StolenBicycleRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:1024'],
            'stolenbicycle.model' => ['required', 'string', 'max:50'],
            'stolenbicycle.manufacturer' => ['required', 'string', 'max:50'],
            'stolenbicycle.model_name' => ['nullable', 'string', 'max:100'],
            'stolenbicycle.frame_num' => ['nullable', 'string', 'max:50'],
            'stolenbicycle.color' => ['nullable', 'string', 'max:30'],
            'stolenbicycle.prefecture' => ['nullable', 'string', 'max:20'],
            'stolenbicycle.bouhan_num' => ['nullable', 'string', 'max:50'],
            'stolenbicycle.stolen_at' => ['required', 'date'],
            'stolenbicycle.stolen_location' => ['required', 'string', 'max:255'],
            'stolenbicycle.features' => ['nullable', 'string', 'max:2000'],
            'stolenbicycle.other' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
