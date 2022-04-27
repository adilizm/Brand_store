@extends('backend.master')

@section('head')
<title>{{env('APP_NAME')}} | {{translate('settings')}}</title>

<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<script src="/assets/plugins/global/plugins.bundle.js"></script>
@stop

@section('body')
<div class="card">
    <div class="card-header card-header-stretch overflow-auto">
        <ul class="nav nav-stretch nav-line-tabs fw-bold border-transparent flex-nowrap" role="tablist" id="kt_layout_builder_tabs">
            <li class="nav-item">
                <a class="nav-link active d-flex" data-bs-toggle="tab" href="{{'#setting_panel_lang'.$data[0][0][\App\Models\Language::KEY_COLUMN_NAME]}}" role="tab" aria-selected="true"> <img src="{{storage($data[0][0]->getImage())}}" class="w-15px h-15px rounded-1 ms-2 mx-1" alt=""> {{$data[0][0]->name}}</a>
            </li>
            @foreach($data as $language)
            @if($loop->index > 0)
            <li class="nav-item">
                <a class="nav-link  d-flex" data-bs-toggle="tab" href="{{'#setting_panel_lang'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" role="tab" aria-selected="true"> <img src="{{storage($language[0]->getImage())}}" class="w-15px h-15px rounded-1 ms-2 mx-1" alt=""> {{$language[0]->name}}</a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    <form class="form" method="POST" id="kt_layout_builder_form" action="{{route('settings.update')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <form class="form" method="POST" id="kt_layout_builder_form" action="{{route('settings.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="tab-content pt-3">
                    <!-- general setting default lang start pannel -->
                    <div class="tab-pane active" id="{{'setting_panel_lang'.$data[0][0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                        <div class="card">
                            <div class="card-header card-header-stretch overflow-auto">
                                <ul class="nav nav-stretch nav-line-tabs fw-bold border-transparent flex-nowrap" role="tablist" id="kt_layout_builder_tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="{{'#general_setting'.$data[0][0][\App\Models\Language::KEY_COLUMN_NAME]}}" role="tab" aria-selected="true">{{translate('General')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="{{'#seo_setting'.$data[0][0][\App\Models\Language::KEY_COLUMN_NAME]}}" role="tab" aria-selected="false">{{translate('Seo')}}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active" id="{{'general_setting'.$data[0][0][\App\Models\Language::KEY_COLUMN_NAME]}}">

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website name')}} :</label>
                                            <div class="col-lg-9 col-xl-4">
                                                <input type="text" required class="form-control form-control-solid" value="{{$data[0][1]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}" placeholder="{{translate('Enter website name')}}" name="website_name">
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website description')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea type="text" required class="form-control form-control-solid"  placeholder="{{translate('Enter website description')}}" name="website_description" maxlength="300"> {{$data[0][2]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website favicon (16px * 16px)')}} :</label>
                                            <div class="col-lg-9 col-xl-8 d-flex">
                                                <img width="25" height="25" id="favicon_image_default_lang" src="{{Storage($data[0][9]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME])}}" alt="">
                                                <span onclick="document.getElementById('favicon_input_default_lang').click()" class=" p-2 cursor-pointer text-primary font-bold">{{translate('change')}}</span>
                                                <input type="file" onchange="preview_image('favicon_image_default_lang','favicon_input_default_lang')" name="website_favicon" class="d-none" id="favicon_input_default_lang">
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website logo (269px * 56px)')}} :</label>
                                            <div class="col-lg-9 col-xl-8 d-flex">
                                                <img width="256" height="59" id="website_Logo_image_default_lang" src="{{Storage($data[0][8]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME])}}" alt="">
                                                <span onclick="document.getElementById('logo_input_default_lang').click()" class=" p-2 cursor-pointer text-primary font-bold">{{translate('change')}}</span>
                                                <input type="file" onchange="preview_image('website_Logo_image_default_lang','logo_input_default_lang')" name="website_Logo" class="d-none" id="logo_input_default_lang">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="{{'seo_setting'.$data[0][0][\App\Models\Language::KEY_COLUMN_NAME]}}">

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Meta Description Tags')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea required class="form-control form-control-solid" placeholder="{{translate('Enter meta description Tag')}}" name="website_meta_description_tag">{{$data[0][3]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:title Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" required class="form-control form-control-solid" placeholder="{{translate('Enter default og:title Tag')}}" value="{{$data[0][4]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}" name="website_og_title_tag">
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:url Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" required class="form-control form-control-solid" placeholder="{{translate('Enter default og:url Tag')}}"  value="{{$data[0][5]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}" name="website_og_url_tag">
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default keywords Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control form-control-solid"  value="{{$data[0][6]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}" id="keywords_tags_default_lang" name="keywords_tags" />
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:description Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea required class="form-control form-control-solid" placeholder="{{translate('Enter og:description Tag')}}" name="website_og_description_tag">{{$data[0][7]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:image Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8 d-flex">
                                                <img loading=lazy style="max-width: 250px;" width="200" height="100" id="og_image_default_lang" src="{{Storage($data[0][10]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME])}}" alt="">
                                                <span onclick="document.getElementById('og_image_input_default_lang').click()" class=" p-2 cursor-pointer text-primary font-bold">{{translate('change')}}</span>
                                                <input type="file" onchange="preview_image('og_image_default_lang','og_image_input_default_lang')" name="website_default_og_image" class="d-none" id="og_image_input_default_lang">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- general setting default lang end pannel -->
                    <!-- general setting other languages start pannel -->
                    @foreach($data as $language)
                    @if($loop->index > 0)
                    <div class="tab-pane" id="{{'setting_panel_lang'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                        <div class="card">
                            <div class="card-header card-header-stretch overflow-auto">
                                <ul class="nav nav-stretch nav-line-tabs fw-bold border-transparent flex-nowrap" role="tablist" id="kt_layout_builder_tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="{{'#general_setting'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" role="tab" aria-selected="true">{{translate('General')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="{{'#seo_setting'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" role="tab" aria-selected="false">{{translate('Seo')}}</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="card-body">
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active" id="{{'general_setting'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website name')}} :</label>
                                            <div class="col-lg-9 col-xl-4">
                                                <input type="text" required class="form-control form-control-solid" value="{{$language[1]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}"  placeholder="{{translate('Enter website name')}}" name="{{'website_name'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website description')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea type="text" required class="form-control form-control-solid" maxlength="300" placeholder="{{translate('Enter website description')}}" name="{{'website_description'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">{{$language[2]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website favicon (16px * 16px)')}} :</label>
                                            <div class="col-lg-9 col-xl-8 d-flex">
                                                <img width="25" height="25" id="{{'favicon_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" src="{{Storage($language[9]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME])}}" alt="">
                                                <span onclick="document.getElementById('{{'favicon_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}').click()" class=" p-2 cursor-pointer text-primary font-bold">{{translate('change')}}</span>
                                                <input type="file" onchange="preview_image('{{'favicon_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}','{{'favicon_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}')" name="{{'website_favicon'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" class="d-none" id="{{'favicon_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('website logo (269px * 56px)')}} :</label>
                                            <div class="col-lg-9 col-xl-8 d-flex">
                                                <img width="256" height="59" id="{{'website_Logo_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" name="{{'website_Logo'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" src="{{Storage($language[8]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME])}}" alt="">
                                                <span onclick="document.getElementById('{{'logo_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}').click()" class=" p-2 cursor-pointer text-primary font-bold">{{translate('change')}}</span>
                                                <input type="file" onchange="preview_image('{{'website_Logo_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}','{{'logo_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}')" name="{{'website_Logo'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" class="d-none" id="{{'logo_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="{{'seo_setting'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Meta Description Tags')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea required class="form-control form-control-solid" placeholder="{{translate('Enter meta description Tag')}}" maxlength="300" name="{{'website_meta_description_tag'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">{{$language[3]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:title Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" required class="form-control form-control-solid" placeholder="{{translate('Enter default og:title Tag')}}" value="{{$language[4]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}" name="{{'website_og_title_tag'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:url Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input type="text" required class="form-control form-control-solid" placeholder="{{translate('Enter default og:url Tag')}}" value="{{$language[5]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}"  name="{{'website_og_url_tag'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                                            </div>
                                        </div>
                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default keywords Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control form-control-solid" value="{{$language[6]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}"  id="{{'keywords_tags'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}"  name="{{'keywords_tags'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" />
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:description Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <textarea required class="form-control form-control-solid" placeholder="{{translate('Enter og:description Tag')}}" maxlength="300" name="{{'website_og_description_tag'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">{{$language[7]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME]}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-10">
                                            <label class="col-lg-3 col-form-label text-lg-end">{{translate('Default og:image Tag')}} :</label>
                                            <div class="col-lg-9 col-xl-8 d-flex">
                                                <img loading=lazy style="max-width: 250px;" height="100" width="200" id="{{'og_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" src="{{Storage($language[10]->Business_Setting_Translations[0][\App\Models\Business_Setting_Translation::VALUE_COLUMN_NAME])}}" alt="">
                                                <span onclick="document.getElementById('{{'og_image_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}').click()" class=" p-2 cursor-pointer text-primary font-bold">{{translate('change')}}</span>
                                                <input type="file" onchange="preview_image('{{'og_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}','{{'og_image_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}')" name="{{'website_default_og_image'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}" class="d-none" id="{{'og_image_input'.$language[0][\App\Models\Language::KEY_COLUMN_NAME]}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- general setting other languages end pannel -->
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer py-8">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9">
                        <input type="hidden" id="kt_layout_builder_tab" name="layout-builder[tab]" value="general_setting">
                        <input type="hidden" id="kt_layout_builder_action" name="layout-builder[action]">
                        <button type="submit" id="kt_layout_builder_preview" class="btn btn-primary me-2">
                            <span class="indicator-label">{{translate('Update setting')}}</span>
                        </button>
                        <a href="{{route('settings.index')}}" class="btn btn-active-light ">
                            <span class="indicator-label">{{translate('Reset')}}</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
</div>

@stop

@section('modales')

@stop

@section('script')

<script>
    function preview_image(image_id, input_id) {
        const [file] = document.getElementById(input_id).files
        if (file) {
            document.getElementById(image_id).src = URL.createObjectURL(file)
        }
    }

    // The DOM elements you wish to replace with Tagify
    var input1 = document.querySelector("#keywords_tags");
    // Initialize Tagify components on the above inputs
    new Tagify(input1);
</script>
@stop