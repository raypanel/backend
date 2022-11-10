<?php

namespace App\Http\Requests\Auth;

use App\DataTransfers\Auth\LoginData;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\WithData;

class LoginRequest extends FormRequest
{
    use WithData;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required', 'min:6']
        ];
    }

    protected function dataClass(): string
    {
        return LoginData::class;
    }
}
