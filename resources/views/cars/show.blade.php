@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Car Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" class="form-control" value="{{ $car->model }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="manufacturer">Manufacturer:</label>
                            <input type="text" class="form-control" value="{{ $car->manufacturer }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Created At:</label>
                            <input type="text" class="form-control" value="{{ $car->created_at }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Updated At:</label>
                            <input type="text" class="form-control" value="{{ $car->updated_at }}" readonly>
                        </div>
                        <a href="{{ route('cars.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
