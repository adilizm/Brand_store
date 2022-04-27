<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsUpdateRequest extends FormRequest
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
            'website_name' => 'required',
            'website_description'=> 'required',
            'website_og_description_tag'=> 'required',
            'keywords_tags'=> 'required',
            'website_og_url_tag'=> 'required',
            'website_og_title_tag'=> 'required',
            'website_meta_description_tag'=> 'required',
        ];
    }
}
