<?php

declare(strict_types=1);

namespace App\Request\Vpsdie;

use Hyperf\Validation\Request\FormRequest;

/**
 * Class CreatePosts
 * @package App\Request\Vpsdie
 */
class CreatePosts extends FormRequest
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
            'title' => 'nullable|string|min:5|max:100',
            'class_id' => 'required|exists:posts_class,id',
            'content' => 'required|min:10'
        ];
    }
}
