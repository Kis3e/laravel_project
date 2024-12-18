<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/dashboard.css')
    @vite('resources/css/adminlayout.css')
    <style>

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
                <h5 class="fw-bold">Admin</h5>
                <div class="accordion" id="accordionExample">
                    {{-- Dashboard --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="dashboard">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                aria-expanded="false" data-bs-target="#collapseOne" data-bs-parent="#accordionExample">
                                Dashboard
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="nav-link">Summary View</a></li>
                                    <li><a href="#" class="nav-link">Equipment Status</a></li>
                                    <li><a href="#" class="nav-link">Usage Trends</a></li>
                                    <li><a href="#" class="nav-link">Maintenance Overview</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Equipment -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="equipment">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                aria-expanded="false" data-bs-target="#collapseTwo" data-bs-parent="#accordionExample">
                                Equipments
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('equipment.index') }}" class="nav-link">Equipment List</a>
                                    </li>
                                    <li><a href="{{ route('equipment.create') }}" class="nav-link">Add Equipment</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Drivers -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="driver">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                data-bs-parent="#accordionExample">
                                Drivers
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="nav-link">Driver List</a></li>
                                    <li><a href="#" class="nav-link">Add Driver</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Requests -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="request">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"
                                data-bs-parent="#accordionExample">
                                Requests
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="nav-link">Pending Request</a></li>
                                    <li><a href="#" class="nav-link">Request History</a></li>
                                    <li><a href="#" class="nav-link">Request Status</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Reports -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="report">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"
                                data-bs-parent="#accordionExample">
                                Reports
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="nav-link">Equipment Status Report</a></li>
                                    <li><a href="#" class="nav-link">Maintenance and Repair Report</a></li>
                                    <li><a href="#" class="nav-link">Request Report</a></li>
                                    <li><a href="#" class="nav-link">Usage and Downtime Report</a></li>
                                    <li><a href="#" class="nav-link">Fuel Consumption Report</a></li>
                                    <li><a href="#" class="nav-link">Revenue and Cost Analysis Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content Area -->
        <div id="content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var navLinks = document.querySelectorAll('.accordion-body .nav-link');

    navLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent the click event from propagating to the accordion button
        });
    });
});

    </script>
</body>

</html>
