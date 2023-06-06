@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Employee Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" class="form-control" value="{{ $employee->fname }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" class="form-control" value="{{ $employee->lname }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate:</label>
                            <input type="text" class="form-control" value="{{ $employee->birthdate }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" value="{{ $employee->position }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" value="{{ $employee->contact }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Created At:</label>
                            <input type="text" class="form-control" value="{{ $employee->created_at }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Updated At:</label>
                            <input type="text" class="form-control" value="{{ $employee->updated_at }}" readonly>
                        </div>
                        <a href="{{ url('/employees') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
