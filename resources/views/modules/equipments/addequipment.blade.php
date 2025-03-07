@extends('layout.layout')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('equipment.index') }}">Equipment</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('equipment.index') }}">Equipment List</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Equipment</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="mt-2 text-start">Add Equipment</h1>

        <!-- Go Back Button -->
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Go Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5 class="alert-heading"><i class="bi bi-exclamation-circle-fill"></i> Validation Error</h5>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Add Equipment Form --}}
    <div class="container-fluid">
        <div class="card shadow-sm mt-2">
            <div class="card-body">
                <form action="{{ route('equipment.store') }}" method="post" enctype="multipart/form-data">
                    @csrf <!-- CSRF Token for security -->
                    @method('post')

                    <div class="row mb-3">
                        <!-- Serial Number -->
                        <div class="col-md-6">
                            <label for="serial_number" class="form-label fw-bold">Serial Number</label>
                            <input type="text" name="serial_number" id="serial_number"
                                class="form-control form-control-sm" placeholder="Enter serial number" required>
                        </div>

                        <!-- Equipment Name -->
                        <div class="col-md-6">
                            <label for="equipment_name" class="form-label fw-bold">Equipment Name</label>
                            <input type="text" name="equipment_name" id="equipment_name"
                                class="form-control form-control-sm" placeholder="Enter equipment name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Equipment Price -->
                        <div class="col-md-6">
                            <label for="equipment_price" class="form-label fw-bold">Equipment Price</label>
                            <input type="text" name="equipment_price" id="equipment_price"
                                class="form-control form-control-sm" placeholder="Enter equipment price" required>
                        </div>

                        <!-- Date Purchased -->
                        <div class="col-md-6">
                            <label for="date_purchased" class="form-label fw-bold">Date Purchased</label>
                            <input type="date" name="date_purchased" id="date_purchased"
                                class="form-control form-control-sm" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Equipment Description -->
                        <div class="col-md-6">
                            <label for="equipment_description" class="form-label fw-bold">Equipment Description</label>
                            <input type="text" name="equipment_description" id="equipment_description"
                                class="form-control form-control-sm" placeholder="Enter equipment description">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select name="status" id="status" class="form-select form-select-sm" required>
                                <option value="" disabled selected>Select status</option>
                                <option value="Available">Available</option>
                                <option value="In Use">In Use</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                    </div>

                    {{-- <!-- Upload Image -->
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label fw-bold">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div> --}}

                    <!-- Submit Button -->
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary btn-sm">Add Equipment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
