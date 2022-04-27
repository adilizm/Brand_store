<?php

namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if($request->main_permission == "Admin"){
            return false;
        }
        if($request->role_permissions != null && ( in_array('Admin',$request->role_permissions) || in_array('admin',$request->role_permissions) )){
            return false;
        }
        if($request->customers_permissions != null && ( in_array('Admin',$request->customers_permissions) || in_array('admin',$request->customers_permissions) )){
            return false;
        }
        if($request->language_permissions != null && ( in_array('Admin',$request->language_permissions) || in_array('admin',$request->language_permissions) )){
            return false;
        }
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
            'role_id'=>'required',
            'name'=>'required',
            'main_permission'=>'required',
        ];
    }
}
