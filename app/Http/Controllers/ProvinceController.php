<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\DataTables\ProvinceDataTable;
use App\Http\Requests\ProvinceRequest;


class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware('userType:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ProvinceDataTable $dataTable)
    {
        return $dataTable->render('province.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('province.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProvinceRequest $request)
    {
        Province::create($request->validated());
        return redirect()->route('provinces.index')->with('success', 'Province created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Province $province)
{
    return view('province.form', compact('province'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(ProvinceRequest $request, Province $province)
    {
            $province->update($request->validated());
            return redirect()->route('provinces.index')->with('success', 'Province Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province)
    {
        if($province->divisions()->count()>0){
        return redirect()->route('provinces.index')->with('error', 'Province Have Divisions Cannot Be Deleted');
        }else{
        $province->delete();
        return redirect()->route('provinces.index')->with('error', 'Province deleted successfully');
        }
    }
}
