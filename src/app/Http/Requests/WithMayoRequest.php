<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WithMayoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:20',
            'body' => 'max:100',
            'is_public' => 'numeric',
            'mayo_tags.*' => 'numeric|exists:mayo_tags,id'
        ];

        return [
            'title' => 'マヨに合うもの',
            'body' => 'その理由',
            'is_public' => 'ステータス',
            'mayo_tags.*' => 'タグ'
        ];
    }
}
