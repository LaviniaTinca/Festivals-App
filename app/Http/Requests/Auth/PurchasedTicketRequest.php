<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PurchasedTicketRequest extends FormRequest
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
            'ticket_id' => ['required', Rule::exists('tickets', 'id')],
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required'
        ];
    }
}
