<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('create', \App\Models\Project::class) ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:120'],
            'slug' => ['required', 'string', 'alpha_dash', 'max:140', Rule::unique('projects', 'slug')],
            'excerpt' => ['required', 'string', 'max:280'],
            'description' => ['nullable', 'string', 'max:5000'],
            'image_url' => ['nullable', 'url:http,https', 'max:2048'],
            'category' => ['required', 'string', 'max:80'],
            'year' => ['required', 'integer', 'min:2000', 'max:2100'],
            'is_published' => ['sometimes', 'boolean'],
        ];
    }
}
