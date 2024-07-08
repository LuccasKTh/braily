<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function teachers(): View 
    {
        $teachers = Teacher::all();

        return view('teacher.index', ['teachers' => $teachers]);
    }

    public function teacher(Teacher $teacher): View 
    {
        return view('teacher.show', ['teacher' => $teacher]);
    }

    public function students(): View 
    {
        $students = Student::orderBy('id')->paginate();

        return view('student.index', ['students' => $students]);
    }

    public function student(Teacher $teacher, Student $student): View 
    {
        $topics = $teacher->topics;

        $pubicTopics = $teacher->publicTopics;

        $lessons = $student->lessons;

        return view('student.show', ['student' => $student, 'topics' => $topics, 'publicTopics' => $pubicTopics, 'lessons' => $lessons]);
    }
}
