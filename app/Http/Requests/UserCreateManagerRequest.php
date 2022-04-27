<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateManagerRequest extends FormRequest
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
            User::FIRST_NAME_COLUMN_NAME => ['required'],
            User::LAST_NAME_COLUMN_NAME  => ['required'],
            User::EMAIL_COLUMN_NAME => ['required','email','unique:users'],
            User::PHONE_COLUMN_NAME => ['required','unique:users'],
            User::PASSWORD_COLUMN_NAME => ['required','confirmed'],
        ];
    }
}
