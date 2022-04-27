@extends('backend.master')

@section('head')
<title>Brand | titel</title>

@stop

@section('page_titel')

@stop

@section('body')

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <div class="d-flex">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{translate('Users')}}</span>
                <span class="text-muted mt-1 fw-bold fs-7">{{ count($users) }} {{translate('user')}}</span>
            </h3>
            <div class="d-none align-items-center position-relative d-lg-flex">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <form action="{{route('users.search')}}" method="get">
                    @csrf
                    <input name="search" type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="{{translate('Search user')}}" />
                </form>
            </div>
        </div>

        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="">
            <!--begin::Wrapper-->
            <div class="me-4">
                <!--begin::Menu-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->{{translate('Filter')}}
                </a>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_615c3b3180836">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">{{translate('Filter Options')}}</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <form action="{{route('users.filter')}}" method="get">
                        @csrf
                        <div class="px-7 py-5">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative mb-5">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input name="search" type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-100 ps-14" placeholder="{{translate('name|email|phone ...')}}" />
                            </div>
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">{{translate('Role')}}:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select name="role" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_615c3b3180836" data-allow-clear="true">
                                        <option></option>
                                        <option value="Manager">{{translate('Manager')}}</option>
                                        <option value="Customer">{{translate('Customer')}}</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">{{translate('Is active')}}:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="is_active" checked="checked" />
                                    <label class="form-check-label">{{translate('Enabled')}}</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">{{translate('Filter')}}</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
            @can('Admin')
            <div class="me-4">
                <!--begin::Menu-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->{{translate('New user')}}
                </a>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-150px " data-kt-menu="true" id="new_user">
                    <a href="{{route('create.user.manager')}}" class="btn btn-light menu-item btn-active-light-primary btn-sm m-2 "> {{translate('Add manager')}}</a>
                    <a href="{{route('create.user.customer')}}" class="btn btn-light menu-item btn-active-light-primary btn-sm m-2 mt-0 "> {{translate('Add Customer')}}</a>
                </div>
                <!--end::Menu 1-->
                <!--end::Menu-->
            </div>
            @endcan
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="min-w-125px">{{translate('User')}}</th>
                        <th class="min-w-125px">{{translate('Role')}}</th>
                        <th class="min-w-125px">{{translate('Last login')}}</th>
                        <th class="min-w-125px">{{translate('Two-step')}} (Soon)</th>
                        <th class="min-w-125px">{{translate('Joined Date')}}</th>
                        @canany(['Admin','delete users','edit users','assign user permission'])
                        <th class="text-end min-w-100px">{{translate('Actions')}}</th>
                        @endcanany
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @forelse($users as $user)
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::User=-->
                        <td class="d-flex align-items-center">
                            <!--begin:: Avatar -->
                            <div class="symbol symbol-circle symbol-50px me-3 position-relative">
                                <a class="w-100 h-100 symbol symbol-circle symbol-50px overflow-hidden  ">
                                    <div class="symbol-label">
                                        <img src="{{$user->getFirstMediaUrl('avatar','avatar') ? $user->getFirstMediaUrl('avatar','avatar') : public_media('assets/media/avatars/user_100.jpg')}}" alt="Emma Smith" class="w-100" />
                                    </div>
                                </a>
                                @if(!$user->getIsactive())
                                <span class="position-absolute top-0 end-0 mr-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="red">
                                        <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                @endif
                            </div>
                            <!--end::Avatar-->
                            <!--begin::User details-->
                            <div class="d-flex flex-column">
                                <a title="{{$user->getPhone()}}"  class="text-gray-800 text-hover-primary mb-1">{{$user->getFullname()}}</a>
                                <span>{{$user->getEmail()}}</span>
                            </div>
                            <!--begin::User details-->
                        </td>
                        <!--end::User=-->
                        <!--begin::Role=-->
                        <td>
                            @if($user->hasPermissionTo(\App\Enums\UpdatepermissionsEnum::ADMIN_MAIN_PERMISSION))
                            <span class="badge badge-sm badge-light-danger"> {{\App\Enums\UpdatepermissionsEnum::ADMIN_ROLE}} </span>
                            @elseif($user->hasPermissionTo(\App\Enums\UpdatepermissionsEnum::MANAGER_MAIN_PERMISSION))
                            <span class="badge badge-sm badge-light-info"> {{\App\Enums\UpdatepermissionsEnum::MANAGER_ROLE}} </span>
                            @elseif($user->hasPermissionTo(\App\Enums\UpdatepermissionsEnum::CUSTOMER_MAIN_PERMISSION))
                            <span class="badge badge-sm badge-light-success"> {{\App\Enums\UpdatepermissionsEnum::CUSTOMER_ROLE}} </span>
                            @endif
                        </td>
                        <!--end::Role=-->
                        <!--begin::Last login=-->
                        <td>
                            <div class="badge badge-light fw-bolder">{{$user->getLastlogin()}}</div>
                        </td>
                        <!--end::Last login=-->
                        <!--begin::Two step=-->
                        <td></td>
                        <!--end::Two step=-->
                        <!--begin::Joined-->
                        <td>
                            <div class="badge badge-light fw-bolder">{{ Carbon\Carbon::parse($user->getCreatedat())->format('d-M-Y H:m') }}</div>
                        </td>
                        <!--begin::Joined-->
                        @if(!$user->hasRole(\App\Enums\UpdatepermissionsEnum::ADMIN_ROLE))
                        @canany(['Admin','delete users','edit users','assign user permission'])
                        <!--begin::Action=-->
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                @canany(['Admin','view users'])
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 d-flex">
                                    <a href="{{route('user.view',encrypt($user->id))}}" class="menu-link px-3">{{translate('View')}}</a>
                                </div>
                                <!--end::Menu item-->
                                @endcanany
                                @canany(['Admin','edit users'])
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 d-flex">
                                    <a href="{{route('user.edit',encrypt($user->id))}}" class="menu-link px-3">{{translate('Edit')}}</a>
                                </div>
                                <!--end::Menu item-->
                                @endcanany
                                @canany(['Admin','ban-unban users'])
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    @if($user->getIsactive())
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_ban_user{{$loop->index}}" class="menu-link px-3">{{translate('Ban')}}</a>
                                    @else
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_unban_user{{$loop->index}}" class="menu-link px-3">{{translate('Unban')}}</a>
                                    @endif
                                </div>
                                <!--end::Menu item-->
                                @endcanany
                                @canany(['Admin','assign user permission'])
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('permissions.user',encrypt($user->id))}}" class="menu-link px-3" style="text-align: start;">{{translate('permission')}}</a>
                                </div>
                                <!--end::Menu item-->
                                @endcanany
                                @canany('Admin')
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" style="text-align: start;">{{translate('Login')}}(soon)</a>
                                </div>
                                <!--end::Menu item-->
                                @endcanany
                                @else
                              
                                @endif

                            </div>
                            <!--end::Menu-->
                        </td>
                        <!--end::Action=-->
                        @endcanany
                    </tr>
                    <!--end::Table row-->
                    @empty
                    <tr>
                        <td>{{translate('No users found')}}</td>
                    </tr>
                    @endif
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->

            <div class="d-flex justify-content-center w-100">
                {{$users->links()}}
            </div>
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
@stop

