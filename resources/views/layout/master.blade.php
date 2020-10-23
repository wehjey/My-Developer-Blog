<!DOCTYPE html>
<html>
    <head>
        @include('_includes.head')
        @yield('head')
    </head>
    <body class="is-loading">
    
    <!-- Wrapper -->
		<div id="wrapper" class="{{ ($page == 'home') ? 'fade-in' : '' }}">

        @yield('content')

        @include('_includes.foot')

        </div>
    @yield('foot')
    </body>
</html>