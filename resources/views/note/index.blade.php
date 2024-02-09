<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-3 gap-x-4 gap-y-2">
                        @foreach ($notes as $note)
                            <div class="flex justify-between items-center gap-x-6 py-2 bg-white dark:bg-gray-800">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 w-4/5">
                                        <h2 class="text-xl">{{ $note->title }}</h2>
                                        <p class="truncate text-xs leading-5 text-gray-500">Aluno: {{ $note->id }}</p>
                                        <p class="mt-2 text-sm font-semibold leading-6 text-gray-100 truncate">{{ $note->annotation }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('note.show', $note->id) }}">
                                        <x-secondary-button>
                                            {{ 'Ver Anotação' }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>