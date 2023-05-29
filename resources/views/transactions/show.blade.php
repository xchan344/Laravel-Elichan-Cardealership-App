@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Transaction Details</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" value="{{ $transaction->fname }} {{ $transaction->lname }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="car_model">Car Model:</label>
                            <input type="text" class="form-control" value="{{ $transaction->car->model }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="t_type">Transaction Type:</label>
                            <input type="text" class="form-control" value="{{ $transaction->t_type }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" value="{{ $transaction->price }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="t_status">Transaction Status:</label>
                            <input type="text" class="form-control" value="{{ $transaction->t_status }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" value="{{ $transaction->contact }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Created At:</label>
                            <input type="text" class="form-control" value="{{ $transaction->created_at }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="updated_at">Updated At:</label>
                            <input type="text" class="form-control" value="{{ $transaction->updated_at }}" readonly>
                        </div>
                        <a href="{{ url('/transactions') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
