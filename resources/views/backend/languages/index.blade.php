@extends('backend.master')

@section('head')
<title>Brand | titel</title>
@stop

@section('body')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{translate('Languages')}}</span>
            <span class="text-muted mt-1 fw-bold fs-7">{{ count($languages) }} {{translate('languages')}}</span>
        </h3>
        @canany(['Admin','languages create'])
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="{{translate('Click to add new language')}}">
            <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->{{translate('New Language')}}
            </a>
        </div>
        @endcanany
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
                        <th >{{translate('Direction')}}</th>
                        <th >{{translate('Key')}}</th>
                        <th >{{translate('Created at')}}</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach($languages as $language)
                    <tr>
                        <td>
                            <div class=" d-flex">
                                <img class="w-15px h-15px rounded-1 ms-2" onerror="this.src='https://wplang.org/wp-content/uploads/2014/09/Flags-of-the-world.jpg'"  src="{{storage($language->getImage())}}"  alt="{{$language->getName()}}">
                            </div>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$language->getName()}}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$language->getNumberUsers()}}</span>
                        </td>
                        <td>
                            @if($language->getRtl())
                                <span  title="{{translate('right to left')}}" class="badge badge-light-success">RTL</span>
                            @else
                                <span title="{{translate('left to right')}}" class="badge badge-light-info">LTR</span>
                            @endif 
                        </td>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$language->getKey()}}</span>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$language->getCreatedAt()}}</span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                            @canany(['Admin','create languages'])
                                <a href="{{route('language.translation',encrypt($language->id))}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <span class="svg-icon svg-icon-3" title="{{translate('edit translation')}}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"/>
                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"/>
                                        </svg>
                                    </span>
                                </a>
                                @endcanany
                                @canany(['Admin','update languages'])
                                <a data-bs-toggle="modal" data-bs-target="{{'#kt_modal_edit_lang_' . $loop->index}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3" title="{{translate('edit language')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                @endcanany
                                @canany(['Admin','delete languages'])
                                <a data-bs-toggle="modal" data-bs-target="{{'#kt_modal_delete_lang_' . $loop->index}}"  class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <span class="svg-icon svg-icon-3" title="{{translate('delete language')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                        </svg>
                                    </span>
                                </a>
                                @endcanany
                            </div>
                        </td>
                    </tr>
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
@canany(['Admin','create languages'])
<div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
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
                <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('language.store')}}" method="POST" enctype="multipart/form-data" > 
                    <!--begin::Heading-->
                    @csrf
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{translate('CREATE NEW LANGUAGE')}}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">{{translate('language name')}}</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" required class="form-control form-control-solid" placeholder="{{translate('Enter language name')}}" name="name">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">{{translate('language key')}}</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('abbreviation for the language example: en for English , ar for Arabic')}}" aria-label="Specify a target priorty"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text"  maxlength="2"  required class="form-control form-control-solid" placeholder="{{translate('Enter language key')}}" name="key">

                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack mb-8">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="fs-6 fw-bold">{{translate('is this language uses RTL')}}</label>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('RTL = right to left')}}"></i>

                            <div class="fs-7 fw-bold text-muted">{{translate('if this language written from right to left check this input')}}</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="is_RTL">
                            <span class="form-check-label fw-bold text-muted">RTL</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-15 fv-row">
                        <div class="d-flex flex-center">
                            <div class="me-5">
                                <button onclick="click_input()" id="btn_click_input" type="button" class="btn btn-sm btn-light-primary">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="black"></path>
                                            <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="black"></path>
                                            <path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    {{translate('upload image')}}
                                </button>
                            </div>
                            <input class="d-none" required type="file" accept="image/png, image/gif, image/jpeg, image/svg" name="image" id="language_image">
                            <div class="me-5 d-none" id="language_image_changer">
                                <img src="/assets/" width="50" height="25" id="lang_image_preview" alt=""> <span onclick="click_input()" class=" cursor-pointer text-primary font-bold" >{{translate('change')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <span type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">{{translate('Cancel')}}</span>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">{{translate('Submit')}}</span>
                        </button>
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
@endcanany

@foreach($languages as $language)

@canany(['Admin','update languages'])
<div class="modal fade" id="{{'kt_modal_edit_lang_' . $loop->index}}" tabindex="-1" aria-hidden="true">
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
                <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('language.update')}}" method="POST" enctype="multipart/form-data" > 
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="lang_id" value="{{encrypt($language->id)}}">
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{translate('Edit Language')}}</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">{{translate('language name')}}</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" required class="form-control form-control-solid" value="{{$language->name}}" placeholder="{{translate('Enter language name')}}" name="name">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">{{translate('language key')}}</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('abbreviation for the language example: en for English , ar for Arabic')}}" aria-label="Specify a target priorty"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" required class="form-control form-control-solid" value="{{$language->key}}" placeholder="{{translate('Enter language key')}}" name="key">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack mb-8">
                        <!--begin::Label-->
                        <div class="me-5">
                            <label class="fs-6 fw-bold">{{translate('is this language uses RTL')}}</label>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="{{translate('RTL = right to left')}}"></i>

                            <div class="fs-7 fw-bold text-muted">{{translate('if this language written from right to left check this input')}}</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" @if($language->is_RTL) checked @endif name="is_RTL">
                            <span class="form-check-label fw-bold text-muted">RTL</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-15 fv-row">
                        <div class="d-flex flex-center">
                          
                            <input class="d-none" type="file" accept="image/png, image/gif, image/jpeg, image/svg" name="image" id="{{'language_image'. $loop->index}}">
                            <div class="me-5"  id="{{'language_image_changer'.$loop->index}}">
                                <img src="{{storage($language->getImage())}}" onerror="this.src='https://wplang.org/wp-content/uploads/2014/09/Flags-of-the-world.jpg'"  width="50" height="25" id="{{'lang_image_preview'.$loop->index}}" alt=""> <span onclick="edit_click_input_modal('{{'lang_image_preview'.$loop->index}}','{{'language_image'. $loop->index}}')" class=" cursor-pointer text-primary font-bold" >{{translate('change')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <span type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">{{translate('Cancel')}}</span>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">{{translate('Submit')}}</span>
                        </button>
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
@endcanany

@canany(['Admin','delete languages'])
<div class="modal fade" id="{{'kt_modal_delete_lang_' . $loop->index}}" tabindex="-1" aria-hidden="true">
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
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('language.destroy')}}" method="POST" enctype="multipart/form-data" > 
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="lang_id" value="{{encrypt($language->id)}}">
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{translate('Delete Language')}} - {{$language->name}}</h1>
                        <!--end::Title-->
                    </div>
                  
                    <div class="mb-15 fv-row">
                        <div class="d-flex flex-center">
                          are you sure you want to delete this language ??
                        </div>
                    </div>
                    <div class="text-center">
                        <span type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">{{translate('Cancel')}}</span>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-danger">
                            <span class="indicator-label">{{translate('Delete')}}</span>
                        </button>
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
@endcanany

@endforeach
@stop

@section('script')
 <script>
     function click_input(){
        document.getElementById('btn_click_input').classList.add('d-none');
        document.getElementById('language_image_changer').classList.remove('d-none');
        document.getElementById('language_image').click();

     }
     
     function click_input_modal(image_id){
        document.getElementById('btn_click_input').classList.add('d-none');
        document.getElementById('language_image_changer').classList.remove('d-none');
        document.getElementById('language_image').click();

     }
     
     document.getElementById('language_image').addEventListener('change', () => {
        const [file] = language_image.files
        if (file) {
            document.getElementById('lang_image_preview').src = URL.createObjectURL(file)
        }
    })

     function edit_click_input_modal(image_preview_id,input_file_id){
        document.getElementById(input_file_id).click();
     }

     @foreach ($languages as $language)

     document.getElementById('{{'language_image'. $loop->index}}').addEventListener('change', () => {
        const [file] = {{'language_image'. $loop->index}}.files
        if (file) {
            document.getElementById('{{'lang_image_preview'.$loop->index}}').src = URL.createObjectURL(file)
        }
    })

     @endforeach
     
 </script>
@stop