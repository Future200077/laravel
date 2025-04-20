@extends('change.layout')

@section('content')
<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">User Details</h2> 
        <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">
            <i class="bi bi-arrow-left"></i> Back 
        </a>
    </div>

    <!-- Card Layout -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <h5 class="card-title mb-1"><strong>Name:</strong></h5> 
                <p class="card-text">{{ $user->name }}</p>
            </div>

            <div class="mb-3">
                <h5 class="card-title mb-1"><strong>Email:</strong></h5> 
                <p class="card-text">{{ $user->email }}</p>
            </div>
        </div>
    </div>

</div>
@endsection
