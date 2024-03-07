<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function education() {
        return [
            (object)['id' => 1, 'option' => 'Ensino Fundamental'],
            (object)['id' => 2, 'option' => 'Ensino Médio'],
            (object)['id' => 3, 'option' => 'Ensino Superior']
        ];
    } 

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(2);

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();

        return view('student.create', ['skills' => $skills, 'educations' => $this->education()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();

        $input = $request->all();

        $student->name = $input['name'];
        $student->age = $input['age'];
        $student->registration = $input['registration'];
        $student->education = $input['education'];
        $student->skill_id = $input['skill_id'];
        $student->about = $input['about'];
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

        switch ($student->education) {
            case 1:
                $student->education = "Ensino Fundamental";
                break;
                
            case 2:
                $student->education = "Ensino Médio";
                break;

            case 3:
                $student->education = "Ensino Superior";
                break;
        }

        switch ($student->skill_id) {
            case 1:
                $student->skill = "Iniciante";
                break;
                
            case 2:
                $student->skill = "Intermediário";
                break;

            case 3:
                $student->skill = "Avançado";
                break;
        }

        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $student = Student::find($id);

        $skills = Skill::all();

        return view('student.edit', ['student' => $student, 'skills' => $skills, 'educations' => $this->education()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $student = Student::find($id);

        $input = $request->all();

        $student->name = $input['name'];
        $student->age = $input['age'];
        $student->registration = $input['registration'];
        $student->education = $input['education'];
        $student->skill = $input['skill'];
        $student->about = $input['about'];

        $student->save();

        return to_route('student.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $student = Student::find($id);

        $student->delete();

        return to_route('student.index');
    }
}
