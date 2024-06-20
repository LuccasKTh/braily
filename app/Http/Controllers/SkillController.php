<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Traits\ToastNotifications;
use Illuminate\Http\Request;
use Laravel\SerializableClosure\Serializers\Signed;

class SkillController extends Controller
{
    use ToastNotifications;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();

        return view('skill.index', ['skills' => $skills])->with(session('toast'));
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

        $skill->fill($request->all());

        try {
            $skill->save();
            $this->sendToast('success', "Habilidade adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi posssível adicionar a habilidade. Erro n° {$th->getCode()}");
        }

        return to_route('skill.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('skill.show', ["skill" => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skill.edit', ["skill" => $skill]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $skill->fill($request->all());

        try {
            $skill->save();
            $this->sendToast('success', "Habilidade atualizada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível atualizar a habilidade. Erro n° {$th->getCode()}");
        }

        return to_route('skill.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        try {
            $skill->delete();
            $this->sendToast('success', "Habilidade excluída com sucesso.");
        } catch (\Throwable $th) {
            $th->errorInfo[1] == 1451
                ? $this->sendToast('warning', "Habilidade possui vínculos. Não foi possível excluí-la.")
                : $this->sendToast('danger', "Algo de inesperado aconteceu. Erro n° {$th->getCode()}");
        }
        
        return to_route('skill.index');
    }
}
