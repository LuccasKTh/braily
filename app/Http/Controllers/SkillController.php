<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Laravel\SerializableClosure\Serializers\Signed;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();

        return view('skill.index', ['skills' => $skills]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $skill = new Skill();

        $input = $request->all();

        $skill->description = $input['description'];

        $skill->save();

        return to_route('skill.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $skill = Skill::find($id);

        return view('skill.show', ["skill" => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $skill = Skill::find($id);

        return view('skill.edit', ["skill" => $skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $skill = Skill::find($id);

        $input = $request->all();

        $skill->description = $input["description"];

        $skill->save();

        return to_route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $skill = Skill::find($id);

        $skill->delete();

        return to_route('skill.index');
    }
}
