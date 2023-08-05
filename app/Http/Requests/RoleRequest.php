<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
                'name' =>  'required|min:6|unique:roles,name',
                'selectedPermissions' => 'required',
            ];
        } else {
            $commonRules = [
                'name' =>  [
                    'required',
                    'min:6',
                    Rule::unique('roles', 'name')->ignore($id),
                ],
                'selectedPermissions' => 'required',
            ];
        }

        return $commonRules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên vai trò không được trống',
            'name.unique' => 'Tên vai trò đã tồn tại trước đó',
            'name.min' => 'Tên vai trò phải trên :min kí tự',
            'selectedPermissions.required' => 'Phân quyền cho vai trò',
        ];
    }
}
