<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/dashboard.css')
    @vite('resources/css/userlayout.css')
    <style>
        /* Custom styles for sidebar and main content */
        
    </style>
</head>

<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Layout: Sidebar + Content -->
    <div class="main-content">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div class="p-3">
           

                <ul class="list-unstyled">
                    <!-- View Equipment -->
                    <li>
                        <a href="{{ route('user.equipmentlist.index') }}" class="text-decoration-none d-block py-2">
                            View Equipment
                        </a>
                    </li>

                    <!-- Send Request Form -->
                    <li>
                        <a href="#" class="text-decoration-none d-block py-2">
                            Send Request Form
                        </a>
                    </li>

                    <!-- View Request Status -->
                    <li>
                        <a href="#" class="text-decoration-none d-block py-2">
                            View Request Status
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Content Area -->
        <div id="content" class="border border-5">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
