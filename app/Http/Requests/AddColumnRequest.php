<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddColumnRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:255']
        ];
    }

    public function data(): array
    {
        return $this->only(['name']);
    }
}
