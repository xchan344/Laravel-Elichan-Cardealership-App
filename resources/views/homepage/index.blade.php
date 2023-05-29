<!DOCTYPE html>
<html>
<head>
<title>Elichan Cardealership Homepage</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/chart.js') }}"></script>
</head>
<body>
@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin-left: 50px">
                <div class="card">
                    <div class="col-md-12">
                        <table>
                        <tr>
                            <th style="padding-left: 100px;">Total Earnings:</th>
                            <th style="padding-left: 100px;">Total Sales Earnings:</th>
                            <th style="padding-left: 100px;">Total Repair Earnings:</th>
                            <th style="padding-left: 100px;">Total Consult Earnings:</th>
                        </tr>
                        <tr>
                            <td style="padding-left: 100px;">&#8369 {{ $totalEarnings }}</td>
                            <td style="padding-left: 100px;">&#8369 {{ $totalSalesEarnings }}</td>
                            <td style="padding-left: 100px;">&#8369 {{ $totalRepairEarnings }}</td>
                            <td style="padding-left: 100px;">&#8369 {{ $totalConsultEarnings }}</td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="carTransactionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var carTransactionData = {!! json_encode($carTransactionData) !!};
    </script>

    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/homepage.js') }}"></script>
    
@endsection
</body>

</html>


