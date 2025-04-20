@extends('change.layout')

@section('content')
<div class="container py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New User</h2> 
        <a class="btn btn-outline-secondary" href="{{ route('users.index') }}">
            <i class="bi bi-arrow-left"></i> Back 
        </a>
    </div>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
            <strong>Whoops!</strong> Please fix the following issues: 
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>
    @endif

    <!-- Form Start -->
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <!-- Name Field -->
            <div class="col-md-6">
                <label for="name" class="form-label"><strong>Name</strong></label> 
                <input type="text" name="name" class="form-control" placeholder="Enter full name" required> 
            </div>

            <!-- Email Field -->
            <div class="col-md-6">
                <label for="email" class="form-label"><strong>Email</strong></label> 
                <input type="email" name="email" class="form-control" placeholder="Enter email address" required> 
            </div>

             <!-- Password Field -->
             <div class="col-md-6">
                <label for="password" class="form-label"><strong>Password</strong></label> 
                <input type="password" name="password" class="form-control" placeholder="Enter password" required> 
            </div>

             <!-- Confirm Password Field -->
             <div class="col-md-6">
                <label for="confirm" class="form-label"><strong>Confirm Passwrod</strong></label> 
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
            </div>

            <!-- Submit Button -->
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle"></i> Submit 
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
