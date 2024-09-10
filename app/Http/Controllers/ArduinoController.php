<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ArduinoController extends Controller
{
    public function sendWord(Request $request)
    {
        $word = $request->input('word');

        $client = new Client();
        $client->post('http://localhost:5000/api/send-to-arduino', [
            'json' => ['word' => $word]
        ]);

        return redirect()->back();
    }

    public function nextWord()
{
    // Lógica para lidar com a mudança de palavra no Laravel
    // Por exemplo, carregar a próxima palavra de uma lista ou banco de dados
    return to_route('dashboard');
}
}
