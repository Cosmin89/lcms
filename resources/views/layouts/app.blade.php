<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.partials._head')
<body>
    <div id="app">
        @include('layouts.partials._navigation')
        <!-- Page Content -->
        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>



