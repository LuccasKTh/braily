<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Lista de Alunos') }}
                </h2>
            </div>
            <div>
                <a href="{{ route('student.create') }}">
                    <x-primary-button>
                        {{ __('Adicionar Aluno') }}
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
                        @foreach ($students as $student)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $student->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                            @if ($student->lastLesson())
                                                Última aula realizada em: {{ date('d/m/Y', strtotime($student->lastLesson())) }}
                                            @else
                                                Nenhuma aula realizada
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('student.show', $student->id) }}">
                                        <x-secondary-button>
                                            {{ __('Ver Aluno') }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
