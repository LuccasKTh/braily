<table class="table-auto w-full mt-6">
    <thead>
        <tr>
            <th class="">#</th>
            <th class="w-4/5">Palavra</th>
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
                    <form id="{{ $word->id }}" action="{{ route('topicCreated.update', $word->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="topic_id" name="topic_id" value="{{ $topic->id }}">
                        <x-text-input 
                            id="word" 
                            class="block w-full disabled:opacity-50 disabled:cursor-not-allowed" 
                            type="text" 
                            name="word"
                            :value="$word->word"
                            disabled
                        />
                    </form>
                </th>
                <th>
                    <button id="{{ $word->id }}" class="btnFormEditWord" onclick="FormEditWord(this, {{ $word->id }})">Editar</button>
                </th>
                <th>
                    <button>Excluir</button>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
