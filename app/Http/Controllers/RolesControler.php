<?php

namespace App\Http\Controllers;

use App\Http\Requests\role\RoleStoreRequest;
use App\Http\Requests\role\RoleUpdateRequest;
use App\Http\Requests\RoleDestroyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesControler extends Controller
{
    public function index(Request $request){
       /*  $permissions = Permission::all();
        dd($permissions);
        $role=Role::where('name','Admin')->first();
        foreach($permissions as $permission){
            if(!in_array($permission->name,['Customer','Manager']) ){
                $role->givePermissionTo($permission);
            }
        } */
        $roles= Role::all();
        return view('backend.roles.index',compact('roles'))->with('success','hello agadir');
    }

    public function create(){
        return view('backend.roles.create');
    }

    public function store(RoleStoreRequest $request){
        //check if role name exist
        $role=Role::where('name',$request->name)->first();

        if($role != null){
            return back()->with('error',translate('role name already exist'));
        }

        $role = Role::create(['name'=>$request->name]);
        if($request->main_permission =="Manager"){
            $role->givePermissionTo('Manager');
            #manage roles permissions
            if($request->role_permissions != null){
                foreach($request->role_permissions as $role_permission){
                    $role->givePermissionTo($role_permission);
                }
            }
            #manage language permissions
            if($request->language_permissions != null){
                foreach($request->language_permissions as $language_permission){
                    $role->givePermissionTo($language_permission);
                }
            }
           #manage users permissions
            if($request->users_permissions != null){
                foreach($request->users_permissions as $user_permission){
                    $role->givePermissionTo($user_permission);
                }
            }
            
        }else if($request->main_permission =="Customer"){
            $role->givePermissionTo('Customer');
            if($request->customers_permissions != null){
                foreach($request->customers_permissions as $customer_permission){
                    $role->givePermissionTo($customer_permission);
                }
            }
        }
        return redirect()->route('roles.index');
    }

    public function edit($id){
        
        $role=Role::find(decrypt($id));
        return view('backend.roles.edit',compact('role'));
    }

    public function update(RoleUpdateRequest $request){

        $role=Role::find(decrypt($request->role_id));

        #get the role permissions
        $permissions=$role->permissions;

        #remove all old permissions to the role 
        foreach($permissions as $permission){
            $role->revokePermissionTo($permission);
        }

        #update the role name 
        $role->update(['name'=>$request->name]);

        if($request->main_permission =="Manager"){
            $role->givePermissionTo('Manager');

           #manage roles permissions
            if($request->role_permissions != null){
                foreach($request->role_permissions as $role_permission){
                    $role->givePermissionTo($role_permission);
                }
            }

           #manage languages permissions
            if($request->language_permissions != null){
                foreach($request->language_permissions as $language_permission){
                    $role->givePermissionTo($language_permission);
                }
            }

           #manage users permissions
            if($request->users_permissions != null){
                foreach($request->users_permissions as $users_permission){
                    $role->givePermissionTo($users_permission);
                }
            }

        }else if($request->main_permission =="Customer"){
            $role->givePermissionTo('Customer');
            if($request->customers_permissions != null){
                foreach($request->customers_permissions as $customer_permission){
                    $role->givePermissionTo($customer_permission);
                }
            }
        }
        return redirect()->route('roles.index')->with('success',translate('Role successfully updated'));
    } 
    
    public function destroy(RoleDestroyRequest $request){
      
        Role::find(decrypt($request->role_id))->delete();
        return redirect()->back()->with('success',translate('Role has been deleted'));
    }
}
