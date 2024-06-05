<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessorRequest extends FormRequest
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
            'name' => 'required',
            'brand' => 'required',
            'generation' => 'required',
            'core' => 'required',
            'thread' => 'required',
            'release_date' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama prosesor harus diisi.',
            'brand.required' => 'Merek prosesor harus diisi.',
            'generation.required' => 'Generasi prosesor harus diisi.',
            'core.required' => 'Jumlah core prosesor harus diisi.',
            'thread.required' => 'Jumlah thread prosesor harus diisi.',
            'release_date.required' => 'Tanggal rilis prosesor harus diisi.',
        ];
    }
}
