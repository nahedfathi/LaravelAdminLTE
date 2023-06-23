<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\employee;
use App\Models\company;
class EmployeeController extends Controller
{
    public function index()
    {
        $employees = employee::paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = company::all();

        return view('employees.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        $employee = employee::create($request->all());

        return redirect()->route('employees.index', $employee->id)
                        ->with('success','Employee created successfully');
    }


    public function edit(Request $request)
    {
        $id = $request->query('id');
        $employee = employee::findOrFail($id);
        $companies = company::all();
        return view('employees.edit', ['employee' => $employee,'companies'=>$companies]);
    }
    public function update(EmployeeRequest $request, $id)
    {
        $employeeData = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company_id' => $request->input('company_id')
        ];
        employee::where('id', $id)->update($employeeData);
        return redirect()->route('employees.index')->with('success', 'employee updated successfully.');
    }

    public function delete($id)
    {
    $employee = employee::findOrFail($id);
    $employee->delete();
    return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');    }
}
