@extends('dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Transactions</h2>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('transactions.index') }}">
                        <div class="row mb-2">
                            <div class="col-md-2" style="width: 200px">
                                <input type="text" class="form-control form-control-sm" placeholder="First Name" name="customer_first_name" value="{{ $filterValues['customer_first_name'] ?? '' }}">
                            </div>
                            <div class="col-md-2" style="width: 200px">
                                <input type="text" class="form-control form-control-sm" placeholder="Last Name" name="customer_last_name" value="{{ $filterValues['customer_last_name'] ?? '' }}">
                            </div>
                            <div class="col-md-2" style="width: 200px">
                                <input type="text" class="form-control form-control-sm" placeholder="Car Model" name="car_model" value="{{ $filterValues['car_model'] ?? '' }}">
                            </div>
                            <div class="col-md-2" style="width: 200px">
                                <select class="form-select form-select-sm" name="transaction_type">
                                    <option value="">Transaction Type</option>
                                    <option value="Bought" {{ isset($filterValues['transaction_type']) && $filterValues['transaction_type'] == 'Bought' ? 'selected' : '' }}>Bought</option>
                                    <option value="Pepair" {{ isset($filterValues['transaction_type']) && $filterValues['transaction_type'] == 'Pepair' ? 'selected' : '' }}>Pepair</option>
                                    <option value="Consult" {{ isset($filterValues['transaction_type']) && $filterValues['transaction_type'] == 'Consult' ? 'selected' : '' }}>Consult</option>
                                </select>
                            </div>
                            <div class="col-md-2" style="width: 200px">
                                <select class="form-select form-select-sm" name="transaction_status">
                                    <option value="">Transaction Status</option>
                                    <option value="Fully Paid" {{ isset($filterValues['transaction_status']) && $filterValues['transaction_status'] == 'Fully Paid' ? 'selected' : '' }}>Fully Paid</option>
                                    <option value="Partially Paid" {{ isset($filterValues['transaction_status']) && $filterValues['transaction_status'] == 'Partially Paid' ? 'selected' : '' }}>Partially Paid</option>
                                    <option value="NA" {{ isset($filterValues['transaction_status']) && $filterValues['transaction_status'] == 'NA' ? 'selected' : '' }}>NA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-9 offset-md-3">
                                <div class="d-flex justify-content-end align-items-center">
                                    <div class="me-2">
                                        <button type="submit" class="btn btn-primary btn-sm">Apply Filters</button>
                                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary btn-sm">Clear Filters</a>
                                    </div>
                                    <a href="{{ route('transactions.create') }}" class="btn btn-success btn-sm">Add new transaction</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Car Model</th>
                                    <th>Transaction Type</th>
                                    <th>Price</th>
                                    <th>Transaction Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactionModels as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->fname }} {{ $transaction->lname }}</td>
                                    <td>{{ $transaction->car->model }}</td>
                                    <td>{{ $transaction->t_type }}</td>
                                    <td>{{ $transaction->price }}</td>
                                    <td>{{ $transaction->t_status }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('transactions.show', ['id' => $transaction->id]) }}" title="View Transaction" class="btn btn-info btn-sm me-2">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </a>
                                            <a href="{{ route('transactions.edit', ['id' => $transaction->id]) }}" title="Edit Transaction" class="btn btn-primary btn-sm me-2">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </a>
                                            <form method="POST" action="{{ route('transactions.destroy', ['id' => $transaction->id]) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Transaction" onclick="return confirm('Are you sure you want to delete this transaction?')">
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

                    <div class="d-flex justify-content-center">
                        {{ $transactionModels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function applyFilters() {
        // Get the filter values
        var firstName = document.querySelector('input[name="customer_first_name"]').value;
        var lastName = document.querySelector('input[name="customer_last_name"]').value;
        var carModel = document.querySelector('input[name="car_model"]').value;
        var transactionType = document.querySelector('select[name="transaction_type"]').value;
        var transactionStatus = document.querySelector('select[name="transaction_status"]').value;
        
        // Make an AJAX request to the server with the filter values
        // Replace the placeholder code below with your actual AJAX request code
        console.log("Filter values:", firstName, lastName, carModel, transactionType, transactionStatus);
    }
    
    function resetFilters() {
        // Reset the filter values
        document.querySelector('input[name="customer_first_name"]').value = '';
        document.querySelector('input[name="customer_last_name"]').value = '';
        document.querySelector('input[name="car_model"]').value = '';
        document.querySelector('select[name="transaction_type"]').value = '';
        document.querySelector('select[name="transaction_status"]').value = '';
        
        // Make an AJAX request to the server to reset the filters
        // Replace the placeholder code below with your actual AJAX request code
        console.log("Filters reset");
    }
</script>
@endsection