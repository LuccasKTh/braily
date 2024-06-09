<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();

        return view('education.index', ['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $education = new Education();

        $input = $request->all();

        $education->description = $input['description'];

        $education->save();

        return to_route('education.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        return view('education.show', ["education" => $education]);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('education.edit', ["education" => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $input = $request->all();

        $education->description = $input['description'];

        $education->save();

        return to_route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return to_route('education.index');
    }
}
