@extends('dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Employee Info</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.update', ['employee' => $employee->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" name="fname" class="form-control" value="{{ $employee->fname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" class="form-control" value="{{ $employee->lname }}" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate:</label>
                            <input type="date" name="birthdate" class="form-control" value="{{ $employee->birthdate }}" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position" class="form-control" value="{{ $employee->position }}" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" name="contact" class="form-control" value="{{ $employee->contact }}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
