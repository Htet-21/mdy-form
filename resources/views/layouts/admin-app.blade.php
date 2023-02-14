<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="{{ asset('images/paing-logo.jpg') }}" type="image/jpg" sizes="16x16">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  Paing's Courses | Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('/css/admin-styles.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/demo/demo.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap.css') }}" type="text/css" rel="stylesheet">

  <script src="{{ asset('/js/jquery.table2excel.js') }}"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">

        <a href="/" class="simple-text logo-normal">
          <img src="{{ asset('/images/paing-logo.jpg') }}" alt="Paing's Courses Logo">
        </a>

      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ url('/dashboard') }}">
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/dashboard/success') }}">
              <p>Success Orders</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/dashboard/error') }}">
              <p>Failed Orders</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/users') }}">
              <p>Users</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/payment-provider') }}">
              <p>Payment Provider</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <!-- <a class="navbar-brand" href="#pablo">Table List</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link">
                  {{ Auth::user()->name }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('ထွက်ရန်') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        @yield('content')
      </div>

      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Powered by <a href="https://dinger.asia" target="_blank">Dinger</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('/demo/demo.js') }}"></script>


  @yield('scripts')

</body>

</html>