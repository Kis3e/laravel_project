@extends('layout.layout')

@section('content')
    <div class="">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url()->current() }}">Equipments</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Equipment List</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="mt-2 text-start">Equipment List</h1>

        <!-- Add Equipment Button -->
        <a href="{{ route('equipment.create') }}" class="btn btn-sm btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Add Equipment
        </a>

        <!-- Toggle Button for List/Card View -->
        <button id="toggleView" class="btn btn-secondary mb-3">
            <i class="bi bi-view-list"></i> Switch to Card View
        </button>

        <!-- Table View -->
        <div id="tableView" class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Serial Number</th>
                        <th>Equipment Name</th>
                        <th>Price</th>
                        <th>Date Purchased</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($equipments as $equipment)
                        <tr>
                            <td>{{ $equipment->serial_number }}</td>
                            <td>{{ $equipment->equipment_name }}</td>
                            <td>{{ $equipment->equipment_price }}</td>
                            <td>{{ $equipment->date_purchased }}</td>
                            <td>{{ $equipment->equipment_description }}</td>
                            <td>
                                <span
                                    class="badge 
                                    @if ($equipment->status == 'Available') bg-success 
                                    @elseif($equipment->status == 'In-use') 
                                        bg-warning 
                                    @elseif($equipment->status == 'Under-maintenance') 
                                        bg-danger 
                                    @else
                                        bg-secondary @endif
                                ">{{ $equipment->status }}</span>
                            </td>

                            <td class="d-flex align-items-center">
                                <a href="{{ route('equipment.edit', ['equipment' => $equipment]) }}"
                                    class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $equipment->id }}">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </td>

                            <td>
                                <a href="{{ route('equipment.showDetail', ['equipment' => $equipment]) }}"
                                    class="btn btn-sm btn-secondary me-2">
                                    <i class="bi bi-eye-fill"></i> See More
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

<!-- Card View (Initially Hidden) -->
<div id="cardView" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" style="display: none;">
    @foreach ($equipments as $equipment)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ $equipment->image_url }}" class="card-img-top" alt="{{ $equipment->equipment_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $equipment->equipment_name }}</h5>
                    <p class="card-text">{{ $equipment->equipment_description }}</p>
                    <p class="card-text"><strong>Status: </strong>
                        <span
                            class="badge 
                            @if ($equipment->status == 'Available') bg-success 
                            @elseif($equipment->status == 'In-use') 
                                bg-warning 
                            @elseif($equipment->status == 'Under-maintenance') 
                                bg-danger 
                            @else
                                bg-secondary @endif
                        ">{{ $equipment->status }}</span>
                    </p>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-start gap-2">
                        <!-- Edit Button -->
                        <a href="{{ route('equipment.edit', ['equipment' => $equipment]) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i> Edit
                        </a>

                        <!-- Delete Button (Modal Trigger) -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $equipment->id }}">
                            <i class="bi bi-trash-fill"></i> Delete
                        </button>

                        <!-- See More Button -->
                        <a href="{{ route('equipment.showDetail', ['equipment' => $equipment]) }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-eye-fill"></i> See More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



        <!-- JavaScript for toggling views -->
        <script>
            document.getElementById('toggleView').addEventListener('click', function() {
                var tableView = document.getElementById('tableView');
                var cardView = document.getElementById('cardView');
                var toggleButton = document.getElementById('toggleView');

                if (tableView.style.display === 'none') {
                    tableView.style.display = 'block';
                    cardView.style.display = 'none';
                    toggleButton.innerHTML = '<i class="bi bi-view-list"></i> Switch to Card View';
                } else {
                    tableView.style.display = 'none';
                    cardView.style.display = 'block';
                    toggleButton.innerHTML = '<i class="bi bi-grid"></i> Switch to List View';
                }
            });
        </script>
    @endsection
