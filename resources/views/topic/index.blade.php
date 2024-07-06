<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Lista de Tópicos') }}
                </h2>
            </div>
            <div>
                <a href="{{ route('topic.create') }}">
                    <x-primary-button>
                        {{ __('Adicionar Tópico') }}
                    </x-primary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (request()->routeIs('*topic*'))
                        <x-primary-button>Meus Tópicos</x-primary-button>
                        <a href="{{ route('othersTopics') }}">
                            <x-secondary-button>Tópicos De Terceiros</x-secondary-button>
                        </a>
                    @else
                        <a href="{{ route('topic.index') }}">
                            <x-secondary-button>Meus Tópicos</x-secondary-button>
                        </a>
                        <x-primary-button>Tópicos De Terceiros</x-primary-button>
                    @endif
                    <ul role="list" class="divide-y divide-gray-100">
                        @forelse ($topics as $topic)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $topic->title }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Id: {{ $topic->id }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('topic.show', $topic->id) }}">
                                        <x-secondary-button>
                                            {{ __('Ver Tópico') }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </li>
                        @empty
                            <h2 class="text-center text-lg">
                                Nenhum tópico adicionado
                            </h2>
                        @endforelse
                    </ul>
                    {{-- <div>
                        {{ $topics->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>