<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonWord;
use App\Traits\ToastNotifications;
use Illuminate\Http\Request;

class LessonWordController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $word = new LessonWord();

        $input = $request->all();

        $word->fill($input);

        try {
            $word->save();
            $this->sendToast('success', "Palavra adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível adicionar a palavra. Erro n° {$th->getCode()}");
        }

        return to_route('lessonCreated.show', $input['lesson_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lesson::find($id);

        $words = LessonWord::where('lesson_id', $id)->orderByDesc('id')->paginate(15);

        $words->each(function ($word, $key) use ($words) {
            $word->reverseKey = $words->total() - (($words->currentPage() - 1) * $words->perPage()) - $key;
        });

        return view('student.lesson.make', ['lesson' => $lesson, 'words' => $words])->with(session('toast'));
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
    public function update(Request $request, String $id)
    {
        $lessonWord = LessonWord::find($id);

        $input = $request->all();

        $lessonWord->fill($input);

        try {
            $lessonWord->save();
            $this->sendToast('success', "Palavra alterada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível altarar a palavra. Erro n° {$th->getCode()}");
        }

        return to_route('lessonCreated.show', $input['lesson_id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $lessonWord = LessonWord::find($id);

        try {
            $lessonWord->delete();
            $this->sendToast('success', "Palavra excluída com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não possível excluir a palavra. Erro n° {$th->getCode()}");
        }

        return to_route('lessonCreated.show', $lessonWord->lesson_id);
    }
}
