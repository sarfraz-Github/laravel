<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create Account </title>
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
                <div class="col-md-6 shadow px-4 py-4 rounded">
                    <div class="text-center login_logo">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h2 class="mb-4 text-center">Create an account</h2>
                    <div class="alert alert-danger errorDiv d-none" role="alert"></div>
                    <form class="createAccountForm" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="">
                                    <label for="firstName">First Name</label>
                                    <div class="invalid-feedback firstName-error"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="lastName" class="form-control" id="lastName" placeholder="">
                                    <label for="lastName">Last Name</label>
                                    <div class="invalid-feedback lastName-error"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="email" name="emailAddress" class="form-control" id="emailAddress" placeholder="">
                                    <label for="emailAddress">Email Address</label>
                                    <div class="invalid-feedback emailAddress-error"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="role" class="form-select" id="role" aria-label="Floating label select example">
                                        <option value="" selected>Open this select role</option>
                                        <option value="0">Admin</option>
                                        <option value="1">User</option>
                                        <option value="2">Staff</option>
                                    </select>
                                    <label for="role">Select Role</label>
                                    <div class="invalid-feedback role-error"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="">
                                    <label for="password">Enter Password</label>
                                    <div class="invalid-feedback password-error"></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <div class="invalid-feedback password_confirmation-error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg submitBtn">Create an Account</button>
                        </div>
                    </form>
                    <div class="login_links my-5 text-center">
                        <a href="{{ url('login') }}">Log In</a> | <a href="{{ url('forget_password') }}">Forget Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('modules.successToastModule')

    <script>
        var baseUrl = "{{ url('/') }}";
        var formAction = "{{ route('auth.registerProcess') }}";
    </script>
    <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/create_account.js') }}"></script>

</body>

</html>