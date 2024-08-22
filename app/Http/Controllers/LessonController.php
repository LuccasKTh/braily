<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonWord;
use App\Traits\ToastNotifications;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    use ToastNotifications;
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
        return view('student.lesson.make');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lesson = new Lesson();

        $input = $request->all();

        $student_id = $input['student_id'];

        $lesson->fill($input);

        $lesson->topic_id = null;
        
        if (isset($input['hasTopic'])) 
        {
           $topic_id = $input['status'] == 'topic_id' 
                ? $input['topic_id']
                : $input['publicTopic_id'];

            $lesson->topic_id = $topic_id;
        }

        try {
            $lesson->save();
            $this->sendToast('success', "Aula adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Erro ao adicionar a aula. Erro n° {$th->getCode()}");
            return to_route('student.show', $student_id);
        }

        return to_route('lessonCreated.show', $lesson->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return view('student.lesson.show', ['lesson' => $lesson, 'lessonWords' => $lesson->words]);
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
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->fill($request->all());

        try {
            $lesson->save();
            $this->sendToast('success', "Aula adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível atualizar a aula. Erro n° {$th->getCode()}");
        }

        return to_route('lessonCreated.show', $lesson->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $student_id = $lesson->student_id;

        try {
            $lesson->delete();
            $this->sendToast('success', "Aula excluída com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível excluir a aula. Erro n° {$th->getCode()}");
        }

        return to_route('student.show', $student_id);
    }
}
