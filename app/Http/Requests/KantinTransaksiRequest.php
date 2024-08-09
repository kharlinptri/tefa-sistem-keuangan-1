<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class KantinTransaksiRequest extends FormRequest
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
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT' => $this->update(),
        };
    }

    public function store()
    {
        return [
            'siswa_id' => ['required', 'exists:siswa,id'],
            'kantin_produk_id' => ['required', 'exists:kantin_produk,id'],
            'jumlah' => ['required', 'integer', 'min:1'],
        ];
    }

    public function update()
    {
        return [
            'status' => ['required', Rule::in('dibatalkan', 'proses', 'siap_diambil', 'selesai')]
        ];
    }
}
