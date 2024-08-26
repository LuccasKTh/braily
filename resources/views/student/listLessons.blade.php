<ul role="list" class="divide-y divide-gray-100">
    @forelse ($lessons as $lesson)
        <li class="flex justify-between items-center gap-x-6 py-5">
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-100">{{ $lesson->title }}</p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">Realizada em: {{ date('d/m/Y', strtotime($lesson->created_at)) }}</p>
                </div>
            </div>
            <div>
                <a href="{{ route('lesson.show', $lesson->id) }}">
                    <x-secondary-button>
                        {{ __('Ver Aula') }}
                    </x-secondary-button>
                </a>
            </div>
        </li>
    @empty
        <h2 class="text-center text-lg">
            Nenhuma aula adicionada
        </h2>
    @endforelse
</ul>