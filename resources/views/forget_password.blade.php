<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forget Password </title>
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

<body>

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-4 shadow px-4 py-4 rounded">
                    <div class="text-center login_logo">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h2 class="mb-4 text-center">Forget Password</h2>
                    <form action="#">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput">Enter Username</label>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                    <div class="login_links my-5 text-center">
                        <a href="{{ url('login') }}">Log In</a> | <a href="{{ url('create_account') }}">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>