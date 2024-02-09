<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $note->title }}
                </h2>
            </div>
            <div class="flex flex-row gap-x-6">
                <a href="{{ route('note.edit', $note->id) }}">
                    <x-primary-button>
                        {{ __('Editar') }}
                    </x-primary-button>
                </a>
                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-note-deletion')"
                > {{ __('Excluir') }} </x-danger-button>

                <x-modal name="confirm-note-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form action="{{ route('note.destroy', $note->id) }}" method="post" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Você tem certeza que deseja exclur essa anotação?') }}
                        </h2>
            
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Uma vez excluido, todos os dados serão permanentemente deletados.') }}
                        </p>
            
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
            
                            <x-danger-button class="ms-3">
                                {{ __('Excluir Anotação') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
        <div class="">
            <div class="grid grid-cols-2 gap-x-4 text-gray-400">
                <h4>Aluno: {{ __($note->student_id) }}</h4>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>{{ $note->annotation }}</p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>