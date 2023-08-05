<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    private $action;

    public function __construct($action)
    {
        $this->action = $action;
    }
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules($id = null): array
    {
        $commonRules = [
            'title' => $this->action === 'add' ? 'required|min:6|unique:categories,title' : [
                'required',
                'min:6',
                Rule::unique('categories', 'title')->ignore($id),
            ],
            'desc'  => 'required',
        ];
        if ($this->action === 'add') {
            $commonRules['status'] = 'required';
        }

        return $commonRules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'desc.required' => 'Mô tả không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}
