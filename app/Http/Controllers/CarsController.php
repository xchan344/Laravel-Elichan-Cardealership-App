<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use Illuminate\View\View;

class CarsController extends Controller
{
    /**
     * Display a listing of the cars.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $cars = CarModel::all();

        return view('cars.index', compact('cars'));
    }

    
    /**
     * Show the form for creating a new car.
     */
    public function create()
    {
        return view('cars.create');
    }

    public function show($id)
{
    $car = CarModel::find($id);
    return view('cars.show', compact('car'));
}

    /**
     * Store a newly created car in the database.
     *
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required|string',
            'manufacturer' => 'required|string',
        ]);

        CarModel::create($validatedData);

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    /**
     * Show the form for editing the specified car.
     *
     */
    public function edit($id)
    {
        $car = CarModel::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified car in the database.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required',
            'manufacturer' => 'required',
        ]);

        $car = CarModel::findOrFail($id);
        $car->model = $request->get('model');
        $car->manufacturer = $request->get('manufacturer');
        $car->save();

        return redirect('/cars')->with('success', 'cars updated successfully.');
    }


    /**
     * Remove the specified car from the database.
     *
     */
    public function destroy($id)
    {
        $car = carModel::findOrFail($id);
        $car->delete();
        return redirect('/cars')->with('success', 'Cars deleted successfully.');
    }
}

