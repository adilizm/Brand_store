@extends('backend.master')

@section('head')
<style>
    .form-check.form-check-solid .form-check-success:checked {
        background-color: #0bcb78 !important;
    }
</style>
@stop

@section('page_titel')

@stop

@section('body')
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px  symbol-fixed position-relative">
                    <img src="{{$user->getFirstMediaUrl('avatar','avatar') != null ? $user->getFirstMediaUrl('avatar','avatar') :  public_media('assets/media/avatars/user_100.jpg')}}" alt="image">
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6   @if($user->getIsactive()) bg-success @else bg-danger @endif rounded-circle border border-4 border-white h-20px w-20px"></div>
                </div>
            </div>
            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1" style="align-self: center;">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$user->getFullname()}}</a>
                            @if($user->getEmailverifiedat())
                            <a href="#">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                        <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            @else
                            <a href="#" class="btn btn-sm btn-light-danger fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{translate('Verify Email')}}</a>
                            @endif
                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"></path>
                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                @if($user->hasRole(\App\Enums\UpdatepermissionsEnum::ADMIN_ROLE))
                                {{\App\Enums\UpdatepermissionsEnum::ADMIN_ROLE}}
                                @elseif($user->hasRole(\App\Enums\UpdatepermissionsEnum::MANAGER_ROLE))
                                {{\App\Enums\UpdatepermissionsEnum::MANAGER_ROLE}}
                                @elseif($user->hasRole(\App\Enums\UpdatepermissionsEnum::CUSTOMER_ROLE))
                                {{\App\Enums\UpdatepermissionsEnum::CUSTOMER_ROLE}}
                                @endif
                            </a>
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black"></path>
                                        <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->{{$user->getEmail()}}
                            </a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-column my-4">

                        <!-- 	<div class="d-flex my-4">
                                                    <label class=" fw-bold text-muted">{{translate('Joined date ')}} :</label>
                                                    <div class="fw-bold text-gray-600">  {{ \Carbon\Carbon::parse($user->getCreatedat())->diffForHumans() }}</div>
                                                    </div> -->
                        <div class="d-flex my-4">
                            <label class=" fw-bold text-muted">{{translate('Last login')}} :</label>
                            <div class="fw-bold text-gray-600"> {{ \Carbon\Carbon::parse($user->getCreatedat())->diffForHumans() }}</div>
                        </div>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Title-->
                <!--begin::Stats-->

                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>

    </div>
