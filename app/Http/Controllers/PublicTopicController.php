<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\PublicTopic;
use App\Models\Teacher;
use App\Traits\ToastNotifications;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PublicTopicController extends Controller
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
    public function store(Request $request): RedirectResponse
    {
        $topic_id = $request->input('topic_id');

        $publicTopic = new PublicTopic();

        $publicTopic->topic_id = $topic_id;

        try {
            $publicTopic->save();
            $this->sendToast('success', "Tópico publicado com sucesso");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível public este tópico. Erro n° {$th->getCode()}");
        }

        return to_route('topic.show', $topic_id);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicTopic $publicTopic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicTopic $publicTopic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicTopic $publicTopic): RedirectResponse
    {
        try {
            $publicTopic->delete();
            $this->sendToast('success', "Tópic despublicado com sucesso");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível despublicar o tópico. Erro n° {$th->getCode()}.");
        }

        return to_route('topic.show', $publicTopic->topic->id);
    }

    public function publicTopicsFromTeacher(String $teacher_id): View
    {
        $teacher = Teacher::find($teacher_id);

        $publicTopicsFromTeacher = [];

        foreach ($teacher->topics as $topic) {
            if ($topic->publicTopic) {
                $publicTopicsFromTeacher[] = $topic->publicTopic;
            }
        }

        $data = [
            'teacher' => $teacher,
            'publicTopicsFromTeacher' => $publicTopicsFromTeacher
        ];

        return view('community.teacher.index', $data);
    }

    public function publicTopicFromTeacher(String $publicTopic_id): View
    {
        $publicTopic = PublicTopic::find($publicTopic_id);

        $community = Community::where('public_topic_id', $publicTopic->id)
                        ->where('teacher_id', Auth::user()->teacher->id)
                        ->get()
                        ->first();

        return view('community.teacher.show', ['publicTopic' => $publicTopic, 'community' => $community]);
    }
}
