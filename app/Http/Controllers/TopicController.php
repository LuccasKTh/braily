<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Topic;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Auth()->user()->students;

        foreach ($students as $student) {
            $topics = $student->topics;
        }

        return view('topic.index', ['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();

        return view('topic.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = new Topic();

        $input = $request->all();

        $topic->title = $input['title'];

        $topic->save();

        $students = Auth()->user()->students;
        
        if ($input['student'] == 0) {

            foreach ($students as $student) {
                $topic->students()->attach($student->id);
            }

        } else {
            $student = Student::find($input['student']);

            $topic->students()->attach($student->id);
        }
        
        return to_route('topic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
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
