@extends('layout.layout')

@section('content')
    <div class="container-fluid mt-4">
        <!-- Warning Card -->
        <div class="card border-warning shadow-sm">
            <div class="card-header bg-warning text-dark fw-bold">
                <i class="bi bi-exclamation-triangle-fill"></i> Under Development
            </div>
            <div class="card-body text-center">
                <h2 class="text-warning">This Page is Under Development</h2>
                <div class="mt-3">
                    <a href="{{ route('equipment.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Equipment List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
