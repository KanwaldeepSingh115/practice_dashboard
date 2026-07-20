<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login System</title>

    <link rel="icon" type="image/x-icon" href="../assets/images/map.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <section class="login-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-5 col-md-7 col-sm-10">

                    <div class="login-card">

                        <!-- Logo -->

                        <div class="text-center mb-4">

                            <img src="../assets/images/logo.png" class="logo" alt="Logo">

                        </div>

                        <!-- Heading -->

                        <h2 class="text-center fw-bold">
                            Welcome Back
                        </h2>

                        <p class="text-center text-muted mb-4">
                            Login to continue
                        </p>

                        <!-- Form -->

                        <form id="loginForm">

                            <!-- Email -->

                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    Email Address
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Enter your email" autocomplete="email" required>

                                </div>

                                <div class="text-danger small d-none" id="emailError">
                                    Please enter a valid email address.
                                </div>

                            </div>

                            <!-- Password -->

                            <div class="mb-3">

                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>

                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter your password" autocomplete="current-password" required>

                                    <button type="button" class="btn" id="togglePassword">

                                        <i class="bi bi-eye" id="toggleIcon"></i>

                                    </button>

                                </div>

                                <small id="capsLockWarning" class="text-danger d-none">

                                    Caps Lock is ON

                                </small>

                                <div class="text-danger small d-none" id="passwordError">
                                    Password is required.
                                </div>

                            </div>
                            <!-- Remember -->

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">

                                    <label for="remember" class="form-check-label">
                                        Remember Me
                                    </label>

                                </div>

                                <a href="#" class="forgot-link">

                                    Forgot Password?

                                </a>

                            </div>

                            <!-- Login -->

                            <div class="d-grid">

                                <button type="submit" class="btn login-btn" id="loginBtn">

                                    <span id="btnText">

                                        Login

                                    </span>

                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none">

                                    </span>

                                </button>

                            </div>

                        </form>

                        <!-- Divider -->

                        <div class="divider my-4">

                            <span>OR</span>

                        </div>

                        <!-- Google -->

                        <button class="btn btn-google w-100">

                            <i class="bi bi-google me-2"></i>

                            Continue with Google

                        </button>

                        <!-- Register -->

                        <p class="text-center mt-4">

                            Don't have an account?

                            <a href="#">

                                Register

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="../assets/js/app.js"></script>

</body>

</html>