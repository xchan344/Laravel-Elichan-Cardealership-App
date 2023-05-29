@extends('dashboard')
@section('content')
    <div class="container">
        <h1>Add Car</h1>
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="manufacturer">Manufacturer</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary me-2">Add</button>
                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
