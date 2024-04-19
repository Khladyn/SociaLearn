<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadata -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <meta property="og:url" content="#" />
        <meta property="og:title" content="SociaLearn" />
        <meta property="og:description" content="Together We Excel" />
        <meta property="og:image" content="{{ asset('img/og_img.jpg') }}" />
        <meta name="twitter:card" content="summary_large_image">
        <meta name="description" content="SociaLearn" />
        <meta name="keywords" content="SociaLearn" />
    
        <title> Login - SociaLearn </title>
    
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}"/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
        <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('img/favicon-192x192.png') }}" type="image/x-icon" sizes="192x192">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('img/favicon-512x512.png') }}" type="image/x-icon" sizes="512x512">
        <link rel="manifest" href="{{ asset('img/site.webmanifest') }}">
    
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <link rel="stylesheet" href="{{ asset('/css/pace-theme-minimal.css') }}">
    </head>
  
    <body class="sl-login-main d-flex flex-column min-vh-100">

        <div class="main-container d-flex">
            <!-- Sidebar -->
            <div class="sidebar sticky-top h-100 vh-100" id="side_nav">
                {{-- <div class="header_box px-1 pt-3 d-flex justify-content-between">
                    <a href="{{ route('index') }}"><img src="{{ asset('img/defaults/login-logo-white.png') }}" class="mx-auto img-fluid w-25"></a>
                    <button class="btn close-btn px-3 py-0 text-light"><i class="fas fa-arrow-left fa-lg"></i></button>
                </div> --}}
        
                <div class="current-user px-3 pt-2 p-2 my-3 text-center">
                    <div class="row">
                        <div class="col-12">
                            @if(auth()->check() && auth()->user()->profile_picture)
                                <!-- If the user is logged in and has a profile picture, display it -->
                                <img src="{{ Storage::url(auth()->user()->profile_picture) }}" class="rounded-circle mb-2" alt="Profile Picture">
                            @else
                                <!-- If the user is not logged in or doesn't have a profile picture, display the default avatar -->
                                <img src="{{ asset('img/defaults/default_avatar.jpg') }}" class="rounded-circle mb-2" alt="Default Avatar">
                            @endif
                        </div>
                        
                        <div class="col-12 label">
                            <small class="text-light">Currently logged in as:</small>
                            <h5 class="current-name fw-bold text-light text-uppercase"> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} </h5>
                            <a href="mailto:{{ auth()->user()->email }}?subject=Hey%2C%20I%20saw%20your%20account%20on%20SociaLearn%21">
                                <h6><span class="badge text-bg-light mt-1">{{ auth()->user()->email }}</span></h6>
                            </a>
                        </div>
                    </div>
                </div>
        
                <hr class="text-light">
        
                <ul class="list-unstyled px-2 pt-3 sidebar-item">
                    <li id="dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="text-decoration-none px-2 py-2 d-block"><i class="fas fa-home fa-lg"></i> <span class="label">&nbsp; Dashboard</span> </a>
                    </li>
                    <li id="my_courses" class="{{ request()->is('my_courses') ? 'active' : '' }}">
                        <a href="{{ route('my_courses') }}" class="text-decoration-none px-2 py-2 d-block"><i class="fas fa-books fa-lg"></i> <span class="label">&nbsp; My Courses</span> </a>
                    </li>
                    <li id="enrolled_courses" class="{{ request()->is('enrolled_courses') ? 'active' : '' }}">
                        <a href="{{ route('enrolled_courses') }}" class="text-decoration-none px-2 py-2 d-block"><i class="fas fa-backpack fa-lg"></i> <span class="label">&nbsp; Other Courses</span> </a>
                    </li>
                    <li id="network" class="{{ request()->is('network') ? 'active' : '' }}">
                        <a href="{{ route('network') }}" class="text-decoration-none px-2 py-2 d-block"><i class="fas fa-chart-network fa-lg"></i> <span class="label">&nbsp; Network</span> </a>
                    </li>
                    <li id="profile" class="{{ request()->is('profile') ? 'active' : '' }}">
                        <a href="{{ route('profile') }}" class="text-decoration-none px-2 py-2 d-block"><i class="fas fa-user fa-lg"></i> <span class="label">&nbsp; My Profile</span> </a>
                    </li>
                </ul>
            </div>
            <!-- End of Sidebar -->
        
            <div class="content">
                <!-- Header -->
                <nav class="sl-header navbar navbar-expand-md">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between d-block">
                            <button class="btn px-1 py-0 open-btn me-2 text-light"><i class="fas fa-bars fa-lg"></i></button>
                        </div>
        
                        <p class="greeting mx-3 me-auto mb-1 text-light"> Welcome back, <span class="text-uppercase"><b>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}!</b></span>
                            <div class="time mx-3 mb-1 text-light">Today is {{ now()->format('F j, Y') }} </div>
                        </p>
        
                        <!-- Account -->
                        <div class="header-user dropdown me-1">
                            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                @if(auth()->user()->profile_picture)
                                    <img src="{{ Storage::url(auth()->user()->profile_picture) }}" class="header-avatar rounded-circle">
                                @else
                                    <img src="{{ asset('img/defaults/default_avatar.jpg') }}" class="header-avatar rounded-circle">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end text-small">
                                <div class="container">
                                    <div class="row my-3">
                                        <div class="col-4">
                                            <img src="{{ auth()->user()->profile_picture ? Storage::url(auth()->user()->profile_picture) : asset('img/defaults/default_avatar.jpg') }}" class="header-avatar-inside rounded-circle">
                                        </div>
                                        <div class="col-8">
                                            <h6 class="current-name fw-bold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h6>
                                            <a href="mailto:{{ auth()->user()->email }}?subject=Hey%2C%20I%20saw%20your%20account%20on%20SociaLearn%21">
                                                <small>{{ auth()->user()->email }}</small>
                                            </a>
                                            <br><small class="current-name fw-bold">{{ auth()->user()->affiliation }}</small>
                                        </div>
                                    </div>
                                    <hr>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-danger fw-bold w-50 float-end mb-2" type="submit">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- End of Header -->        
                
    <main>
        <!-- Content section -->
        @yield('content')
    </main>

