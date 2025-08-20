<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TtsController extends Controller
{
    private $languages = [
        'pt-br' => 'Português (Brasil)',
        'en-us' => 'Inglês (EUA)',
        'es-es' => 'Espanhol',
        'fr-fr' => 'Francês'
    ];

    public function index()
    {
        // Pega histórico da sessão
        $history = Session::get('history', []);
        return view('tts', [
            'languages' => $this->languages,
            'history' => $history
        ]);
    }

    public function generate(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:500',
            'language' => 'required|string|in:pt-br,en-us,es-es,fr-fr'
        ]);

        $text = $request->input('text');
        $language = $request->input('language');

        // Chave da API VoiceRSS
        $apiKey = env('VOICERSS_API_KEY');

        // URL da API VoiceRSS
        $audioUrl = 'https://api.voicerss.org/?key=' . $apiKey . '&hl=' . $language . '&src=' . urlencode($text);

        // Salvar no histórico da sessão
        $history = Session::get('history', []);
        array_unshift($history, [
            'text' => $text,
            'audioUrl' => $audioUrl,
            'language' => $language,
            'created_at' => now()->format('d/m/Y H:i:s')
        ]);
        Session::put('history', $history);

        return view('tts', [
            'audioUrl' => $audioUrl,
            'text' => $text,
            'languages' => $this->languages,
            'selectedLanguage' => $language,
            'history' => $history
        ]);
    }
}
