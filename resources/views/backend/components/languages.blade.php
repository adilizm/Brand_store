@php
$languages=\App\Models\Language::all();
@endphp

<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
    @foreach($languages as $language)
    @if($language->getkey() == Session::get('lang') )
    
        <a href="#" class="menu-link px-5">
            <span class="menu-title position-relative">{{translate('Language')}}
                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{$language->name}}
                    <img class="w-15px h-15px rounded-1 ms-2" onerror="this.src='https://wplang.org/wp-content/uploads/2014/09/Flags-of-the-world.jpg'" src="{{'/storage/'.$language->getImage()}}" alt="{{$language->key}}" />
                </span>
            </span>
        </a>
    @endif
    @endforeach
    <!--begin::Menu sub-->
    <div class="menu-sub menu-sub-dropdown w-175px py-4">
        @foreach($languages as $language)
        <form action="{{route('language.change')}}" method="get">
        @csrf
            <input type="hidden" name="language_id" value="{{$language->getId()}}">
            <div onclick="closest('form').submit();" class="menu-item px-3">            
                <span  class="menu-link d-flex px-5 active">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" onerror="this.src='https://wplang.org/wp-content/uploads/2014/09/Flags-of-the-world.jpg'"  src="{{'/storage/'.$language->getImage()}}" alt="{{$language->key}}" />
                    </span>{{$language->name}}
                </span>
            </div>
        </form>
        @endforeach
    </div>
</div>