<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore(user()) ],
            'age' => Rule::in(User::SEXES),
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['sometimes','image'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore(user()),],
            'password' => ['sometimes','string', 'required', 'min:8', 'max:255', 'confirmed',],
            'birthday' => ['before:5 years ago'],
        ];
    }
}
