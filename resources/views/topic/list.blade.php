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
        @php
            $key = count($words)
        @endphp
        @forelse ($words as $word)
            <tr>
                <th>
                    {{ $key }}
                </th>
                <th class="truncate">
                    {{ $word->word }}
                </th>
                <th>
                    <button>Editar</button>
                </th>
                <th>
                    <button>Excluir</button>
                </th>
            </tr>
            @php
                $key-- 
            @endphp
        @empty
            {{ "Nenhuma palavra adicionada" }}
        @endforelse
    </tbody>
</table>