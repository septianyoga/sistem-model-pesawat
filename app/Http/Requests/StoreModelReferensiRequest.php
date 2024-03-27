<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelReferensiRequest extends FormRequest
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
            //
            'trpgm_id'  => ['required'],
            'trpgmsub_id'   => ['required'],
            'trpon_id'   => ['required'],
            'c_pgm_model'   => ['required'],
            'i_part_nha'   => ['required'],
            'n_pgm_model'   => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'trpgm_id.required' => 'Program Wajib Diisi!',
            'trpgmsub_id.required' => 'Subprogram Wajib Diisi!',
            'trpon_id.required' => 'Versi Wajib Diisi!',
            'c_pgm_model.required' => 'Model Wajib Diisi!',
            'i_part_nha.required' => 'Partnumber Wajib Diisi!',
            'n_pgm_model.required' => 'Nama Model Wajib Diisi!',
        ];
    }
}
