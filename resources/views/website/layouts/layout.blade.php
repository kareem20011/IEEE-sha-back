<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
  @if($setting->hasMedia('favicon'))
  <link rel="icon" type="image/x-icon" href="{{ $setting->getFirstMediaUrl( 'favicon' )}}">
  @endif
  <title>{{ config("app.name") }} | Home </title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset( 'website/css/bootstrap.min.css' ) }}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset( 'website/aos/dist/aos.css' ) }}">

  <link rel="stylesheet" href="{{ asset( 'website/css/all.min.css' ) }}">
  <link rel="stylesheet" href="{{ asset( 'website/css/style.css' ) }}">
  <link rel="stylesheet" href="{{ asset( 'website/css/owl.css' ) }}">

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <!--

Host Cloud Template

https://templatemo.com/tm-541-host-cloud

-->
</head>

<body>


  <!-- Header -->
  <header class="p-3">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <h2>{{ config("app.name") }}</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item {{ request()->is('events') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('events.index') }}">Events</a>
            </li>
            <li class="nav-item {{ request()->is('workshops') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route( 'workshops.index' ) }}">Workshops</a>
            </li>
            <li class="nav-item {{ request()->is('board') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route( 'board.index' ) }}">Board</a>
            </li>
            <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route( 'about.index' ) }}">About</a>
            </li>
          </ul>
        </div>
        @if(auth()->user())
        <div class="functional-buttons">



          <div class="dropdown me-lg-5 me-md-5">
            <span style="cursor: pointer; color: white" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-user"></i>
            </span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              @if( auth()->user()->role == 'admin' )
                <a class="dropdown-item" href="{{ route( 'admin.dashboard' ) }}">Dashboard <i class="fa-solid fa-arrow-right"></i></a>
                <a class="dropdown-item" href="{{ route( 'admin.profile.edit' ) }}">Profile</i></a>
                <form class="dropdown-item" method="POST" action="{{ route('logout') }}" id="signOut">
                    @csrf
                    <a href="#" onclick="document.getElementById('signOut').submit()"><span>Sign out</span> <i class="fa fa-sign-out-alt  size-icon-1"></i></a>
                </form>
              @else
              <a class="dropdown-item" href="{{ route( 'profile.edit' ) }}">Profile</i></a>
              <form class="dropdown-item" method="POST" action="{{ route('logout') }}" id="signOut">
                  @csrf
                  <a href="#" onclick="document.getElementById('signOut').submit()"><span>Sign out</span> <i class="fa fa-sign-out-alt  size-icon-1"></i></a>
              </form>
              @endif
            </div>
          </div>






        </div>
        @else
          <div class="functional-buttons">
            <ul>
              <li><a href="{{ route( 'login' ) }}">Log in</a></li>
            </ul>
          </div>
        @endif
      </div>
    </nav>
    @yield('header')
  </header>

  <!-- Start who are we -->











    @yield('website_content')
















   <!-- Footer Starts Here -->
   <footer>
    <div class="container">
      <div class="row d-flex justify-content-between">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="footer-item">
            <div class="footer-heading">
              <h2>About Us</h2>
            </div>
            <p>{{ $about->about_us }}</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="footer-item">
            <div class="footer-heading">
              <h2>Hosting Plans</h2>
            </div>
            <ul class="footer-list">
              <li><a href="#">Basic Cloud 5X</a></li>
              <li><a href="#">Cloud VPS 10X</a></li>
              <li><a href="#">Advanced Cloud</a></li>
              <li><a href="#">Custom Designs</a></li>
              <li><a href="#">Special Solutions</a></li>
            </ul>
          </div>
        </div>


        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="footer-item">
            <div class="footer-heading">
              <h2>More Information</h2>
            </div>
            <ul class="footer-list">
              @if($setting->phone_number != null)
                <li>Phone: <a href="#">
                  {{ $setting->phone_number }}
                </a></li>
              @endif

              @if($setting->whatsapp != null)
                <li>Whatsapp: <a href="#">
                  {{ $setting->whatsapp }}
                </a></li>
              @endif

              @if($setting->email != null)
                <li>Email: <a href="#">
                  {{ $setting->email }}
                </a></li>
              @endif

              @if($setting->facebook != null)
                <li>Facebook: <a href="#">
                  {{ $setting->facebook }}
                </a></li>
              @endif

              @if($setting->instagram != null)
                <li>Instagram: <a href="#">
                  {{ $setting->instagram }}
                </a></li>
              @endif

              @if($setting->tiktok != null)
                <li>Tiktok: <a href="#">
                  {{ $setting->tiktok }}
                </a></li>
              @endif

            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="sub-footer">
            <p>Copyright &copy; 2024</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Ends Here -->


  





  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset( 'website/js/jquery.min.js' ) }}"></script>
  <script src="{{ asset( 'website/js/bootstrap.bundle.js' ) }}"></script>
  
  <!-- Additional Scripts -->
  <script src="{{ asset( 'website/js/custom.js' ) }}"></script>
  <script src="{{ asset( 'website/js/owl.js' ) }}"></script>
  <script src="{{ asset( 'website/js/accordions.js' ) }}"></script>
  <script src="{{ asset( 'website/aos/dist/aos.js' ) }}"></script>

  <script>
    AOS.init();
  </script>


  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
      if (!cleared[t.id]) {                      // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value = '';         // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>