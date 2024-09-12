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
        $response = $client->post('http://localhost:5000/api/send-to-arduino', [
            'json' => ['word' => $word]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return response()->json($data);
    }
}
