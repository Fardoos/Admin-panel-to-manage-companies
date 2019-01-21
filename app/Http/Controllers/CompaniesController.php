<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    //
    public function index()
    {
        $companies=Company::whereIsActive(1)->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.single');
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
            'comp_name' => 'required',
            'comp_website' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'comp_email' => 'nullable|email|unique:companies,comp_email,NULL,id,is_active,1',
            'comp_logo' => 'nullable|file|image|dimensions:min_width=100,min_height=100',

        ]);
        if (!empty($request->file('comp_logo')))
        {
            $comp_logo_name= bin2hex(random_bytes(10)) .date("YmdHis").'.'.$request->file('comp_logo')->getClientOriginalExtension();

            $request->file('comp_logo')->move(storage_path('app/public'), $comp_logo_name);
            $comp_logo = $comp_logo_name;
        }
        else
            $comp_logo="";
        $data = array_merge($request->except('comp_logo'), compact('comp_logo'));
        $result=Company::create($data);
        if ($result)
        return redirect('/companies')->with('success', 'company create successfully');
        else
            return redirect('/companies')->with('error', 'company not add, try again');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company =Company::whereIsActive(1)->where("comp_id",$id)->first();
        return view('companies.single',compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company =Company::whereIsActive(1)->where("comp_id",$id)->first();
        return view('companies.single',compact('company'));
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
        $company =Company::whereIsActive(1)->where("comp_id",$id)->first();

        $this->validate($request, [
            'comp_name' => 'required',
            'comp_website' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'comp_email' => 'nullable|email|unique:companies,comp_email,NULL,id,is_active,1'.$id,
            'comp_logo' => 'nullable|file|image|dimensions:min_width=100,min_height=100',

        ]);
        if ($request->comp_logo != '') {
            if(!empty($company->comp_logo)) unlink(storage_path('app/public/').$company->comp_logo);
            $comp_logo_name= bin2hex(random_bytes(10)) .date("YmdHis").'.'.$request->file('comp_logo')->getClientOriginalExtension();
            $request->file('comp_logo')->move(storage_path('app/public'), $comp_logo_name);
            $comp_logo = $comp_logo_name;
        } else{
            $comp_logo = $company->comp_logo;
        }

        $data = array_merge($request->except('comp_logo'), compact('comp_logo'));
        $result=$company->update($data);

        if ($result)
            return redirect('/companies')->with('success', 'company update successfully');
        else
            return redirect('/companies')->with('error', 'company not update, try again');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $result=Company::destroy($id);
        if ($result)
            return redirect('/companies')->with('success', 'company deleted successfully');
        else
            return redirect('/companies')->with('error', 'company not deleted, try again');

    }
}
