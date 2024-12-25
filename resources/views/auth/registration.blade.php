<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/registration.css')
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <style>
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{ asset('images/logo.png') }}"
                        class="img-fluid rounded-3 logo" alt="Sample image" />
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('registration.post') }}" method="post">
                        @csrf

                        <div class="mb-5">
                            <h1 class="fw-bold fs-1 text-center">Equipment Management System</h1>
                        </div>

                        <!-- Full Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" autocomplete="off"
                                class="form-control form-control-lg" placeholder="Enter Full Name" required />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" autocomplete="off"
                                class="form-control form-control-lg" placeholder="Enter a valid Email" required />
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" autocomplete="off"
                                class="form-control form-control-lg" placeholder="Enter username" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4 password-wrapper">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" autocomplete="off"
                                    class="form-control form-control-lg" placeholder="Enter a password" required />
                                <button type="button" class="btn btn-outline-dark" id="togglePassword">
                                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" autocomplete="off"
                                name="password_confirmation" class="form-control form-control-lg"
                                placeholder="Confirm password" required />
                            <div id="passwordError" class="error-message">Passwords do not match.</div>
                        </div>


                        <!-- Register button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                Register
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Already have an Account?
                                <a href="{{ route('login') }}" class="link-danger">Login Here</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        // Get the form and inputs
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const passwordError = document.getElementById('passwordError');
        const submitBtn = document.getElementById('submitBtn');
        const togglePassword = document.getElementById('togglePassword');

        // Function to validate passwords
        function validatePasswords() {
            if (password.value !== confirmPassword.value) {
                passwordError.style.display = 'block';
                submitBtn.disabled = true; // Disable submit button
            } else {
                passwordError.style.display = 'none';
                submitBtn.disabled = false; // Enable submit button
            }
        }

        // Event listeners for password fields
        password.addEventListener('input', validatePasswords);
        confirmPassword.addEventListener('input', validatePasswords);

        // Toggle password visibility
        togglePassword.addEventListener('click', function() {
            const type = password.type === "password" ? "text" : "password";
            password.type = type;
            // Toggle the icon
            this.innerHTML = type === "password" ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
        });
    </script>
</body>

</html>
