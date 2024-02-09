<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use App\Models\User;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();

        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Auth()->user()->students;

        return view('note.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note = new Note();

        $input = $request->all();

        var_dump($input);

        $note->title = $input['title'];
        $note->annotation = $input['annotation'];
        $note->student_id = $input['student_id'];

        $note->save();

        return to_route('note.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
    }
}
