<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'content' => 'required|string',
        ];
    }
}
