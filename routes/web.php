<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomepageController;

Route::get('/homepage', [App\Http\Controllers\HomepageController::class, 'index'])->name('homepage.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage.index');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/graph', function () {
    return view('graph');
});

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarsController::class, 'store'])->name('cars.store');
Route::put('/cars/{car}', [CarsController::class, 'update'])->name('cars.update');
Route::get('/cars/{id}/edit', [CarsController::class, 'edit'])->name('cars.edit');
Route::delete('/cars/{id}', [CarsController::class, 'destroy'])->name('cars.destroy');
Route::get('/cars/{id}', [CarsController::class, 'show'])->name('cars.show');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

Route::get('/', function () {
    // Fetch the car transaction data
    $carTransactionData = \App\Models\CarModel::select('model', \Illuminate\Support\Facades\DB::raw('count(*) as total_transactions'))
        ->join('transactions', 'cars.id', '=', 'transactions.c_id')
        ->groupBy('model')
        ->get();

    return view('welcome', compact('carTransactionData'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
