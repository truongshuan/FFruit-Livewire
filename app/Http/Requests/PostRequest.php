<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            $commonRules = [
                'title' => 'required|min:15|max:255|unique:posts,title',
                'topic_id' => 'required',
                'content' => 'required',
                'thumbnail' => 'required|image|mimes:jpg,png,bmp,gif,svg,webp,jpeg|max:2048',
            ];
        } else {
            $commonRules = [
                'title' => [
                    'required',
                    'min:6',
                    Rule::unique('posts', 'title')->ignore($id),
                ],
                'content' => 'required',
            ];
        }

        return $commonRules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề bài viết không được để trống',
            'title.unique' => 'Tiêu đề bài viết đã tồn tại',
            'topic_id.required' => 'Bài viết phải thuộc 1 chủ đề',
            'content.required' => 'Nội dung bài viết không được để trống',
            'thumbnail.required' => 'Vui lòng tải lên thumbnail',
            'thumbnail.max' => 'Vui lòng tải lên ảnh có kích thước nhỏ hơn :max MB',
        ];
    }
}
