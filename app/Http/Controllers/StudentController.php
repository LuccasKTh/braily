<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Student;
use App\Models\Topic;
use App\Traits\ToastNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class StudentController extends Controller
{
    use ToastNotifications;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Auth::user()->role->description == 'Professor'
            ? $students = Auth::user()->teacher->students()->orderByDesc('id')->paginate()
            : $students = Student::orderBy('id')->paginate();

        return view('student.index', ['students' => $students]);
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
        $student->teacher_id = Auth::user()->teacher->id;

        try {
            $student->save();
            $this->sendToast('success', "Aluno adicionado com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível adicionar o aluno. Erro n° {$th->getCode()}");
        }

        return to_route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $topics = Topic::all();

        if (Auth::user()->role->description == 'Professor') {

            if (!Auth::user()->teacher->is($student->teacher)) {
                $this->sendToast('success', "Você não pode acessar essa página");
                return to_route('student.index');
            }

            $topics = Auth::user()->teacher->topics;

            $publicTopics = Auth::user()->teacher->publicTopics;

        }

        $data = [
            'student' => $student, 
            'lessons' => $student->lessons->reverse(),
            'topics' => $topics,
            'publicTopics' => $publicTopics
        ];

        return view('student.show', $data);
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
            $this->sendToast('success', "Aluno atualizado com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível atualizar o aluno. Erro n° {$th->getCode()}");
        }

        return to_route('student.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            $this->sendToast('success', "Aluno excluído com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível excluir o aluno. Erro n° {$th->getCode()}");
        }

        return to_route('student.index');
    }

}
