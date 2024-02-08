<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->name = $request->input('name');
        $student->teacher_id = Auth()->user()->id;

        $student->save();

        return to_route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $student = Student::find($id);

        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $student = Student::find($id);

        return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $student = Student::find($id);

        $student->name = $request->input('name');

        $student->save();

        return to_route('student.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
    }
}
