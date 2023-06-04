@extends('dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="background-color: rgb(35, 18, 75); color: white; display: flex; align-items: center;">
                    <img src="car-logo.png" style="vertical-align: middle; margin-right: 5px; width: 50px;">
                    <h2 class="text-center" style="margin-bottom: 0;">Cars</h2>
                </div>
                <div class="card-body">
                    <div class="text-end mb-3">
                        <a href="{{ route('cars.create') }}" class="btn btn-success btn-sm me-2" title="Add New Car">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add new car
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Model</th>
                                    <th>Manufacturer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $car)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->manufacturer }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('cars.show', ['id' => $car->id]) }}" title="View Car" class="btn btn-info btn-sm me-2">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a>
                                            <a href="{{ route('cars.edit', ['id' => $car->id]) }}" title="Edit Car" class="btn btn-primary btn-sm me-2">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </a>
                                            <form method="POST" action="{{ route('cars.destroy', ['id' => $car->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Car" onclick="return confirm('Are you sure you want to delete this car?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
