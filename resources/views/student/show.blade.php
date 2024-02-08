<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __($student->name) }}
                </h2>
            </div>
            <div class="flex flex-row gap-x-6">
                <x-primary-button>
                    <a href="{{ route('student.edit', $student->id) }}">
                        {{ __('Editar') }}
                    </a>
                </x-primary-button>
                <x-danger-button>
                    <a href="{{ route('student.edit', $student->id) }}">
                        {{ __('Excluir') }}
                    </a>
                </x-primary-button>
            </div>
        </div>
    </x-slot>
</x-app-layout>