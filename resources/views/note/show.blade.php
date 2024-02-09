<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ 'Lista de Anotações' }}
                </h2>
            </div>
            <div>
                <a href="{{ route('student.create') }}">
                    <x-primary-button>
                        {{ 'Nova Anotação' }}
                    </x-primary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">

    </div>

</x-app-layout>