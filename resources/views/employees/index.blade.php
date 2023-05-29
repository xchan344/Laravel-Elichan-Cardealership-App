@extends('dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Employees</h2>
                </div>
                <div class="card-body">
                    <div class="text-end mb-3">
                        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm me-2" title="Add New Employee">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add new employee
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Birthdate</th>
                                    <th>Position</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employeeModels as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->fname }} {{ $employee->lname }}</td>
                                    <td>{{ $employee->birthdate }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>{{ $employee->contact }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('employees.show', ['id' => $employee->id]) }}" title="View Employee" class="btn btn-info btn-sm me-2">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a>
                                            <a href="{{ route('employees.edit', ['id' => $employee->id]) }}" title="Edit Employee" class="btn btn-primary btn-sm me-2">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </a>
                                            <form method="POST" action="{{ route('employees.destroy', ['id' => $employee->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm('Are you sure you want to delete this employee?')">
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
