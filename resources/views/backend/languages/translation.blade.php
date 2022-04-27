@extends('backend.master')

@section('head')
<title>Brand | {{translate('Translation')}}</title>
@stop

@section('body')
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">{{translate('Translation')}}</span>
            <span class="text-muted mt-1 fw-bold fs-7">{{$language->getname()}}</span>
        </h3>
        
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="{{translate('search a specific terme')}}">
           <form class="d-flex position-relative" action="{{route('language.translation',encrypt($language->getid()))}}" method="get">
                @csrf
                <input class="form-control form-control-solid col-6" name="search" type="text" placeholder="{{translate('Type & Enter')}}">
                <input class="form-control form-control-solid col-6" value="{{encrypt($language->getid())}}" name="language_id" type="hidden">
                <button class="btn btn-primary position-absolute end-0"  type="submit">{{translate('Search')}}</button>
            </form>
        </div>

    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <form action="{{ route('language.translation.update') }}" method="post">
                @csrf
                <input type="hidden" name="lang" value="{{$language->getkey()}}">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th >{{translate('key')}}</th>
                        <th >{{translate('value')}}</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                  
                   @foreach($translations as $translation)
                    <tr>
                        <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{$translation->getkey()}}</span>
                        </td>
                        <td>
                            <input class="form-control form-control-solid col-6" name="values[]" type="text" value="{{$translation->getvalue()}}">
                            <input  name="keys[]" type="hidden" value="{{$translation->getkey()}}">
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <!--end::Table body-->
            </table>
            <div class="row mx-1 d-flex justify-content-between">
                {{$translations->links()}}
                <button class="btn btn-primary col-sm-4 d-flex justify-content-center   col-md-3" type="submit">{{translate('Update')}}</button>
            </div>
            </form>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
@stop

@section('modales')

@stop

@section('script')
 
@stop