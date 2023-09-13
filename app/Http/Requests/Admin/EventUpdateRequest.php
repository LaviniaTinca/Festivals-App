<?php

namespace App\Http\Requests\Admin;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventUpdateRequest extends FormRequest
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

            'festival_id' => ['required', Rule::exists('festivals', 'id')],
            'event_category_id' => ['required', Rule::exists('event_categories', 'id')],
            'name' => 'required',
            'banner_img' => 'image',
            'slug' => ['required', Rule::unique('events', 'slug')->ignore($this->event->id)],
            'date' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
        ];
    }
}
