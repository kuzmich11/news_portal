<?php

namespace App\Http\Requests\Sources;

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
            'resource_name' => ['required', 'string', 'min:2', 'max:200'],
            'resource_url' => ['required', 'url'],
            'news_title' => ['required', 'string', 'min:5', 'max:200'],
        ];
    }

    public function attributes(): array
    {
        return [
            'resource_name' => 'НАЗВАНИЕ РЕСУРСА',
            'resource_url' => 'АДРЕС РЕСУРСА',
            'title' => 'НАЗВАНИЕ НОВОСТИ',
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
            'url' => 'Поле :attribute должно быть действующим url-адресом',
        ];
    }
}
