@extends('dashboard')
@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" value="{{ $transaction->fname }}" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" value="{{ $transaction->lname }}" required>
            </div>
            <div class="form-group">
                <label for="c_id">Car ID</label>
                <select name="c_id" id="c_id" class="form-control" required>
                    <option value="">Select a Car</option>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" {{ $car->id == $transaction->c_id ? 'selected' : '' }}>{{ $car->model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="t_type">Transaction Type</label>
                <select name="t_type" id="t_type" class="form-control" required>
                    <option value="">Select a Type</option>
                    <option value="bought" {{ $transaction->t_type == 'bought' ? 'selected' : '' }}>Bought</option>
                    <option value="repair" {{ $transaction->t_type == 'repair' ? 'selected' : '' }}>Repair</option>
                    <option value="consult" {{ $transaction->t_type == 'consult' ? 'selected' : '' }}>Consult</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $transaction->price }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="t_status">Transaction Status</label>
                <select name="t_status" id="t_status" class="form-control" required>
                    <option value="">Select a Status</option>
                    <option value="Fully paid" {{ $transaction->t_status == 'Fully paid' ? 'selected' : '' }}>Fully paid</option>
                    <option value="Partially paid" {{ $transaction->t_status == 'Partially paid' ? 'selected' : '' }}>Partially paid</option>
                    <option value="NA" {{ $transaction->t_status == 'NA' ? 'selected' : '' }}>NA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" name="contact" id="contact" class="form-control" value="{{ $transaction->contact }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url('/transactions') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
