<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.partials._head')
<body>
    @include('layouts.partials._navigation')

    <div class="container">
        <div class="row">
            @yield('content')
            @include('layouts.partials._widgets')
        </div>
    
    @include('layouts.partials._footer')
</body>
</html>



