@extends('dashboard')
@section('content')
    <div class="container">
        <h1>Create Transaction</h1>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="c_id">Car ID</label>
                <select name="c_id" id="c_id" class="form-control" required>
                    <option value="">Select a Car</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="t_type">Transaction Type</label>
                <select name="t_type" id="t_type" class="form-control" required>
                    <option value="">Select a Type</option>
                    <option value="bought">Bought</option>
                    <option value="repair">Repair</option>
                    <option value="consult">Consult</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="t_status">Transaction Status</label>
                <select name="t_status" id="t_status" class="form-control" required>
                    <option value="">Select a Status</option>
                    <option value="Fully paid">Fully paid</option>
                    <option value="Partially paid">Partially paid</option>
                    <option value="NA">NA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact" class="form-control" required>
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
