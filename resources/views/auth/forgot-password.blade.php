<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Gallery - Medical Admin Templates & Dashboards</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="assets/images/favicon.svg">

    <!-- *************
			************ CSS Files *************
		************* -->
    <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="assets/css/main.min.css">

</head>

<body class="login-bg">

    <!-- Container starts -->
    <div class="container">

        <!-- Auth wrapper starts -->
        <div class="auth-wrapper">

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Form starts -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="auth-box">
                    <a href="index.html" class="auth-logo mb-4">
                        <img src="assets/images/logo-dark.svg" alt="Bootstrap Gallery">
                    </a>

                    <h6 class="fw-light mb-4">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h6>

                    <div class="mb-3">
                        <label class="form-label" for="email">Your email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" :value="old('email')" required autofocus class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="mb-3 d-grid">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
            <!-- Form ends -->

        </div>
        <!-- Auth wrapper ends -->

    </div>
    <!-- Container ends -->

</body>

</html>
