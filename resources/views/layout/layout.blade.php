<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    @vite('resources/css/dashboard.css')
    @vite('resources/css/adminlayout.css')
</head>

<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button id="toggleSidebar" class="btn btn-light me-2">
                    <i class="bi bi-list"></i>
                </button>
                <img src="{{ asset('images/logo.png') }}" class="d-none d-sm-block" alt="Logo" style="height: 40px; width: auto;">
                <a class="navbar-brand fw-bold" href="{{ route('equipment.index') }}">{{ config('app.name') }}</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button type="button" class="nav-link btn btn-danger btn-sm d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">
                            <i class="bi bi-box-arrow-right me-2"></i> Log Out
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal for Log Out Confirmation -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Log Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Layout: Sidebar + Content -->
    <div class="main-content d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar">
            <div class="p-3">
                <h5 class="fw-bold">Admin</h5>
                <div class="accordion" id="accordionExample">
                    <!-- Dashboard -->
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
                        <div id="collapseTwo" class="accordion-collapse">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('equipment.index') }}"
                                            class="nav-link {{ Request::routeIs('equipment.index') ? 'active' : '' }}">Equipment
                                            List</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('equipment.create') }}"
                                            class="nav-link {{ Request::routeIs('equipment.create') ? 'active' : '' }}">Add
                                            Equipment</a>
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
        <div id="content" class="flex-fill">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
    
            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('sidebar-collapsed');
            });
        });
    </script>
    
</body>

</html>
