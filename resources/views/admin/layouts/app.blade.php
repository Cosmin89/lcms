
<html lang="{{ app()->getLocale() }}">
    @include('admin.layouts.partials.admin_head')
<body>
    <div id="wrapper">
        @include('admin.layouts.partials.admin_navigation')
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>{{ Auth::user()->username }}</small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                @yield('content')
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    @include('admin.layouts.partials.admin_footer')
    @yield('scripts') 
    
</body>
</html>
