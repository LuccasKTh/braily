<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Lista de Professores') }}
                </h2>
            </div>
            {{-- <div>
                <a href="{{ route('teacher.create') }}">
                    <x-primary-button>
                        {{ __('Adicionar Professor') }}
                    </x-primary-button>
                </a>
            </div> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @forelse ($teachers as $teacher)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $teacher->user->name }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.teacher.students', $teacher->id) }}">
                                        <x-secondary-button>
                                            {{ __('Ver Professor') }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </li>
                        @empty
                            <h2 class="text-center text-lg">
                                Nenhum professor adicionado
                            </h2>
                        @endforelse
                    </ul>
                    {{-- <div>
                        {{ $teachers->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