<!-- Start of Footer -->
<footer class="sl-footer-main mt-auto">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <a href="{{ route('index') }}"><img class="img-fluid d-block mx-auto mb-2" src="{{ asset('img/defaults/login-logo-white.png') }}" alt="SocialLearn" title="SocialLearn" width="80"></a>
                <p class="d-block text-center mb-3">&copy; 2023 SociaLearn</p>
            </div>
            <div class="col-xl-1 col-lg-6 col-md-6 col-6">
                <h5 class="text-light fw-bold">COURSES</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><a class="link-light text-decoration-none" href="{{ route('my_courses') }}"> My Courses</a></li>
                    <li class="mb-1"><a class="link-light text-decoration-none" href="{{ route('enrolled_courses') }}"> Enrolled Courses</a></li>
                    <li class="mb-1"><a class="link-light text-decoration-none" href="{{ route('all_courses') }}"> All Courses</a></li>
                </ul>
            </div>  
            <div class="col-xl-1 col-lg-6 col-md-6 col-6">
                <h5 class="text-light fw-bold">PROFILE</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><a class="link-light text-decoration-none" href="{{ route('network') }}"> Network</a></li>
                    <li class="mb-1"><a class="link-light text-decoration-none" href="{{ route('profile') }}"> My Profile</a></li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                <h4 class="text-light fw-bold">TOGETHER WE EXCEL</h4>
                <small>SociaLearn is a cutting-edge e-learning web platform that redefines the online learning experience. Designed to foster collaboration and engagement, 
                    SociaLearn seamlessly integrates social elements into the learning process, creating a vibrant community of learners.</small>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                <h5 class="text-light fw-bold">GET IN TOUCH WITH US</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-1"><i class="fab fa-facebook fa-lg"></i>&nbsp; <a class="link-light text-decoration-none" href="https://www.facebook.com" target="_blank"> Facebook</a></li>
                    <li class="mb-1"><i class="fab fa-youtube fa-lg"></i>&nbsp; <a class="link-light text-decoration-none" href="https://www.youtube.com" target="_blank"> YouTube</a></li>
                    <li class="mb-1"><i class="fab fa-instagram fa-lg"></i>&nbsp; <a class="link-light text-decoration-none" href="https://www.instagram.com" target="_blank"> Instagram</a></li>
                    <li class="mb-1"><i class="fas fa-envelope fa-lg"></i>&nbsp; <a class="link-light text-decoration-none" href="mailto:socialearn@gmail.com" target="_blank"> socialearn@gmail.com</a></li>
                </ul>
            </div> 
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Include your JavaScript scripts here -->
<script type="text/javascript" src="{{ asset('js/jquery-3.6.0.slim.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
        $(document).ready(function () {
            // Add active class to the clicked sidebar item
            $('ul.sidebar-item li').click(function () {
                $('ul.sidebar-item li').removeClass('active');
                $(this).addClass('active');
            });
        });
</script>


</body>
</html>