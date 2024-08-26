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
                    <form id="{{ $word->id }}" action="{{ route('topicCreated.update', $word->id) }}" method="post" class="FormEditWord">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="topic_id" name="topic_id" value="{{ $topic->id }}">
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
                        </div>
                    </form>
                </th>
                <th>
                    <button id="{{ $word->id }}" class="btnFormEditWord" onclick="formEditWord(this, {{ $word->id }})">Editar</button>
                </th>
                <th>
                    <form action="{{ route('topicCreated.destroy', $word->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Excluir">
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
