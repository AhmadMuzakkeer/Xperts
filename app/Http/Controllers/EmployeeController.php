<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
{
    $query = Employee::with('company');

    if ($request->filled('name')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->name . '%')
              ->orWhere('last_name', 'like', '%' . $request->name . '%');
        });
    }

    if ($request->filled('company')) {
        $query->where('company_id', $request->company);
    }

    $employees = $query->paginate(10)->withQueryString();

    $companies = Company::all();

    return view('employees.index', compact('employees','companies'));
}

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'nullable|email|unique:employees,email',
            'phone'=>'nullable|numeric',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success','Employee created successfully');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee','companies'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'phone'=>'nullable|numeric'
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success','Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success','Employee deleted successfully');
    }
}