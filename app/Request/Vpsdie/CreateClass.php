<?php

declare(strict_types=1);

namespace App\Request\Vpsdie;

use Hyperf\Validation\Request\FormRequest;

class CreateClass extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|min:2|max:25|unique:posts_class,name",
            "url" => "required|url|unique:posts_class,url"
        ];
    }

    public function attributes(): array
    {
        return [
            "name" => "商家名称",
            "url" => "网站链接"
        ];
    }
}
