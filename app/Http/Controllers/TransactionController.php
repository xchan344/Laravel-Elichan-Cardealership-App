<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use Illuminate\View\View;
use App\Models\CarModel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactionModels = TransactionModel::paginate(20); //pagination
        $totalEarnings = TransactionModel::sum('price');
        $totalSalesEarnings = TransactionModel::where('t_type', 'bought')->sum('price');
        $totalConsultEarnings = TransactionModel::where('t_type', 'consult')->sum('price');
    
        return view('transactions.index', compact('transactionModels', 'totalEarnings', 'totalSalesEarnings', 'totalConsultEarnings'));
    
        $query = TransactionModel::query();

        // Apply filters
        if ($request->filled('customer_first_name')) {
            $query->where('fname', 'LIKE', '%' . $request->input('customer_first_name') . '%');
        }

        if ($request->filled('customer_last_name')) {
            $query->where('lname', 'LIKE', '%' . $request->input('customer_last_name') . '%');
        }

        if ($request->filled('car_model')) {
            $query->whereHas('car', function ($q) use ($request) {
                $q->where('model', 'LIKE', '%' . $request->input('car_model') . '%');
            });
        }

        if ($request->filled('transaction_type')) {
            $query->where('t_type', $request->input('transaction_type'));
        }

        if ($request->filled('transaction_status')) {
            $query->where('t_status', $request->input('transaction_status'));
        }

        $transactionModels = $query->paginate(20); //pagination
        $totalEarnings = $query->sum('price');
        $totalSalesEarnings = $query->where('t_type', 'Bought')->sum('price');
        $totalConsultEarnings = $query->where('t_type', 'Consult')->sum('price');
        $filterValues = $request->only('customer_first_name', 'customer_last_name', 'car_model', 'transaction_type', 'transaction_status');

        return view('transactions.index', compact('transactionModels', 'totalEarnings', 'totalSalesEarnings', 'totalConsultEarnings', 'filterValues'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = CarModel::all(); // Fetch all cars from the database
        return view('transactions.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'c_id' => 'required',
            't_type' => 'required',
            'price' => 'required',
            't_status' => 'required',
            'contact' => 'required|string',
        ]);

        $transaction = new TransactionModel([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'c_id' => $request->get('c_id'),
            't_type' => $request->get('t_type'),
            'price' => $request->get('price'),
            't_status' => $request->get('t_status'),
            'contact' => $request->get('contact'),
        ]);

        $transaction->save();

        return redirect('/transactions')->with('success', 'Transaction added successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = TransactionModel::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = TransactionModel::findOrFail($id);
        $cars = CarModel::all();
        
        return view('transactions.edit', compact('transaction', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'c_id' => 'required',
            't_type' => 'required',
            'price' => 'required',
            't_status' => 'required',
            'contact' => 'required|string',
        ]);

        $transaction = TransactionModel::findOrFail($id);
        $transaction->fname = $request->get('fname');
        $transaction->lname = $request->get('lname');
        $transaction->c_id = $request->get('c_id');
        $transaction->t_type = $request->get('t_type');
        $transaction->price = $request->get('price');
        $transaction->t_status = $request->get('t_status');
        $transaction->contact = $request->get('contact');
        $transaction->save();

        return redirect('/transactions')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = TransactionModel::findOrFail($id);
        $transaction->delete();
        return redirect('/transactions')->with('success', 'Transaction deleted successfully.');
    }
}
