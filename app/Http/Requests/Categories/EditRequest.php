<?php

namespace App\Http\Requests\Categories;

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
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'ЗАГОЛОВОК',
            'description' => 'ОПИСАНИЕ КАТЕГОРИИ',
        ];
    }

    /**
     * @return string[]
     */
    public function messages (): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения',
            'min' => 'Поле :attribute должно содержать минимум :min символов',
            'max' => 'Поле :attribute должно содержать максимум :max символов'
        ];
    }
}
