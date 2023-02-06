<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'is_admin' => [],
            'name' => ['required', 'string', 'min:2', 'max:200'],
            'email' => ['required', 'email:rfc,dns'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'ИМЯ ПОЛЬЗОВАТЕЛЯ',
            'email' => 'EMAIL АДРЕС',
        ];
    }

    /**
     * @return string[]
     */
    public function messages (): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно содержать минимум :min символа',
            'max' => 'Поле :attribute должно содержать максимум :max символов',
            'email' => 'Поле :attribute должно быть действующим email-адресом',
        ];
    }
}
