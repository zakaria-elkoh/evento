<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:10|max:255',
            'event_image' => 'required|image',
            'description' => 'required|min:30',
            'date' => 'required|date|after:today',
            'price' => 'required|numeric',
            'location' => 'required',
            'duration' => 'required',
            'total_places' => 'required|min:1|integer',
            'category_id' => 'required|integer'
        ];
    }
}
