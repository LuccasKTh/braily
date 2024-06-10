<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Traits\ToastNotifications;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    use ToastNotifications;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();

        return view('education.index', ['educations' => $educations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $education = new Education();

        $education->fill($request->all());

        try {
            $education->save();
            $this->sendToast('success', "Escolaridade adicionada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível adicionar a escolaridade. Erro n° {$th->getCode()}.");
        }

        return to_route('education.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        return view('education.show', ["education" => $education]);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('education.edit', ["education" => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $education->fill($request->all());

        try {
            $education->save();
            $this->sendToast('success', "Escolaridade alterada com sucesso.");
        } catch (\Throwable $th) {
            $this->sendToast('warning', "Não foi possível alterar a escolaridade. Erro n° {$th->getCode()}.");
        }

        return to_route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        try {
            $education->delete();
            $this->sendToast('success', "Escolaridade excluída com sucesso.");
        } catch (\Throwable $th) {
            $th->errorInfo[1] == 1451
                ? $this->sendToast('warning', "Escolaridade possui vínculos. Não foi possível excluí-la.")
                : $this->sendToast('danger', "Algo de inesperado aconteceu. Erro n° {$th->getCode()}");
        }

        return to_route('education.index');
    }
}
