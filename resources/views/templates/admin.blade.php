@include('admin.templates.header')
@if (Auth::check())
    @include('admin.templates.header_menu')
    @include('admin.templates.sidebar_menu')
@endif
@yield('content')
@include('admin.templates.footer')