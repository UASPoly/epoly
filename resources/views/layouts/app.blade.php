@include('include.pages.header')
@include('include.pages.nav_bar')
<!-- content -->
<div class="container" id="app">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('include.pages.feed_back')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block-header">
                <h5>@yield('breadcrumbs')</h5>
            </div>
        </div>
    </div>
    <div class="row">
        @auth

            @include('admin::calender.activate')
        @endauth
        @include('sweetalert::alert')
        @yield('page-content')
    </div>
</div>

<!-- / content -->
@include('include.pages.footer')
