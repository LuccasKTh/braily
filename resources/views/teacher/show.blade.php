<x-app-layout>
    
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $teacher->user->name }}
                </h2>
            </div>
            <div class="flex flex-row gap-x-6">

                {{-- <a href="{{ route('teacher.edit', $teacher->id) }}">
                    <x-secondary-button>
                        {{ __('Editar') }}
                    </x-secondary-button>
                </a> --}}

                {{-- <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-teacher-deletion')"
                > {{ __('Excluir') }} </x-danger-button>

                <x-modal name="confirm-teacher-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Você tem certeza que deseja exclur este professor?') }}
                        </h2>
            
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Uma vez excluido, todos os dados serão permanentemente deletados.') }}
                        </p>
            
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
            
                            <x-danger-button class="ms-3">
                                {{ __('Excluir Professor') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal> --}}
                
            </div>
        </div>
        <div class="">
            <div class="grid grid-cols-2 gap-x-4 text-gray-400">
                <h4>Habilidade: {{ __($teacher->skill->description) }}</h4>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (request()->routeIs('*student*'))
                        <x-primary-button>Alunos</x-primary-button>
                        <a href="{{ route('admin.teacher.topics', $teacher->id) }}">
                            <x-secondary-button>Tópicos</x-secondary-button>
                        </a>
                        <a href="{{ route('admin.teacher.notes', $teacher->id) }}">
                            <x-secondary-button>Notas</x-secondary-button>
                        </a>
                    @endif
                    @if (request()->routeIs('*topic*'))
                        <a href="{{ route('admin.teacher.students', $teacher->id) }}">
                            <x-secondary-button>Alunos</x-secondary-button>
                        </a>
                        <x-primary-button>Tópicos</x-primary-button>
                        <a href="{{ route('admin.teacher.notes', $teacher->id) }}">
                            <x-secondary-button>Notas</x-secondary-button>
                        </a>
                    @endif
                    @if (request()->routeIs('*note*'))
                        <a href="{{ route('admin.teacher.students', $teacher->id) }}">
                            <x-secondary-button>Alunos</x-secondary-button>
                        </a>
                        <a href="{{ route('admin.teacher.topics', $teacher->id) }}">
                            <x-secondary-button>Tópicos</x-secondary-button>
                        </a>
                        <x-primary-button>Notas</x-primary-button>
                    @endif
                    <ul role="list" class="divide-y divide-gray-100">
                        @if (request()->routeIs('*student*'))
                            @forelse ($teacher->students as $student)
                                <li class="flex justify-between items-center gap-x-6 py-5">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-100">{{ $student->name }}</p>
                                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">Habilidade: {{ $student->skill->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.teacher.student', [$teacher->id, $student->id]) }}">
                                            <x-secondary-button>
                                                {{ __('Ver Aluno') }}
                                            </x-secondary-button>
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <h2 class="text-center text-lg">
                                    Nenhuma aula adicionada
                                </h2>
                            @endforelse
                        @endif
                        @if (request()->routeIs('*topic*'))
                            @forelse ($teacher->topics as $topic)
                                <li class="flex justify-between items-center gap-x-6 py-5">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-100">{{ $topic->title }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.teacher.topic', [$teacher->id, $topic->id]) }}">
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
                        @endif
                        @if (request()->routeIs('*note*'))
                            @forelse ($teacher->notes as $note)
                                <li class="flex justify-between items-center gap-x-6 py-5">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-sm font-semibold leading-6 text-gray-100">{{ $note->title }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.teacher.note', [$teacher->id, $note->id]) }}">
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
                        @endif
                    </ul>
                    {{-- <div>
                        {{ $students->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
