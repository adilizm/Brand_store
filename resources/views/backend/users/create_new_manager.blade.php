@extends('backend.master')


@section('page_titel')
{{translate('Create New Manager')}}
@stop

@section('head')
<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<script src="/assets/plugins/global/plugins.bundle.js"></script>
<style>
    .form-check.form-check-solid .form-check-success:checked {
        background-color: #0bcb78 !important;
    }
</style>
@stop


@section('body')
@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{translate('New Manager')}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" action="{{route('store.user.manager')}}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{translate('Avatar')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 " style="text-align: center;">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" style="background-image: url({{public_media('assets/media/avatars/user_100.jpg')}})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" ></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('Change avatar')}}">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('Cancel avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('Remove avatar')}}">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">{{translate('Allowed file types: png, jpg, jpeg , (100*100)px')}}.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{translate('Full Name')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="{{\App\Models\User::FIRST_NAME_COLUMN_NAME}}" required class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="{{translate('First name')}}" value="{{old(\App\Models\User::FIRST_NAME_COLUMN_NAME)}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="{{\App\Models\User::LAST_NAME_COLUMN_NAME}}" required class="form-control form-control-lg form-control-solid" placeholder="{{translate('Last name')}}" value="{{old(\App\Models\User::LAST_NAME_COLUMN_NAME)}}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{translate('Contact Phone')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('Phone number must be active')}}" aria-label="{{translate('Phone number must be active')}}"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="tel" name="{{\App\Models\User::PHONE_COLUMN_NAME}}" required class="form-control form-control-lg form-control-solid" placeholder="{{translate('Phone number')}}" value="{{old(\App\Models\User::PHONE_COLUMN_NAME)}}">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{translate('Email')}}</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('Email must be unique')}}" aria-label="{{translate('Email must be unique')}}"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="email" name="{{\App\Models\User::EMAIL_COLUMN_NAME}}" required class="form-control form-control-lg form-control-solid" placeholder="{{translate('Email')}}" value="{{old(\App\Models\User::EMAIL_COLUMN_NAME)}}">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{translate('Password')}}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="password" name="{{\App\Models\User::PASSWORD_COLUMN_NAME}}" required class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="{{translate('password')}}" >
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="password" name="{{\App\Models\User::PASSWORD_COLUMN_NAME.'_confirmation'}}" required class="form-control form-control-lg form-control-solid" placeholder="{{translate('confirm password')}}" >
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->
            <div class="px-4">
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
            <div class="px-4" >
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
            <div class="px-4" >
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
                        <input  class="form-check-input form-check-success" type="checkbox" value="view-any users" name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('view-any users')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="view users" name="users_permissions[]">
                        <span class="form-check-label fw-bold text-muted">{{translate('view users')}}</span>
                    </label>
                    <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                        <input  class="form-check-input form-check-success" type="checkbox" value="create users" name="users_permissions[]">
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
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">{{translate('Save Changes')}}</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>

@stop

@section('modales')

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