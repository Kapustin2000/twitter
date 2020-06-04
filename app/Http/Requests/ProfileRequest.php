<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule;

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
        $user = $this->route('profile');
        return [
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user) ],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['sometimes','image'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user),],
            'password' => ['sometimes','string', 'required', 'min:8', 'max:255', 'confirmed',],
        ];
    }
}
