<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonWord;
use Illuminate\Http\Request;

class LessonWordController extends Controller
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
        $lessonWord = new LessonWord();

        $input = $request->all();

        $lessonWord->word = $input['word'];
        $lessonWord->lesson_id = $input['lesson_id'];

        $lessonWord->save();

        return to_route('lessonCreated.show', $lessonWord->lesson_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clasroom = Lesson::find($id);

        $words = LessonWord::where('lesson_id', $id)->orderByDesc('id')->paginate(15);

        return view('student.lesson.make', ['lesson' => $clasroom, 'words' => $words]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lessonWord = LessonWord::find($id);

        $input = $request->all();

        $lessonWord->word = $input['word'];

        $lessonWord->save();

        return to_route('lessonCreated.show', $input['lesson_id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
