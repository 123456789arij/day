<?php

namespace App\Http\Controllers\Entreprise;

use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')->simplePaginate(2);
        return view('Entreprise.Employee.index', compact('employees'));
    }

    /*  public function changeRole(Request $request)
      {
          if (Auth::id() != $request->id) {
              $employee = Employee::findOrFail($request->id);
              $employee->syncRoles($request->role);
              return redirect()->route("Entreprise.Employee.index")->with('success',  $employee ->name . " role has been changed!");
          } else {
              return redirect()->back()->withErrors(['You can\'t change your role!']);
          }

      }*/
    public function membre_projet()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('Entreprise.Employee.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required', 'string', 'min:6',
            'role' => 'required',
            'date_inscription' => 'required',
            'id_department' => 'required',

        ]);
        /*        Employee::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'role' => $request['role'],

                ]) ;*/

        Employee::create($request->all());
        return redirect()->route('Entreprise.Employee.index')->with('toast_success', 'Employee is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('Entreprise.Employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('Entreprise.Employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required', 'string', 'min:6',
            'role' => 'required',
        ]);

        $employee->update($request->all());
        return redirect()->route('Entreprise.Employee.index')->with('toast_success', 'Employee is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('Entreprise.Employee.index')->with('delete', 'Employee  is successfully deleted');
    }
}
