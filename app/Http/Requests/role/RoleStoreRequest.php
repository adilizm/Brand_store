<?php

namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RoleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        #here i check to avoid having seconde admin
        if($request->main_permission == "Admin"){
            return false;
        }

        if($request->role_permissions != null && ( in_array('Admin',$request->role_permissions) || in_array('admin',$request->role_permissions) )){
            return false;
        }
       
        if($request->language_permissions != null && ( in_array('Admin',$request->language_permissions) || in_array('admin',$request->language_permissions) )){
            return false;
        }

        if($request->users_permissions != null && ( in_array('Admin',$request->users_permissions) || in_array('admin',$request->users_permissions) )){
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
            'name'=>'required',
            'main_permission'=>'required',
            'main_permission'=>'required',
        ];
    }
}
