<?php

namespace App\Http\Requests\News;

use App\Enums\NewsStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'category_ids' => ['required', 'array'],
            'category_ids.*' => ['exists:categories,id'],
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'author' => ['nullable', 'string', 'min:2', 'max:30'],
            'status' => ['required', new Enum(NewsStatusEnum::class)],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function getCategoryIds(): array
    {
        return (array)$this->validated('category_ids');
    }

    public function attributes(): array
    {
        return [
            'title' => 'ЗАГОЛОВОК',
            'category_ids' => 'КАТЕГОРИЯ',
            'author' => 'АВТОР',
            'description' => 'ОПИСАНИЕ НОВОСТИ',
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
            'max' => 'Поле :attribute должно содержать максимум :max символов'
        ];
    }

}
