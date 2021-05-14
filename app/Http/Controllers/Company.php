<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Company as CompanyModel;
use Illuminate\Support\Facades\Auth;

class Company extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = CompanyModel::all()->toArray();
        return view('company/list', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if (is_null(Auth::user()->company)) {
            return view('company/form');
        }
        return redirect(route('showMyProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $input = $request->only('name', 'description');
        Auth::user()->company()->create($input);
        return view('product/form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = CompanyModel::with('products')->find($id)->toArray();
        return view('company/show', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('company/form', Auth::user()->company->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $input = $request->only('name', 'description');
        Auth::user()->company->update($input);
        return redirect(route('showMyProducts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
