<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // ユーザー情報を判別してリクエストを許可するかどうかを決定します。
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // リクエストのバリデーションルールを定義します。
    public function rules(): array
    {
        return [
            'tweet' => 'required|max:140'
        ];
    }

    Public function tweet(): string
    {
        return $this->input('tweet');
    }

    Public function userId(): int
    {
        return $this->user()->id;
    }
}
