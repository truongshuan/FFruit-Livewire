<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            $commonRules =  [
                'name' =>  'required|min:6|unique:products',
                'price'  => 'required|numeric|min:0|not_in:0',
                'sale_price' => 'required|numeric|min:0|lt:price',
                'description' => 'required',
                'path_image' => $this->action === 'add' ? 'required|image|mimes:jpg,png,bmp,gif,svg,webp,jpeg|max:2048' : 'image|mimes:jpg,png,bmp,gif,svg,webp,jpeg|max:2048',
                'category_id' => 'required',
            ];
        } else {
            $commonRules =
                [
                    'name' => [
                        'required', 'min:6', Rule::unique('products', 'name')->ignore($id),
                    ],
                    'price' => [
                        'required', 'numeric', 'min:0', 'not_in:0'
                    ],
                    'sale_price' => [
                        'required', 'numeric',
                        'min:0', 'lt:price'
                    ],
                    'description' => 'required',
                    'category_id' => 'required',
                ];
        }

        return $commonRules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'price.required' => 'Đơn giá không được để trống',
            'price.numeric' => 'Đơn giá phải là số',
            'price.not_in' => 'Đơn giá phải lớn hơn 0',
            'description.required' => 'Mô tả không được để trống',
            'path_image.required' => 'Tải lên hình ảnh',
            'category_id.required' => 'Sản phẩm phải thuộc một danh mục'
        ];
    }
}
