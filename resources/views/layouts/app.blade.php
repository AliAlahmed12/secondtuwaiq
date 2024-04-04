<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        footer{
            background: rgb(26,84,171);
            background: linear-gradient(90deg, rgba(26,84,171,1) 0%, rgba(2,34,91,1) 100%); 
        }
    </style>
</head>
<body dir="{{(session()->get('locale')=='ar' ? 'rtl' : 'ltr')}}">
    <div id="app">
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light text-white" style="background: rgb(26,84,171);
            background: linear-gradient(90deg, rgba(26,84,171,1) 0%, rgba(2,34,91,1) 100%); ">
                <!-- Container wrapper -->
                <div class="container-fluid">
                <!-- Toggle button -->
                <button
                    data-mdb-collapse-init
                    class="navbar-toggler"
                    type="button"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <i class="fas fa-bars"></i>
                </button>
            
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="{{route('homePage')}}">
                        <img src="{{ asset('assets/img/logo.png') }}" height="100" alt="Technology Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">{{__('message.Dashboard')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">{{__('message.Products')}}</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->
                <li class="nav-item dropdown p-3 list-unstyled">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (session()->get('locale') == 'ar')
                        <img src="/assets/img/languages/sa.png" class="rounded-circle" width="30" height="30"  alt="">
                        @else
                        <img src="/assets/img/languages/en.png" class="rounded-circle" width="30" height="30"  alt="">
                        @endif
                    </a>
                    
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item text-center" href="{{url('language/ar')}}">العربية <img src="/assets/img/languages/sa.png" class="rounded-circle" width="30" height="30"  alt="">  </a></li>
                      <li><a class="dropdown-item text-center" href="{{url('language/en')}}">English <img src="/assets/img/languages/en.png" class="rounded-circle" width="30" height="30"  alt=""> </a></li>
                    </ul>
                  </li>
                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="{{route('cart')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">{{Session::get('count')}}</span>
                    </a>
            
                    
                    <!-- Avatar -->
                    <div class="dropdown">
                    <a
                        data-mdb-dropdown-init
                        class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuAvatar"
                        role="button"
                        aria-expanded="false"
                    >
                        <img
                        src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                        class="rounded-circle"
                        height="25"
                        alt="Black and White Portrait of a Man"
                        loading="lazy"
                        />
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li>
                        <a class="dropdown-item" href="#">My profile</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                    </div>
                </div>
                <!-- Right elements -->
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>

        <main class="">
            @yield('content')
        </main>


        <footer class="text-center bg-body-tertiary text-white mt-5">
            <!-- Grid container -->
            <div class="container pt-4">
              <!-- Section: Social media -->
              <section class="mb-4">
                <!-- Facebook -->
                <a
                  data-mdb-ripple-init
                  class="btn btn-link btn-floating btn-lg text-body m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-facebook-f text-white"></i
                ></a>
          
                <!-- Twitter -->
                <a
                  data-mdb-ripple-init
                  class="btn btn-link btn-floating btn-lg text-body m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-twitter text-white"></i
                ></a>
          
                <!-- Google -->
                <a
                  data-mdb-ripple-init
                  class="btn btn-link btn-floating btn-lg text-body m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-google text-white"></i
                ></a>
          
                <!-- Instagram -->
                <a
                  data-mdb-ripple-init
                  class="btn btn-link btn-floating btn-lg text-body m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-instagram text-white"></i
                ></a>
          
                <!-- Linkedin -->
                <a
                  data-mdb-ripple-init
                  class="btn btn-link btn-floating btn-lg text-body m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-linkedin text-white"></i
                ></a>
                <!-- Github -->
                <a
                  data-mdb-ripple-init
                  class="btn btn-link btn-floating btn-lg text-body m-1"
                  href="#!"
                  role="button"
                  data-mdb-ripple-color="dark"
                  ><i class="fab fa-github text-white"></i
                ></a>
              </section>
              <!-- Section: Social media -->
            </div>
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.05);">
              © 2020 Copyright:
              <a class="text-body text-white" href="https://mdbootstrap.com/"><p class="text-white">Ali-Habib-Alahmed.com</p></a>
            </div>
            <!-- Copyright -->
          </footer>
    </div>
</body>
</html>
