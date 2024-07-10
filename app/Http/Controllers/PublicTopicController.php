<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Like;
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

    public function publicTopicsFromTeacher(Teacher $teacher): View
    {
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

    public function publicTopicFromTeacher(Teacher $teacher, PublicTopic $publicTopic): View
    {
        if (!Auth::user()->teacher) {
            return view('community.teacher.show', ['publicTopic' => $publicTopic]);
        }

        $community = Community::where('public_topic_id', $publicTopic->id)
                        ->where('teacher_id', Auth::user()->teacher->id)
                        ->get()
                        ->first();

        return view('community.teacher.show', ['publicTopic' => $publicTopic, 'community' => $community]);
    }

    public function like(PublicTopic $publicTopic): RedirectResponse
    {
        $teacher = Auth::user()->teacher;

        if ($publicTopic->likes()->where('teacher_id', $teacher->id)->exists()) {
            $this->sendToast('success', "Você já curtiu este tópico.");
            return to_route('community.publicTopicFromTeacher', $publicTopic->id);
        }

        $like = new Like();

        $like->teacher_id = $teacher->id;
        $like->public_topic_id = $publicTopic->id;

        $like->save();

        $this->sendToast('success', "Tópico curtido com sucesso.");
        return to_route('community.publicTopicFromTeacher', $publicTopic->id);
    }

    public function unlike(PublicTopic $publicTopic): RedirectResponse 
    {
        $teacher = Auth::user()->teacher;

        $like = $publicTopic->likes()->where('teacher_id', $teacher->id)->first();

        if (!$like) {
            $this->sendToast('success', "Você ainda não curtiu este tópico.");
            return to_route('community.publicTopicFromTeacher', $publicTopic->id);
        }

        $like->delete();

        $this->sendToast('success', "Tópico descurtido com sucesso.");
        return to_route('community.publicTopicFromTeacher', $publicTopic->id);    
    }
}
