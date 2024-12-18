<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/login.css')
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid rounded-3 shadow-lg" alt="Sample image" />
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <!-- Login Form -->
                    <form action="{{ route('login.post') }}" method="post">
                        @csrf <!-- CSRF Token for security -->

                        <div class="mb-5">
                            <h1 class="fw-bold fs-1 text-center">Equipment Management System</h1>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control form-control-lg"
                                placeholder="Enter username" autocomplete="off" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Enter password" autocomplete="off"
                                    required />
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="bi bi-eye-slash" id="eyeIcon"></i> <!-- Default eye-slash icon -->
                                </button>
                            </div>
                        </div>

                        <!-- Role dropdown -->
                        <div class="mb-3">
                            <label class="form-label" for="roleInput">Role</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                                    id="dropdownRoleButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Role
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownRoleButton">
                                    <li><a class="dropdown-item" href="#" onclick="setRole('Admin')">Admin</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="setRole('Outsider')">Outsider</a></li>
                                </ul>
                            </div>
                            <input type="text" id="roleInput" name="role" class="form-control mt-2"
                                placeholder="Selected role will appear here" readonly required />
                        </div>

                        <!-- Login Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem">
                                Login
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Don't have an account?
                                <a href="registration" class="link-danger">Register here</a>
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
        function setRole(role) {
            document.getElementById("roleInput").value = role;
        }

        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            // Toggle password visibility
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Toggle the eye icon
            eyeIcon.classList.toggle('bi-eye'); // Show eye icon
            eyeIcon.classList.toggle('bi-eye-slash'); // Show eye-slash icon
        });
    </script>
</body>

</html>
