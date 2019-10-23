<!DOCTYPE html>
<html lang="en">
  @include('partials.head')

  <body class="nav-md">
    <div class="container body">
      {{-- <div class="main_container"> --}}
          @if (Auth::user())
          <!-- sidebar menu -->
          @include('partials.sidenavbar')
          <!-- /sidebar menu -->

            <!-- top navigation -->
          @include('partials.topnavbar')
            <!-- /top navigation -->
          @endif

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('partials.footer')
        <!-- /footer content -->
      {{-- </div> --}}
    </div>

  </body>
</html>
