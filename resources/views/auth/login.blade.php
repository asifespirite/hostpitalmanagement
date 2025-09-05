<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Hospital Management">
    <meta property="og:title" content="Hospital Management">
    <meta property="og:description" content="Marketplace for Hospital Management">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/remix/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css ') }}">

</head>

<body class="login-bg">

    <!-- Container starts -->
    <div class="container">

        <!-- Auth wrapper starts -->
        <div class="auth-wrapper">

            <!-- Form starts -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="auth-box">
                    <a href="index.html" class="auth-logo mb-4">
                        <img src="{{ asset('assets/images/logo-dark.svg') }} " alt="Bootstrap Gallery">
                    </a>

                    <h4 class="mb-4">Login</h4>

                    <div class="mb-3">
                        <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" :value="old('email')" class="form-control" placeholder="Enter your email" autofocus>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="pwd">Your password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" placeholder="Enter password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="ri-eye-line text-primary" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>


                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <!-- <a href="{{ url('register') }}" class="btn btn-secondary">Not registered? Signup</a> -->
                    </div>

                </div>

            </form>
            <!-- Form ends -->

        </div>
        <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->
    <script>
        document.getElementById("togglePassword").addEventListener("click", function() {
            const passwordInput = document.getElementById("password");
            const icon = document.getElementById("toggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("ri-eye-line");
                icon.classList.add("ri-eye-off-line"); // switch to eye-off icon
            } else {
                passwordInput.type = "password";
                icon.classList.remove("ri-eye-off-line");
                icon.classList.add("ri-eye-line"); // switch back to eye
            }
        });
    </script>

</body>

</html>
