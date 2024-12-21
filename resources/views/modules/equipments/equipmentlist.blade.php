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

        <!-- Table -->
        <div class="table-responsive">
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
                                <span class="badge 
                                    @if($equipment->status == 'Available') 
                                        bg-success 
                                    @elseif($equipment->status == 'In-use') 
                                        bg-warning 
                                    @elseif($equipment->status == 'Under-maintenance') 
                                        bg-danger 
                                    @else
                                        bg-secondary
                                    @endif
                                ">
                                    {{ $equipment->status }}
                                </span>
                            </td>

                            <td class="d-flex align-items-center">
                                <!-- Edit Button -->
                                <a href="{{ route('equipment.edit', ['equipment' => $equipment]) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>

                                <!-- Delete Button (Triggers Modal) -->
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $equipment->id }}">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal{{ $equipment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $equipment->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $equipment->id }}">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete the equipment: <strong>{{ $equipment->equipment_name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('equipment.delete', ['equipment' => $equipment]) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <!-- See More Button -->
                                <a href="{{ route('equipment.showDetail', ['equipment' => $equipment]) }}" class="btn btn-sm btn-secondary me-2">
                                    <i class="bi bi-eye-fill"></i> See More
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
