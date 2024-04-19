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
                        <form action="{{ route('register') }}" method="POST" class="p-3" enctype="multipart/form-data">
                            @csrf
                            <div class="my-4">
                                <h1><i class="fas fa-university fa-lg"></i></h1>
                                <h2 class="fw-bold"> Registration - Step 1 </h2>
                        
                                <div class="row">
                                    <h5 class="mt-4"> Personal Information </h5>
                                    <div class="col-md-4 my-2">
                                        <label for="first_name"> First Name: *</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control rounded" placeholder="Enter your first name here..." 
                                        value="{{ old('first_name', session('registration_step_1.first_name')) }}" required>
                                        @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="middle_name"> Middle Name: </label>
                                        <input type="text" name="middle_name" id="middle_name" class="form-control rounded" placeholder="Enter your middle name here..."
                                        value="{{ old('middle_name', session('registration_step_1.middle_name')) }}" >
                                        @error('middle_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 my-2">
                                        <label for="last_name"> Last Name: *</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control rounded" placeholder="Enter your last name here..." 
                                        value="{{ old('last_name', session('registration_step_1.last_name')) }}" required>
                                        @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="address"> Address: *</label>
                                        <input type="text" name="address" id="address" class="form-control rounded" placeholder="Enter your address here..." 
                                        value="{{ old('address', session('registration_step_1.address')) }}" required>
                                        @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="affiliation"> School/Institution Affiliated With: *</label>
                                        <input type="text" name="affiliation" id="affiliation" class="form-control rounded" placeholder="Enter your school/institution here..." 
                                        value="{{ old('affiliation', session('registration_step_1.affiliation')) }}" required>
                                        @error('affiliation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="birthday"> Birthday: *</label>
                                        <input type="date" name="birthday" id="birthday" class="form-control rounded" 
                                        value="{{ old('birthday', session('registration_step_1.birthday')) }}" required>
                                        @error('birthday')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label for="gender"> Gender: *</label>
                                        <select class="form-select rounded" name="gender" id="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender', session('registration_step_1.gender')) === 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', session('registration_step_1.gender')) === 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Prefer not to say" {{ old('gender', session('registration_step_1.gender')) === 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                                        </select>
                                        @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>                                    
                                    <div class="col-md-12 my-2">
                                        <label for="profile_picture"> Profile Picture: </label>
                                        <input class="form-control" type="file" id="profile_picture" name="profile_picture">
                                        <small><i> (If left blank, default avatar will be used) </i></small>
                                        @error('profile_picture')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="login-button d-flex justify-content-end">
                                <a href="{{ route('index') }}" class="btn btn-light rounded-pill fw-bold w-25 me-2" type="submit"><i class="fas fa-caret-left"></i> Back</a>
                                <button type="submit" class="btn btn-light rounded-pill fw-bold w-25"> Next <i class="fas fa-caret-right"></i></button>
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