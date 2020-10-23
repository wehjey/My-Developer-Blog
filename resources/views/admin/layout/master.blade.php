<!DOCTYPE html>
<html lang="en">

  <head>

    @include('admin._includes.head')

    @yield('head')

  </head>

  <body class="fixed-nav" id="page-top">

    @include('admin._includes.nav')

    <!-- Main content -->
    <div class="content-wrapper py-3">
      <div class="container-fluid">

        @include('admin._includes.breadcrumb')

        <hr/>

        @yield('content')

      </div>
    </div>
    <!-- End main content -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- End scroll to top -->

    @include('admin._includes.logout_modal')

    @include('admin._includes.foot')

    @yield('foot')

  </body>

</html>