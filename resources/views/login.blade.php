<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Log In </title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    {{-- CSS FOR ICONS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    {{-- FOR FONT STYLE - ALL BODY TEXT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- FONT STYLE FOR HEADING AND SUB HEADING --}}
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

    {{-- CUSTOM CSS FOR LOGIN PAGE --}}
    <link href="{{ asset('assets/css/custom/loginCreateForget.css') }}" rel="stylesheet">
</head>

{{-- <body style="font-family: 'DM Serif Text', serif;"> --}}
<body>

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-4 shadow px-4 py-4 rounded">
                    <div class="text-center login_logo">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h2 class="mb-4 text-center">Log In</h2>
                    <div class="alert alert-danger errorDiv d-none" role="alert"></div>
                    <form class="loginForm" autocomplete="off">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="username" class="form-control" id="floatingInput" placeholder="" value="Sarfraz@ss.com">
                            <label for="floatingInput">Enter Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="" value="12345678">
                            <label for="floatingPassword">Enter Password</label>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary submitBtn">Log In</button>
                        </div>
                    </form>
                    <div class="login_links my-5 text-center">
                        <a href="{{ url('create_account') }}">Create an account</a> | <a href="{{ url('forget_password') }}">Forget Paasword</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var baseUrl = "{{ url('/') }}";
        var formAction = "{{ route('auth.loginFormProcess') }}";
    </script>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>

</body>

</html>