<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Traits\ToastNotifications;
use Auth;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    use ToastNotifications;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();

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

        $topic->fill($request->all());
        $topic->user_id = Auth::user()->id;

        try {
            $topic->save();
            $this->sendToast('success', "Tópico adicionado com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível adicionar o tópico. Erro n° {$th->getCode()}");
            return to_route('topic.create');
        }
        
        return to_route('topicCreated.show', $topic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        return view('topic.show', ['topic' => $topic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $topic->fill($request->all());

        try {
            $topic->save();
            $this->sendToast('success', "Tópico atualizado com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível atualizar o tópico. Erro n° {$th->getCode()}");
        }

        return to_route('topicCreated.show', $topic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        try {
            $topic->delete();
            $this->sendToast('success', "Tópico excluído com sucesso.");
        } catch (\Throwable $th) {
            $th->getCode() == 1451
            ? $this->sendToast('success', "Tópico possui vínculos. Não foi possível excluí-lo.")
            : $this->sendToast('success', "Algo de inesperado aconteceu. Erro n° {$th->getCode()}");
        }
    }
}
