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
            <div class="sl-login-left col-xl-9 col-lg-12 col-md-12 col-12">
                <!-- Right Panel -->
                <div class="container-fluid p-4">
                    <div class="col-md-11 mx-auto">

                        {{-- @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <form action="{{ route('register_2') }}" method="POST" class="p-3">
                            @csrf
                            <div class="my-4">
                                <h1><i class="fas fa-university fa-lg"></i></h1>
                                <h2 class="fw-bold"> Registration - Step 2 </h2>
                        
                                <div class="row">
                                    <h5 class="mt-4"> Account E-mail Address </h5>
                                    <div class="col-md-12 my-2">
                                        <label for="email"> E-mail Address: *</label>
                                        <input type="email" name="email" id="email" class="form-control rounded" placeholder="Enter your email here..." required>
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label for="confirm_email"> Confirm E-mail Address: *</label>
                                        <input type="email" name="confirm_email" id="confirm_email" class="form-control rounded" placeholder="Confirm your email here..." required>
                                        @error('confirm_email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                        
                                    <h5 class="mt-4"> Account Password </h5>
                                    <div class="col-md-12 my-2">
                                        <label for="password"> Password: *</label>
                                        <input type="password" name="password" id="password" class="form-control rounded" placeholder="Enter your password here..." required>
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label for="confirm_password"> Confirm Password: *</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control rounded" placeholder="Confirm your password here..." required>
                                        @error('confirm_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="login-button d-flex justify-content-end">
                                <a href="{{ route('register') }}" class="btn btn-light rounded-pill fw-bold w-25 me-2" type="submit"><i class="fas fa-caret-left"></i> Back</a>
                                <button type="submit" class="btn btn-success rounded-pill fw-bold w-25"> Register</button>
                            </div>      
                        </form>                                             
                    </div>
                </div>
            </div>

            <div class="sl-register-right col-xl-3 col-lg-12 col-md-12 col-12">
            
            </div>
        </div>

        <script type="text/javascript" src="assets/js/jquery-3.6.0.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
       
    </body>
</html>