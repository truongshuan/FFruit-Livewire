<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TopicRequest extends FormRequest
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
        if ($this->action === 'add') {
            $commenRules = [
                'title' => 'required|min:6|unique:topics',
                'content' => 'required',
                'status' => 'required',
            ];
        } else {
            $commenRules = [
                'title' => [
                    'required',
                    'min:6',
                    Rule::unique('topics', 'title')->ignore($id),
                ],
                'content' => 'required',
            ];
        }
        return $commenRules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'content.required' => 'Mô tả không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}
