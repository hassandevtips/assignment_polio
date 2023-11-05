<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\DataTables\DivisionDataTable;
use App\Http\Requests\DivisionRequest;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('userType:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(DivisionDataTable $dataTable)
    {
        return $dataTable->render('division.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('division.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisionRequest $request)
    {
        Division::create($request->validated());
        return redirect()->route('divisions.index')->with('success', 'Division created successfully');
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
    public function edit(Division $division)
    {
        return view('division.form', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(DivisionRequest $request, Division $division)
    {
            $division->update($request->validated());
            return redirect()->route('divisions.index')->with('success', 'Division Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        if($division->districts()->count()>0){
        return redirect()->route('divisions.index')->with('error', 'Division Have Districts Cannot Be Deleted');
        }else{
        $division->delete();
        return redirect()->route('divisions.index')->with('error', 'Division deleted successfully');
        }
    }
     /**
     * Get Data Ajax Request
     */
    public function getDivisions($provinceId)
{
    $divisions = Division::where('province_id', $provinceId)->get();
    return response()->json($divisions);
}
}
