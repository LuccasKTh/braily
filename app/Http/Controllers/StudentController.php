<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Skill;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::where('user_id', Auth::user()->id)->paginate(10);

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

        $input = $request->all();

        $student->name = $input['name'];
        $student->age = $input['age'];
        $student->registration = $input['registration'];
        $student->education_id = $input['education_id'];
        $student->skill_id = $input['skill_id'];
        $student->about = $input['about'];
        $student->user_id = Auth()->user()->id;

        $student->save();

        return to_route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $student = Student::find($id);

        switch ($student->education_id) {
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

        $topics = Auth::user()->topics;

        return view('student.show', ['student' => $student, 'lessons' => $student->lessons, 'topics' => $topics]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $student = Student::find($id);

        $skills = Skill::all();
        $educations = Education::all();

        return view('student.edit', ['student' => $student, 'skills' => $skills, 'educations' => $educations]);
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
        $student->education_id = $input['education_id'];
        $student->skill_id = $input['skill_id'];
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
