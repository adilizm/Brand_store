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
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{translate('Roles')}}</span>
            <span class="text-muted mt-1 fw-bold fs-7">{{count($roles)}} {{translate('roles')}}</span>
        </h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="{{translate('Click to add a role')}}">
            <a href="{{route('role.create')}}" class="btn btn-sm btn-light btn-active-primary" >
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->{{translate('New Role')}}
            </a>
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
                        <th >#</th>
                        <th >{{translate('Name')}}</th>
                        <th >{{translate('N° Users')}}</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach($roles as $role)
                    @if($role->name != 'ADMIN')
                    <tr>
                        <td>
                        <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$role->id}}</span>

                        </td>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$role->name}}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">15</span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                @canany(['Admin','update roles'])
                                <a href="{{route('role.edit',encrypt($role->id))}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3" title="{{translate('edit role')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                @endcanany
                                @canany(['Admin','delete roles'])
                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_delete_role{{$loop->index}}" data-bs-target="bb"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3" title="{{translate('delete role')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                @endcanany
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
@stop

@section('modales')
@canany(['Admin','delete roles'])
@foreach($roles as $role)
<div class="modal fade" id="kt_modal_delete_role{{$loop->index}}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1 text-danger ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                @php
                    $nbr_users_has_this_role=Illuminate\Support\Facades\DB::table('model_has_roles')->where('role_id',$role->id)->count();
                @endphp
                <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('role.destroy')}}" method="POST" enctype="multipart/form-data" > 
                    @if($nbr_users_has_this_role == 0)
                        @csrf
                        @method('delete')
                        @endif
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{translate('DELETION ALERT')}}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                       
                        @if($nbr_users_has_this_role > 0)
                        <label class="">
                            <p class=" ">{{translate('The role').' '. $role->name . ' '.translate('has').' '. $nbr_users_has_this_role .' users'}} </p>
                            <p>{{translate('therefore you cannot delete this role until you change the users\' role first')}}</p>
                        </label>
                        @else
                            <h3>{{translate('Confirm deletion')}}</h3>
                        @endif
                        <!--end::Label-->
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <input type="hidden" name="role_id" value="{{encrypt($role->id)}}">
                    <div class="text-center">
                        <span type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">{{translate('Cancel')}}</span>
                        @if($nbr_users_has_this_role ==0)
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-danger">
                            <span class="indicator-label">{{translate('Submit')}}</span>
                        </button>
                        @endif
                    </div>
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@endforeach
@endcanany
@stop


@section('script')
  
@stop