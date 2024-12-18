@extends('layout.layout')

@section('content')
    <div class="">
        <h1 class="mt-2 text-start">Equipment List</h1>

        <a href="{{ route('equipment.create') }}" class="btn btn-sm btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Add Equipment
        </a>

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
                                <!-- Edit Button with Icon -->
                                <a href="{{ route('equipment.edit', ['equipment' => $equipment]) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>

                                <!-- Delete Button with Icon -->
                                <form action="{{ route('equipment.delete', ['equipment' => $equipment]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>

                            <td>
                                <!-- See More Button with Icon -->
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
