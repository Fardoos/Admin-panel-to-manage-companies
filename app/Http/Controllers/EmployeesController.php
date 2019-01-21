<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    public function index()
    {
        $employees=Employee::whereIsActive(1)->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::whereIsActive(1)->get();
        return view('employees.single',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'emp_first_name' => 'required',
            'emp_last_name' => 'required',
            'emp_phone' => 'nullable|regex:/(01)[0-9]{9}/',
            'emp_email' => 'nullable|email|unique:employees,emp_email,NULL,id,is_active,1',

        ]);
        
        $data = ($request->all());
        $result=Employee::create($data);
        if ($result)
            return redirect('/employees')->with('success', 'Employee create successfully');
        else
            return redirect('/employees')->with('error', 'Employee not add, try again');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Employee =Employee::whereIsActive(1)->where("emp_id",$id)->first();
        return view('employees.single',compact('Employee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee =Employee::whereIsActive(1)->where("emp_id",$id)->first();
        $companies=Company::whereIsActive(1)->get();

        return view('employees.single',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Employee =Employee::whereIsActive(1)->where("emp_id",$id)->first();
        $this->validate($request, [
            'emp_first_name' => 'required',
            'emp_last_name' => 'required',
            'emp_phone' => 'nullable|regex:/(01)[0-9]{9}/',
            'emp_email' => 'nullable|email|unique:employees,emp_email,NULL,id,is_active,1'.$id,

        ]);

        $data = ($request->all());
        $result=$Employee->update($data);

        if ($result)
            return redirect('/employees')->with('success', 'Employee update successfully');
        else
            return redirect('/employees')->with('error', 'Employee not update, try again');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $result=Employee::destroy($id);
        if ($result)
            return redirect('/employees')->with('success', 'Employee deleted successfully');
        else
            return redirect('/employees')->with('error', 'Employee not deleted, try again');

    }
}
