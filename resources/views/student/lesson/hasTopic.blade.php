<div>
    <div class="flex flex-row text-center">
    
        <div class="basis-1/3 self-center">
            <a href="{{ $words->previousPageUrl() }}">Voltar</a>
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
    
        <div class="basis-1/3 self-center">
            <a href="{{ $words->nextPageUrl() }}">Próxima</a>
        </div>
        
    </div>

    <div class="my-3">
        <div class="flex justify-center gap-1">
            @foreach (str_split($currentWord->word) as $char)
                <div>
                    <img src="{{ asset("img/abc/".strtoupper($char).".png") }}" width="100">
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="flex flex-row text-center">

        <div class="basis-2/4">
            <div class="flex flex-col">
                @foreach ($previousWords as $word)
                    <div>
                        {{ $word->word }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="basis-2/4">
            <div class="flex flex-col">
                @foreach ($nextWords as $word)
                    <div>
                        {{ $word->word }}
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