</div>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{translate('Edit user permissions')}}</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <form action="{{route('roles.update')}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{encrypt($user->id)}}" name="user_id">


            <div @if(!$user->hasPermissionTo('Manager')) class="d-none" @endif id="manager_permissions" >
                <div class="">
                    <label class=" my-2 form-check form-switch form-check-custom form-check-solid @if(!empty( array_intersect( \App\Enums\UpdatepermissionsEnum::Role_permissions(), $user->getPermissionsViaRoles()->pluck('name')->toArray()))) class_red  @endif ">
                        <input class="form-check-input" type="checkbox" @if( !empty( array_intersect( $user->getAllPermissions()->pluck('name')->toArray(),\App\Enums\UpdatepermissionsEnum::Role_permissions()))) checked @endif
                        @if(!empty( array_intersect( \App\Enums\UpdatepermissionsEnum::Role_permissions(), $user->getPermissionsViaRoles()->pluck('name')->toArray()))) disabled @else onchange="show_permissions('roles_permissions')" @endif>
                        <span class="form-check-label fw-bold text-muted">{{translate('Roles')}}</span>
                    </label>

                    <div class=" @if($user->hasPermissionTo('create roles') || $user->hasPermissionTo('view-any roles') || $user->hasPermissionTo('update roles')  || $user->hasPermissionTo('delete roles') ) @else d-none @endif  row my-2 px-4 border border-dashed border-gray-300 rounded" checkboxes_name="role_permissions[]" checkbox_id="check_all_roles" id="roles_permissions">
                        <div class="d-flex p-0">
                            <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                                <input onchange="check_all('role_permissions[]','check_all_roles')" id="check_all_roles" type="checkbox">
                                <span id="check_all_name" class="form-check-label fw-bold text-muted">{{translate('check all')}}</span>
                            </label>
                        </div>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('view-any roles')) checked @endif class="form-check-input form-check-success" @if(in_array('view-any roles',$user->getPermissionsViaRoles()->pluck('name')->toArray())) disabled @endif type="checkbox" value="view-any roles" name="role_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('view-any roles')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('create roles')) checked @endif class="form-check-input form-check-success" type="checkbox" @if(in_array('create roles',$user->getPermissionsViaRoles()->pluck('name')->toArray())) disabled @endif value="create roles" name="role_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('create new roles')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('update roles')) checked @endif class="form-check-input form-check-success" type="checkbox" @if(in_array('update roles',$user->getPermissionsViaRoles()->pluck('name')->toArray())) disabled @endif value="update roles" name="role_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('update roles ')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('delete roles')) checked @endif class="form-check-input form-check-success" type="checkbox" value="delete roles" name="role_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('delete roles')}}</span>
                        </label>
                    </div>
                </div>
                <div class="">
                    <label class="my-2 form-check form-switch form-check-custom form-check-solid">
                        <input @if($user->hasPermissionTo('create languages') || $user->hasPermissionTo('view-any languages') || $user->hasPermissionTo('update languages') || $user->hasPermissionTo('delete languages') ) checked @endif onchange="show_permissions('language_permissions')" class="form-check-input" type="checkbox" >
                        <span class="form-check-label fw-bold text-muted">{{translate('Languages')}}</span>
                    </label>

                    <div class=" @if($user->hasPermissionTo('create languages') || $user->hasPermissionTo('view-any languages') || $user->hasPermissionTo('update languages')  || $user->hasPermissionTo('delete languages') ) @else d-none  @endif row my-2 px-4 border border-dashed border-gray-300 rounded" checkboxes_name="language_permissions[]" checkbox_id="check_all_languages" id="language_permissions">
                        <div class="d-flex p-0">
                            <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                                <input onchange="check_all('language_permissions[]','check_all_languages')" id="check_all_languages" type="checkbox">
                                <span id="check_all_name" class="form-check-label fw-bold text-muted">{{translate('check all')}}</span>
                            </label>
                        </div>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('view-any languages')) checked @endif class="form-check-input form-check-success" type="checkbox" value="view-any languages" name="language_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('view-any languages')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('create languages')) checked @endif class="form-check-input form-check-success" type="checkbox" value="create languages" name="language_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('create new languages')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('update languages')) checked @endif class="form-check-input form-check-success" type="checkbox" value="update languages" name="language_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('update languages')}}</span>
                        </label>

                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('delete languages')) checked @endif class="form-check-input form-check-success" type="checkbox" value="delete languages" name="language_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('delete languages')}}</span>
                        </label>

                    </div>
                </div>
                <div class="">
                    <label class="my-2 form-check form-switch form-check-custom form-check-solid">
                        <input @if( $user->hasPermissionTo('view-any users') || $user->hasPermissionTo('view users') || $user->hasPermissionTo('create users') || $user->hasPermissionTo('create manager') || $user->hasPermissionTo('update users') || $user->hasPermissionTo('delete users') || $user->hasPermissionTo('assign user permission') || $user->hasPermissionTo('update user auth') || $user->hasPermissionTo('ban-unban user') ) checked @endif onchange="show_permissions('users_permissions')" class="form-check-input" type="checkbox" >
                        <span class="form-check-label fw-bold text-muted">{{translate('Users')}}</span>
                    </label>
                    <div class="@if($user->hasPermissionTo('view-any users') || $user->hasPermissionTo('view users') || $user->hasPermissionTo('create users')  || $user->hasPermissionTo('create manager') || $user->hasPermissionTo('update users')  || $user->hasPermissionTo('delete users')  || $user->hasPermissionTo('assign user permission') || $user->hasPermissionTo('update user auth')|| $user->hasPermissionTo('ban-unban user') ) @else d-none @endif  row my-2 px-4 border border-dashed border-gray-300 rounded" checkboxes_name="users_permissions[]" checkbox_id="check_all_users" id="users_permissions">
                        <div class="d-flex p-0">
                            <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                                <input onchange="check_all('users_permissions[]','check_all_users')" id="check_all_users" type="checkbox">
                                <span id="check_all_name" class="form-check-label fw-bold text-muted">{{translate('check all')}}</span>
                            </label>
                        </div>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('view-any users')) checked @endif class="form-check-input form-check-success" type="checkbox" value="view-any users" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('view-any users')}}</span>
                        </label>

                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('view users')) checked @endif class="form-check-input form-check-success" type="checkbox" value="view users" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('view users')}}</span>
                        </label>

                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('create users')) checked @endif class="form-check-input form-check-success" type="checkbox" value="create users" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('create users ')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('create manager')) checked @endif class="form-check-input form-check-success" type="checkbox" value="create manager" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('create manager')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('update users')) checked @endif class="form-check-input form-check-success" type="checkbox" value="update users" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('update users ')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('delete users')) checked @endif class="form-check-input form-check-success" type="checkbox" value="delete users" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('delete users ')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('assign user permission')) checked @endif class="form-check-input form-check-success" type="checkbox" value="assign user permission" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('assign permissions')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('update user auth')) checked @endif class="form-check-input form-check-success" type="checkbox" value="update user auth" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('update user auth')}}</span>
                        </label>
                        <label class="col-6 col-md-4 py-2 col-lg-3 form-check form-switch form-check-custom  form-check-solid">
                            <input @if($user->hasPermissionTo('ban-unban user')) checked @endif class="form-check-input form-check-success" type="checkbox" value="ban-unban user" name="users_permissions[]">
                            <span class="form-check-label fw-bold text-muted">{{translate('ban/unban user')}}</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-none" id="customer_permissions">

            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">{{translate('Update')}}</button>
            </div>
        </form>
    </div>
    <!--begin::Body-->
