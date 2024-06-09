<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Student;
use App\Traits\ToastNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    use ToastNotifications;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Auth::user()->students()->orderByDesc('id')->paginate();

        return view('student.index', ['students' => $students])->with(session('toast'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();
        $educations = Education::all();

        return view('student.create', ['skills' => $skills, 'educations' => $educations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->fill($request->all());
        $student->user_id = Auth()->user()->id;

        try {
            $student->save();
            $this->sendToast('success', "Aluno adicionado com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Erro ao adicionar aluno. Erro: ".$th->getCode());
        }

        return to_route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $topics = Auth::user()->topics;

        return view('student.show', ['student' => $student, 'lessons' => $student->lessons, 'topics' => $topics]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $skills = Skill::all();
        $educations = Education::all();

        return view('student.edit', ['student' => $student, 'skills' => $skills, 'educations' => $educations]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->fill($request->all());

        try {
            $student->save();
            $this->sendToast('success', "Aluno alterado com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível alterar o aluno. Erro: ".$th->getCode());
        }

        return to_route('student.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return to_route('student.index');
    }

}
