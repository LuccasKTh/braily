<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use App\Models\Student;
use App\Traits\ToastNotifications;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    use ToastNotifications;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Auth::user()->role->description == 'Professor'
            ? $notes = Auth::user()->teacher->notes()->orderByDesc('id')->paginate()
            : $notes = Note::orderBy('id')->paginate();

        return view('note.index', ['notes' => $notes])->with(session('toast'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Auth::user()->role->description == 'Professor'
            ? $students = Auth::user()->teacher->students()->orderByDesc('id')->paginate()
            : $students = Student::all();

        return view('note.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note = new Note();

        $note->fill($request->all());
        $note->user_id = Auth::user()->id;

        try {
            $note->save();
            $this->sendToast('success', "Anotação adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível adicionar a anotação. Erro n° {$th->getCode()}");
        }

        return to_route('note.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $students = Auth()->user()->students;

        return view('note.edit', ['note' => $note, 'students' => $students]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note->fill($request->all());
        
        try {
            $note->save();
            $this->sendToast('success', "Anotação atualizada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível atualizar a anotação. Erro n° {$th->getCode()}");
        }

        return to_route('note.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        try {
            $note->delete();
            $this->sendToast('success', "Anotação excluída com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível excluir a anotação. Erro n° {$th->getCode()}");
        }
 
        return to_route('note.index');
    }
}
