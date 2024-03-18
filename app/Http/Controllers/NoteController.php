<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;

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

        $note->title = $input['title'];
        $note->annotation = $input['annotation'];
        $note->student_id = $input['student'];
        $note->user_id = Auth::user()->id;

        $note->save();

        return to_route('note.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $note = Note::find($id);

        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $note = Note::find($id);

        $students = Auth()->user()->students;

        return view('note.edit', ['note' => $note, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $note = Note::find($id);

        $input = $request->all();

        $note->title = $input['title'];
        $note->annotation = $input['annotation'];
        $note->student_id = $input['student'];

        $note->save();

        return to_route('note.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $note = Note::find($id);

        $note->delete();

        return to_route('note.index');
    }
}
