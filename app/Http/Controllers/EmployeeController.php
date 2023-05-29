<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $employeeModels = EmployeeModel::all();
        return view('employees.index')->with('employeeModels', $employeeModels);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'birthdate' => 'required',
            'position' => 'required',
            'contact' => 'required|string',
        ]);

        $employee = new EmployeeModel([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'birthdate' => $request->get('birthdate'),
            'position' => $request->get('position'),
            'contact' => $request->get('contact'),
        ]);

        $employee->save();

        return redirect('/employees')->with('success', 'Employee added successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = EmployeeModel::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = EmployeeModel::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'birthdate' => 'required',
            'position' => 'required',
            'contact' => 'required|string',
        ]);

        $employee = EmployeeModel::findOrFail($id);
        $employee->fname = $request->get('fname');
        $employee->lname = $request->get('lname');
        $employee->birthdate = $request->get('birthdate');
        $employee->position = $request->get('position');
        $employee->contact = $request->get('contact');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = EmployeeModel::findOrFail($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }
}
