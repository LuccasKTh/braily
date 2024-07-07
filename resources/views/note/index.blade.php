<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ 'Lista de Anotações' }}
                </h2>
            </div>
            <div>
                <a href="{{ route('note.create') }}">
                    <x-primary-button>
                        {{ 'Nova Anotação' }}
                    </x-primary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @forelse ($notes as $note)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $note->title }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Id: {{ $note->id }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('note.show', $note->id) }}">
                                        <x-secondary-button>
                                            {{ __('Ver Anotação') }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </li>
                        @empty
                            <h2 class="text-center text-lg">
                                Nenhuma anotação adicionada
                            </h2>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>