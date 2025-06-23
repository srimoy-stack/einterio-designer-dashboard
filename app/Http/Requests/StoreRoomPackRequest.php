<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomPackRequest extends FormRequest
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
public function rules(): array
{
    return [
        'title' => 'required|string|max:255',

        'cover' => 'required|image|mimes:jpg,jpeg,png|max:5120',

        'optional_renders' => 'nullable|array|max:3', // 💡 Limit total count
        'optional_renders.*' => 'image|mimes:jpg,jpeg,png|max:5120',

        'pdf' => 'required|mimes:pdf|max:5120',

        'chart' => 'nullable|file|mimes:csv,txt|max:2048',
        'chart_link' => 'nullable|url',
    ];
}

}
