<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FestivalUpdateRequest extends FormRequest
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
            'festival_category_id' => ['required', Rule::exists('festival_categories', 'id')],
            'name' => 'required',
            'banner_img' => 'image',
            'slug' => ['required', Rule::unique('festivals', 'slug')->ignore($this->festival->id)],
            'date' => 'required',
            'location' => 'required',
            'description' => 'required',
        ];
    }
}
