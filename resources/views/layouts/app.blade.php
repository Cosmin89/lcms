
<html lang="{{ app()->getLocale() }}">
    @include('layouts.partials._head')
<body>
    @include('layouts.partials._navigation')

    <div id="app">
        <div class="container">
            
            <div class="row">
                @yield('content')
            </div>
    
        @include('layouts.partials._footer')
    </div>
    
</body>
</html>



