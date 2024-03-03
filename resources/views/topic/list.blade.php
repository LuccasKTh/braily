<table class="table-fixed w-full">
    <thead>
        <tr>
            <th class="w-1/4">Id</th>
            <th class="w-1/4">Palavra</th>
            <th class="w-1/4">Editar</th>
            <th class="w-1/4">Excluir</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($words as $word)
            <tr>
                <th>
                    {{ $word->reverseKey }}
                </th>
                <th class="truncate">
                    @isset($editing)
                        <form action="{{ route('topicCreated.update', $word->id) }}">
                            <input type="text">
                        </form>
                    @else
                        {{ $word->word }}
                    @endisset
                </th>
                <th>
                    <a href="{{ route('topicCreated.edit', $word->id) }}">Editar</a>
                </th>
                <th>
                    <button>Excluir</button>
                </th>
            </tr>
        @empty
            {{ "Nenhuma palavra adicionada" }}
        @else
            <h3>Lista de palavras:</h3>
        @endforelse
    </tbody>
</table>
