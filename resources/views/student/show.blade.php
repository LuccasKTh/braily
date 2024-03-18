<x-app-layout>
    
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $student->name }}
                </h2>
            </div>
            <div class="flex flex-row gap-x-6">

                <a href="{{ route('student.edit', $student->id) }}">
                    <x-secondary-button>
                        {{ __('Editar') }}
                    </x-secondary-button>
                </a>

                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-student-deletion')"
                > {{ __('Excluir') }} </x-danger-button>

                <x-modal name="confirm-student-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form action="{{ route('student.destroy', $student->id) }}" method="post" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Você tem certeza que deseja exclur este aluno?') }}
                        </h2>
            
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Uma vez excluido, todos os dados serão permanentemente deletados.') }}
                        </p>
            
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
            
                            <x-danger-button class="ms-3">
                                {{ __('Excluir Aluno') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>

                <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'create-title-classroom')"
                > {{ __('Adicionar Aula') }} </x-primary-button>

                <x-modal name="create-title-classroom" focusable>
                    <form action="{{ route('classroom.store') }}" method="post" class="p-6">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Adicione um título a esta aula!') }}
                        </h2>
            
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Isso facilitará a sua organização.') }}
                        </p>

                        <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">

                        <x-text-input 
                            id="title" 
                            class="block mt-1 w-full" 
                            type="text" 
                            name="title"
                            required 
                            autofocus 
                        />
            
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
            
                            <x-primary-button class="ms-3">
                                {{ __('Ir para aula') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
        <div class="hidden">
            <div class="grid grid-cols-2 gap-x-4 text-gray-400">
                <h4>Idade: {{ __($student->age) }}</h4>
                <h4>Matrícula: {{ __($student->registration) }}</h4>
                <h4>Escolaridade: {{ __($student->education) }}</h4>
                <h4>Habilidade: {{ __($student->skill) }}</h4>
                <h4>Observações: {{ __($student->about) }}</h4>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    
                <div class="flex justify-around w-full h-12 border-b border-gray-100 dark:border-gray-700">
                    
                    <x-nav-link id="classrooms" href="?hash=classrooms">
                        {{ __('Aulas') }}
                    </x-nav-link>

                    <x-nav-link id="notes" href="#notes" >
                        {{ __('Tópicos') }}
                    </x-nav-link>

                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($student->classrooms as $classroom)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $classroom->title }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">Id: {{ $classroom->id }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('classroom.show', $classroom->id) }}">
                                        <x-secondary-button>
                                            {{ __('Ver Aluno') }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{-- <div>
                        {{ $classrooms->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @push('toggeClassroom&Topic')
        @vite('resources/js/toggeClassroom&Topic.js')
    @endpush

</x-app-layout>
