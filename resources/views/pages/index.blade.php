<!DOCTYPE html>
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:url" content="#" />
    <meta property="og:title" content="SociaLearn" />
    <meta property="og:description" content="Together We Excel" />
    <meta property="og:image" content="{{ asset('assets/img/og_img.jpg') }}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="description" content="SociaLearn" />
    <meta name="keywords" content="SociaLearn" />

    <title> Login - SociaLearn </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/favicon-192x192.png') }}" type="image/x-icon" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/favicon-512x512.png') }}" type="image/x-icon" sizes="512x512">
    <link rel="manifest" href="{{ asset('assets/img/site.webmanifest') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/pace-theme-minimal.css') }}">
</head>
  
    <body class="sl-login-main d-flex flex-column min-vh-100">
        <div class="row g-0 sl-main-row">
            <div class="sl-login-left col-xl-6 col-lg-12 col-md-12 col-12">
                <!-- Right Panel -->
                <div class="container-fluid p-4">
                    @if($errors->has('success'))
                        <div class="alert alert-success">
                            {{ $errors->first('success') }}
                        </div>
                    @endif
                    
                    @if($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif

                    <div class="col-md-8 mx-auto">
                        
                        <form class="p-3" style="margin-top: 90px !important;" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <h1><i class="fas fa-university fa-lg"></i></h1>
                                <h2 class="fw-bold"> Welcome to SociaLearn! </h2>
                                <h4>Let's get you started. </h4>
                            </div>
                        
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="E-mail Address" required>
                                <label for="floatingInput">E-mail Address</label>
                            </div>
                        
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                        
                            <div class="login-checkbox mb-4">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember me</label>
                            </div>
                        
                            <!-- Note: button changed to "a" tag for the meantime for front end demo -->
                            <div class="login-button d-flex justify-content-center">
                                <button class="btn btn-light rounded-pill fw-bold w-100" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                        

                        </form>
                        <div class="login-others text-start mt-4">
                            <small class="d-block">Don't have an account yet? <a href="{{ route('register') }}" class="link-light"> Register here! </a> </small>
                            <!-- <small class="d-block"><a href="#" class="link-light"> Forgot your password? </a> </small> -->
                        </div>
                    </div>
        
                </div>
            </div>

            <div class="sl-login-right col-xl-6 col-lg-12 col-md-12 col-12">
                <!-- Left Panel -->

                <div class="container-fluid p-5">
                    <div class="p-5 bg-body-tertiary rounded-3 text-dark" style="margin-top: 80px !important;">
                        <div class="d-flex">
                            <img class="img-fluid mb-2" src="{{ asset('img/defaults/login-logo.png') }}" width="100">
                            <h2 class="fw-bold mx-4 mt-4"> SociaLearn </h2>
                        </div>
                        <hr>
                        <h5><i>Together We Excel</i></h5>
                        <small>SociaLearn is a cutting-edge e-learning web platform that redefines the online learning experience. Designed to foster collaboration and engagement, SociaLearn seamlessly integrates social elements into the learning process, creating a vibrant community of learners.</small>
                        <br><br><small class="text-muted">Build 1.0 / 12.06.2023</small>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/jquery-3.6.0.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
       
    </body>
</html>