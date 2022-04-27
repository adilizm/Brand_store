@extends('backend.master')

@section('head')
<title>Brand | titel</title>
<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<style>
    .form-check.form-check-solid .form-check-success:checked {
        background-color: #0bcb78 !important;
    }
</style>
@stop

@section('page_titel')

@stop

@section('body')

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{translate('Create new role')}}</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <form action="{{route('role.store')}}" method="POST">
            @csrf
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">{{translate('role name')}}</span>
            </label>
            <input type="text" class="form-control form-control-solid col-6" placeholder="{{translate('Enter role name')}}" name="name">
        </div>
        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">{{translate('Main role permission')}}</span>
            </label>
            <select id="main_permission" onchange="change()" required name="main_permission" class="form-select" data-control="select2" data-placeholder="{{translate('Select the main role permission')}}">
                <option></option>
                <option value="Manager">{{translate('Manager')}}</option>
                <option value="Customer">{{translate('Customer')}}</option>
            </select>
        </div>
        <div class="d-none" id="manager_permissions" >
            <div>
                <label class=" my-2 form-check form-switch form-check-custom form-check-solid">
                    <input onchange="show_permissions('roles_permissions')" class="form-check-input" type="checkbox" >
                    <span class="form-check-label fw-bold text-muted">{{translate('Roles')}}</span>
                </label>

                <div class="d-none row my-2 px-4 border border-dashed border-gray-300 rounded"  id="roles_permissions">
                    <div class="d-flex p-0"> 
                         <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid" >
                            <input onchange="check_all('role_permissions[]','check_all_roles')"  id="check_all_roles" type="checkbox" >
                            <span id="check_all_name" class="form-check-label fw-bold text-muted">{{translate('check all')}}</span>
                        </label>
                    </div>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="view-any roles" name="role_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('see roles')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="create roles" name="role_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('create new role')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="update roles" name="role_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('update role ')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="delete roles" name="role_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('delete role')}}</span>
                    </label> 
                </div>
            </div>
            <div>
                <label class="my-2 form-check form-switch form-check-custom form-check-solid">
                    <input onchange="show_permissions('language_permissions')" class="form-check-input" type="checkbox" >
                    <span class="form-check-label fw-bold text-muted">{{translate('Languages')}}</span>
                </label>

                <div class="d-none row my-2 px-4 border border-dashed border-gray-300 rounded"  id="language_permissions">
                    <div class="d-flex p-0"> 
                         <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid" >
                            <input onchange="check_all('language_permissions[]','check_all_languages')" id="check_all_languages" type="checkbox" >
                            <span id="check_all_name" class="form-check-label fw-bold text-muted">{{translate('check all')}}</span>
                        </label>
                    </div>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="view-any languages" name="language_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('languages view')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="create languages"  name="language_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('languages create')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="update languages"  name="language_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('languages update')}}</span>
                    </label>
                    
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="delete languages"  name="language_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('destroy language ')}}</span>
                    </label>
                    
                </div>
            </div>
            <div>
                <label class="my-2 form-check form-switch form-check-custom form-check-solid">
                    <input onchange="show_permissions('users_permissions')" class="form-check-input" type="checkbox" >
                    <span class="form-check-label fw-bold text-muted">{{translate('users')}}</span>
                </label>

                <div class="d-none row my-2 px-4 border border-dashed border-gray-300 rounded"  id="users_permissions">
                    <div class="d-flex p-0"> 
                         <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid" >
                            <input onchange="check_all('users_permissions[]','check_all_users')" id="check_all_users" type="checkbox" >
                            <span id="check_all_name" class="form-check-label fw-bold text-muted">{{translate('check all')}}</span>
                        </label>
                    </div>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="view-any users"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('view-any users')}}</span>
                    </label>
   
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="view users" name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('view users')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="create users"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('create users')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="create manager" name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('create manager')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="update users"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('update users ')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="delete users"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('delete users ')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="assign user permission"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('assign user permission')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="update user auth"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('update user auth')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="ban-unban user"  name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('ban/unban user')}}</span>
                    </label>
              
                 
                </div>
            </div>
        </div>
        <div  class="d-none" id="customer_permissions" >

        </div>
        <div class="d-flex justify-content-end">
                <button class="btn btn-primary" >{{translate('Create')}}</button>
        </div>
        </form>
    </div>
    <!--begin::Body-->
</div>
@stop

@section('script')
<script>
    function change(){
        let select =  document.getElementById('main_permission').value;

        if( select=="Manager"){
            document.getElementById('manager_permissions').classList.remove('d-none');
            document.getElementById('customer_permissions').classList.add('d-none');
        }else if(select == "Customer"){
            document.getElementById('customer_permissions').classList.remove('d-none');
            document.getElementById('manager_permissions').classList.add('d-none');

        }
    }
    function show_permissions(permissions_div_id){
        if( document.getElementById(permissions_div_id).classList.contains('d-none')){
            document.getElementById(permissions_div_id).classList.remove('d-none')
        }else{
            document.getElementById(permissions_div_id).classList.add('d-none')
        }
    }
    function check_all(checkboxes_name,checkbox_id){
        document.getElementsByName(checkboxes_name).forEach(checkbox=>{
            if(!checkbox.checked){
                checkbox.click()
            } 
        })
        document.getElementById(checkbox_id).setAttribute('onchange',"uncheck_all('".concat(checkboxes_name) +"','".concat(checkbox_id.concat("')")))
    }
    function uncheck_all(checkboxes_name,checkbox_id){
        document.getElementsByName(checkboxes_name).forEach(checkbox=>{ 
            if(checkbox.checked){
                checkbox.click()
            } 
         })
        document.getElementById(checkbox_id).setAttribute('onchange',"check_all('".concat(checkboxes_name) +"','".concat(checkbox_id.concat("')")))

    }
</script>
@stop