@section('modales')
@canany(['Admin','ban-unban users'])
@foreach($users as $user)
@if($user->getIsactive())
<div class="modal fade" id="kt_modal_ban_user{{$loop->index}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{route('ban.user')}}">
                <!--begin::Modal header-->
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" value="{{encrypt($user->getKey())}}">
                <div class="modal-header bg-light-danger" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{translate('Alert of banning user')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <div class="w-100 d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 20 20" fill="#F1416C">
                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="card-label fw-bolder fs-3 mb-1">
                        {{translate('Are you sure you want to bann').': ' . $user->getFullname() . ' ?'}}
                    </div>
                    <ul>
                        <li class="text-muted mt-1 fw-bold fs-7">
                            {{translate('By banning this user she/he will not be able to login to the website ')}}
                        </li>
                    </ul>
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">{{translate('Discard')}}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-danger">
                        <span class="indicator-label">{{translate('Yes, confirm to ban ')}}</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@else
<div class="modal fade" id="kt_modal_unban_user{{$loop->index}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" action="{{route('unban.user')}}">
                <!--begin::Modal header-->
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" value="{{encrypt($user->getKey())}}">
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">{{translate('Confirm of unbanning user')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_customer_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <div class="w-100 d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 20 20" fill="#F1416C">
                            <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="card-label fw-bolder fs-3 mb-1">
                        {{translate('Are you sure you want to ubann').': ' . $user->getFullname() . ' ?'}}
                    </div>
                    <ul>
                        <li class="text-muted mt-1 fw-bold fs-7">
                            {{translate('By ubanning this user she/he will be able to login again to the website')}}
                        </li>
                    </ul>
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">{{translate('Discard')}}</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{translate('Yes, confirm to uban ')}}</span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endif
@endforeach


@endcanany
@stop


@section('script')

@stop