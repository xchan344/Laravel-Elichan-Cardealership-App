@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Car Info</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('cars/'.$car->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
                        </div>
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer:</label>
                            <input type="text" name="manufacturer" class="form-control" value="{{ $car->manufacturer }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
