<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('admin.layouts.partials.admin_head')
<body>
    <div id="wrapper">
        @include('admin.layouts.partials.admin_navigation')
        
        <div id="page-wrapper">
            <!-- Page Content -->
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    @include('admin.layouts.partials.admin_footer')
</body>
</html>