</div>
@stop

@section('modales')

@stop

@section('script')
<script>
    function change() {
        let select = document.getElementById('main_permission').value;

        if (select == "Manager") {
            document.getElementById('manager_permissions').classList.remove('d-none');
            document.getElementById('customer_permissions').classList.add('d-none');
        } else if (select == "Customer") {
            document.getElementById('customer_permissions').classList.remove('d-none');
            document.getElementById('manager_permissions').classList.add('d-none');

        }
    }

    function show_permissions(permissions_div_id) {
        if (document.getElementById(permissions_div_id).classList.contains('d-none')) {
            document.getElementById(permissions_div_id).classList.remove('d-none')
        } else {
            document.getElementById(permissions_div_id).classList.add('d-none')
            /* uncheck all permissions of this div */
            checkboxes_name = document.getElementById(permissions_div_id).getAttribute('checkboxes_name')
            checkbox_id = document.getElementById(permissions_div_id).getAttribute('checkbox_id')
            uncheck_all(checkboxes_name, checkbox_id);
        }
    }

    function check_all(checkboxes_name, checkbox_id) {
        document.getElementsByName(checkboxes_name).forEach(checkbox => {
            if (!checkbox.checked) {
                checkbox.click()
            }
        })
        document.getElementById(checkbox_id).setAttribute('onchange', "uncheck_all('".concat(checkboxes_name) + "','".concat(checkbox_id.concat("')")))
    }

    function uncheck_all(checkboxes_name, checkbox_id) {
        document.getElementsByName(checkboxes_name).forEach(checkbox => {
            if (checkbox.checked) {
                checkbox.click()
            }
        })
        document.getElementById(checkbox_id).setAttribute('onchange', "check_all('".concat(checkboxes_name) + "','".concat(checkbox_id.concat("')")))

    }
</script>
@stop