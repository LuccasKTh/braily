<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = UserType::all();

        return view('userType.index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = new UserType();

        $input = $request->all();

        $type->description = $input['description'];

        $type->save();

        return to_route('userType.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $type = UserType::find($id);

        return view('userType.show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $type = UserType::find($id);

        return view('userType.edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $type = UserType::find($id);

        $input = $request->all();

        $type->description = $input['description'];

        $type->save();

        return to_route('userType.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $type = UserType::find($id);

        $type->delete();

        return to_route('userType.index');
    }
}
