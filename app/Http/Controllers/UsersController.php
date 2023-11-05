<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('userType:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')->with('success', 'User created successfully');
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
    public function edit(User $user)
{
    return view('users.form', compact('user'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
            $user->update($request->validated());
            return redirect()->route('users.index')->with('success', 'User Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {

    }
}
