<!DOCTYPE html>
<html>
    <head>
        <title>App Name - {{ $title }}</title>
    </head>
    <body>
        @if(Session::has('message'))
            <p style="color: green; ">{{ Session::get('message') }}</p>
        @endif
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>