<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Auth()->user()->students;

        $topics = [];
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
        return view('topic.make');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = new Topic();

        $validate = $request->validate([
            'title' => 'required|string|min:3',
        ]);

        $topic->title = $validate['title'];
        $topic->user_id = auth()->user()->id;

        $topic->save();
        
        return to_route('topicCreated.show', $topic->id);
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
        $topic = Topic::find($id);

        $input = $request->all();

        $topic->title = $input['title'];

        $topic->save();

        return to_route('topicCreated.show', $topic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
    }
}
