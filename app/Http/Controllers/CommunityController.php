<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\PublicTopic;
use Auth;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicTopics = PublicTopic::all();

        $teachers = collect();

        foreach ($publicTopics as $publicTopic) {
            $teacher = $publicTopic->topic->teacher;
            if (Auth::user() != $teacher->user) {
                $teachers->push($teacher);
            }
        }

        $uniqueTeachers = $teachers->unique('id');
        $uniqueTeachers = $uniqueTeachers->values();

        return view('community.index', ['teachers' => $uniqueTeachers]);
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
        $community = new Community();

        $input = $request->all();

        $community->public_topic_id = $input['publicTopic_id'];
        $community->teacher_id = Auth::user()->teacher->id;

        $community->save();

        return to_route('publicTopic.show', $input['publicTopic_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        //
    }
}
