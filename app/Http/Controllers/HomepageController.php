<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use App\Models\CarModel;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    /**
     * Show the homepage.
     */
    public function index()
    {
        // Calculate total earnings
        $totalEarnings = TransactionModel::sum('price');
        $totalSalesEarnings = TransactionModel::where('t_type', 'bought')->sum('price');
        $totalRepairEarnings = TransactionModel::where('t_type', 'repair')->sum('price');
        $totalConsultEarnings = TransactionModel::where('t_type', 'consult')->sum('price');

        // Fetch the car transaction data
        $carTransactionData = \App\Models\CarModel::select('model', \Illuminate\Support\Facades\DB::raw('count(*) as total_transactions'))
            ->join('transactions', 'cars.id', '=', 'transactions.c_id')
            ->groupBy('model')
            ->get();

        return view('homepage.index', compact('totalEarnings', 'totalSalesEarnings', 'totalRepairEarnings', 'totalConsultEarnings', 'carTransactionData'));

        // Fetch the car transaction data
        $carTransactionData = \App\Models\CarModel::select('model', \Illuminate\Support\Facades\DB::raw('count(*) as total_transactions'))
            ->join('transactions', 'cars.id', '=', 'transactions.c_id')
            ->groupBy('model')
            ->get();

        return view('graph', compact('carTransactionData'));
    }
}
