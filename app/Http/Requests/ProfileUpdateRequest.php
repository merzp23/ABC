<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'NgaySinh' => ['required', 'date'],
            'GioiTinh' => ['required', 'string'],
            'CCCD' => ['required', 'string', 'max:12', 'min:9', 'unique:users,CCCD,'.$this->user()->id],
            'PhongBan' => ['required', 'string'],
            'QueQuan' => ['required', 'string'],
            'ChucVu' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
        ];
    }
}
