<div class="flex flex-row text-center">

    <div class="basis-1/3">
        <a href="{{ $words->previousPageUrl() }}">Voltar</a>
        <div class="flex flex-col">
            @foreach ($previousWords as $item)
                <div>
                    {{ $item->word }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="basis-1/3">
        <x-text-input 
            id="word" 
            class="text-center" 
            type="text" 
            name="word"
            :value="$currentWord->word"
            disabled
        />
        <button onclick="playSpeak('{{ $currentWord->word }}')">Play</button>
    </div>

    <div class="basis-1/3">
        <a href="{{ $words->nextPageUrl() }}">Próxima</a>
        <div class="flex flex-col">
            @foreach ($nextWords as $item)
                <div>
                    {{ $item->word }}
                </div>
            @endforeach
        </div>
    </div>
    
</div>

@vite('resources/js/playVoice.js')
