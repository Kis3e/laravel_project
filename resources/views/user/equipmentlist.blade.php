@extends('layout.userlayout')

@section('content')
    <div class="my-3">
        <h1>Equipment List</h1>
    </div>

    <div class="row">
        @foreach ($equipments as $equipment)
            <div class="col-md-3"> <!-- Reduced column width for smaller cards -->
                <div class="card mb-4" style="width: 100%; font-size: 0.875rem;"> <!-- Smaller font size and card width -->
                    <!-- Image Section -->
                    @if ($equipment->image)
                        <img src="{{ asset('storage/' . $equipment->image) }}" class="card-img-top"
                            alt="{{ $equipment->equipment_name }}" style="height: 150px; object-fit: cover;"
                            data-bs-toggle="modal" data-bs-target="#imageModal{{ $equipment->id }}">
                    @else
                        <div class="card-img-top d-flex align-items-center justify-content-center"
                            style="height: 150px; background-color: #f0f0f0;"> <!-- Reduced image height -->
                            <p class="text-center my-auto" style="font-size: 0.75rem;">No Image</p> <!-- Smaller font size for 'No Image' -->
                        </div>
                    @endif

                    <!-- Card Body Section -->
                    <div class="card-body" style="height: 200px; padding: 10px;"> <!-- Reduced padding and height -->
                        <h5 class="card-title" style="font-size: 2rem;">{{ $equipment->equipment_name }}</h5> <!-- Smaller title font size -->
                        <p class="card-text" style="font-size: 1rem;"> <!-- Smaller font size for text -->
                            <strong>Serial Number:</strong> {{ $equipment->serial_number }}<br>
                            <strong>Description:</strong> {{$equipment->equipment_description }}<br> <!-- Shortened description -->
                            <strong>Status:</strong> {{ $equipment->status }}
                        </p>
                        <a href="{{ route('user.equipment.showDetail', ['equipment' => $equipment]) }}"
                            class="btn btn-sm btn-secondary">See more</a>
                    </div>
                </div>
            </div>

            <!-- Modal for Image Enlargement -->
            <div class="modal fade" id="imageModal{{ $equipment->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $equipment->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{ $equipment->id }}">Image of {{ $equipment->equipment_name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $equipment->image) }}" class="img-fluid" alt="{{ $equipment->equipment_name }}">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
