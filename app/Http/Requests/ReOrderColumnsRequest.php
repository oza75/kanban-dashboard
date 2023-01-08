<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReOrderColumnsRequest extends FormRequest
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
            '*.id' => ['required', 'exists:columns,id'],
            '*.position' => ['required', 'numeric']
        ];
    }

    public function newPositions()
    {
        return $this->validated();
    }
}
