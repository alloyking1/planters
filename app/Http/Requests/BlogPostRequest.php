<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //add gate here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:555'],
            'slog' => ['required', 'string', 'max:555'],
            'min_to_read' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'tag' => ['required', 'integer'],
            'body' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'meta_keywords' => ['required', 'string'],
            'meta_robots' => ['required', 'string'],
            'grade' => ['required', 'string'],
        ];
    }
}
