<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicWord;
use App\Traits\ToastNotifications;
use Illuminate\Http\Request;

class TopicWordController extends Controller
{
    use ToastNotifications;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('topic.create')->with(session());
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
        $topicWord = new TopicWord();

        $input = $request->all();

        $topicWord->fill($input);

        try {
            $topicWord->save();
            $this->sendToast('success', "Palavra adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível adicionar a palavra. Erro n° {$th->getCode()}");
        }

        return to_route('topicCreated.show', $input['topic_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $topic = Topic::find($id);

        $words = TopicWord::where('topic_id', $id)->orderByDesc('id')->paginate(15);

        $words->each(function ($word, $key) use ($words) {
            $word->reverseKey = $words->total() - (($words->currentPage() - 1) * $words->perPage()) - $key;
        });

        return view('topic.make', ['topic' => $topic, 'words' => $words]);
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
        $topicWord = TopicWord::find($id);
        
        $input = $request->all();

        $topicWord->fill($input);

        try {
            $topicWord->save();
            $this->sendToast('success', "Palavra atualizada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível atualizar a palavra. Erro n° {$th->getCode()}");
        }

        return to_route('topicCreated.show', $input['topic_id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $topicWord = TopicWord::find($id);

        try {
            $topicWord->delete();
            $this->sendToast('success', "Palavra excluída com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível excluir a palavra. Erro n° {$th->getCode()}");
        }

        return to_route('topicCreated.show', $topicWord->topic_id);
    }
}
