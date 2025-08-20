<!DOCTYPE html>
<html>
<head>
    <title>Text-to-Speech Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 50px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 500px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #0056b3;
        }

        .download-btn {
            background: #28a745;
        }

        .download-btn:hover {
            background: #1e7e34;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .feedback {
            margin: 10px 0;
            color: green;
        }

        audio {
            margin-top: 15px;
            width: 100%;
        }

        .history {
            text-align: left;
            margin-top: 20px;
        }

        .history h2 {
            margin-bottom: 10px;
        }

        .history-item {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 5px;
        }

        .history-item audio {
            width: 100%;
        }

        .history-item p {
            margin: 2px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Text-to-Speech</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form id="ttsForm" action="{{ route('tts.generate') }}" method="POST">
            @csrf
            <textarea name="text" rows="4" placeholder="Digite seu texto aqui...">{{ old('text', $text ?? '') }}</textarea><br>
            <select name="language">
                @foreach($languages as $code => $label)
                    <option value="{{ $code }}" @if(isset($selectedLanguage) && $selectedLanguage == $code) selected @endif>{{ $label }}</option>
                @endforeach
            </select>
            <button type="submit">Ouvir</button>
        </form>

        @if(isset($audioUrl))
            <div class="feedback">Áudio gerado com sucesso!</div>
            <audio controls autoplay>
                <source src="{{ $audioUrl }}" type="audio/mpeg">
                Seu navegador não suporta áudio.
            </audio>
            <br>
            <a href="{{ $audioUrl }}" download="audio.mp3">
                <button type="button" class="download-btn">Baixar Áudio</button>
            </a>
        @endif

        @if(!empty($history))
            <div class="history">
                <h2>Histórico de Textos</h2>
                @foreach($history as $item)
                    <div class="history-item">
                        <p><strong>Data:</strong> {{ $item['created_at'] }}</p>
                        <p><strong>Idioma:</strong> {{ $languages[$item['language']] }}</p>
                        <p><strong>Texto:</strong> {{ $item['text'] }}</p>
                        <audio controls>
                            <source src="{{ $item['audioUrl'] }}" type="audio/mpeg">
                        </audio>
                        <a href="{{ $item['audioUrl'] }}" download="audio.mp3">
                            <button type="button" class="download-btn">Baixar Áudio</button>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        const form = document.getElementById('ttsForm');
        form.addEventListener('submit', function() {
            const feedback = document.createElement('div');
            feedback.className = 'feedback';
            feedback.textContent = 'Gerando áudio, aguarde...';
            form.parentNode.insertBefore(feedback, form.nextSibling);
        });
    </script>
</body>
</html>
