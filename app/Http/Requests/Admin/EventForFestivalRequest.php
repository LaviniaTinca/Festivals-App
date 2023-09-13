<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventForFestivalRequest extends FormRequest
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
            'festival_id' => [Rule::exists('festivals', 'id')],
            'event_category_id' => ['required', Rule::exists('event_categories', 'id')],
            'name' => 'required',
            'banner_img' => 'required|image',
            'slug' => ['required', Rule::unique('events', 'slug')],
            'date' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
        ];
    }
}
