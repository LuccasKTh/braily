<x-app-layout>
    
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    Habilidade
                </h2>
            </div>
            <div class="flex flex-row gap-x-6">

                <a href="{{ route('skill.edit', $skill->id) }}">
                    <x-secondary-button>
                        {{ __('Editar') }}
                    </x-secondary-button>
                </a>

                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-skill-deletion')"
                > {{ __('Excluir') }} </x-danger-button>

                <x-modal name="confirm-skill-deletion" focusable>
                    <form action="{{ route('skill.destroy', $skill->id) }}" method="post" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Você tem certeza que deseja exclur esta habilidade?') }}
                        </h2>
            
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Uma vez excluida, todos os dados serão permanentemente deletados.') }}
                        </p>
            
                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancelar') }}
                            </x-secondary-button>
            
                            <x-danger-button class="ms-3">
                                {{ __('Excluir Habilidade') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
                
            </div>
        </div>
        <div class="">
            <div class="grid grid-cols-2 gap-x-4 text-gray-400">
                <h4>Descrição: <span class="font-bold">{{ __($skill->description) }}</span></h4>
            </div>
        </div>
    </x-slot>

</x-app-layout>
