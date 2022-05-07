<!doctype html>
<html lang="en">
@include('layouts.header')

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('layouts.topmenu')
    @include('layouts.uitheme')

    <div class="app-main">
      @include('layouts.sidemenu')
      <div class="app-main__outer">

        @yield('content')
        @include('layouts.footer')
      </div>
    </div>

    <script type="text/javascript" src="{{url('newcrm/assets/scripts/main.js')}}"></script>
    
    @yield('footerfile')
    @yield('modal-content')
  </div>
</body>

</html>