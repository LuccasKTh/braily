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
                    x-on:click.prevent="$dispatch('open-modal', 'create-title-lesson')"
                > {{ __('Adicionar Aula') }} </x-primary-button>

                <x-modal name="create-title-lesson" focusable>
                    <form action="{{ route('lesson.store') }}" method="post" class="p-6">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Adicione um título a esta aula!') }}
                        </h2>
            
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Isso facilitará a sua organização.') }}
                        </p>

                        <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">

                        <x-input-label for="title" class="py-0.5 mt-1 self-end" value="Título da aula" />
                        <x-text-input 
                            id="title" 
                            class="block mt-1 w-full" 
                            type="text" 
                            name="title"
                            required 
                            autofocus 
                        />

                        <x-input-label for="select-topic" class="peer mt-2 flex items-center gap-1">
                            <input type="checkbox" name="select-topic" id="select-topic" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                            {{ 'Selecionar um tópico?' }}
                        </x-input-label>

                        <x-input-label for="topic_id" value="Escolha um tópico" class="hidden peer-has-[:checked]:block mt-2" />

                        <x-select-input 
                            id="topic_id" 
                            class="hidden mt-1 w-full peer-has-[:checked]:block" 
                            name="topic_id"
                            autofocus
                        >
                        
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                            @endforeach 

                        </x-select-input>
            
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
        <div class="">
            <div class="grid grid-cols-2 gap-x-4 text-gray-400">
                <h4>Idade: {{ __($student->age) }}</h4>
                <h4>Matrícula: {{ __($student->enroll) }}</h4>
                <h4>Escolaridade: {{ __($student->education) }}</h4>
                <h4>Habilidade: {{ __($student->skill) }}</h4>
                <h4>Observações: {{ __($student->about) }}</h4>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($lessons as $lesson)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
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
                        @endforeach
                    </ul>
                    {{-- <div>
                        {{ $lessons->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
