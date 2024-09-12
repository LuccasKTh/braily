<table class="table-auto w-full mt-6">
    <thead>
        <tr>
            <th class="">#</th>
            <th class="w-4/5">Palavras</th>
            <th colspan="2" class="">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($words as $word)
            <tr>
                <th>
                    {{ $word->reverseKey }}
                </th>
                <th>
                    <form id="{{ $word->id }}" action="{{ route('lessonCreated.update', $word->id) }}" method="post" class="FormEditWord">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="lesson_id" name="lesson_id" value="{{ $lesson->id }}">
                        <div class="flex flex-row items-center gap-4">
                            <x-text-input 
                                id="word" 
                                class="block disabled:bg-opacity-0" 
                                type="text" 
                                name="word"
                                :value="$word->word"
                                disabled
                            />
                            <label id="word-error" class="error text-yellow-500 text-xs font-medium px-2 py-0.5 rounded dark:bg-gray-700/70 dark:text-yellow-500 border border-yellow-500" for="word" style="display: none"></label>
                            <button type="button" onclick="playSpeak('{{ $word->word }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                </svg>                                  
                            </button>
                            <button type="button" onclick="sendWord({{ $word->id }}, '{{ $word->word }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </button>
                            <span id="statusWord-{{ $word->id }}"></span>
                        </div>
                    </form>
                </th>
                <th>
                    <button id="{{ $word->id }}" class="btnFormEditWord" onclick="formEditWord(this, {{ $word->id }})">Editar</button>
                </th>
                <th>
                    <form action="{{ route('lessonCreated.destroy', $word->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button>Excluir</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
