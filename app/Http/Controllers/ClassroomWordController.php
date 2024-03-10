<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\ClassroomWord;
use Illuminate\Http\Request;

class ClassroomWordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classroomWord = new ClassroomWord();

        $input = $request->all();

        $classroomWord->word = $input['word'];
        $classroomWord->classroom_id = $input['classroom_id'];

        $classroomWord->save();

        return to_route('classroomCreated.show', $classroomWord->classroom_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clasroom = Classroom::find($id);

        $words = ClassroomWord::where('classroom_id', $id)->orderByDesc('id')->paginate(15);

        return view('student.classroom.make', ['classroom' => $clasroom, 'words' => $words]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $classroomWord = ClassroomWord::find($id);

        $input = $request->all();

        $classroomWord->word = $input['word'];

        $classroomWord->save();

        return to_route('classroomCreated.show', $input['classroom_id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
