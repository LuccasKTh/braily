<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
            Título: {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-4">
                    @if ($lesson->topic_id)
                        @include('student.lesson.hasTopic')
                    @else
                        <form id="formWord" action="{{ route('lessonCreated.store') }}" method="post">
                            @csrf
                            @include('student.lesson.formWord')
                        </form>
                        <div class="mt-2 mx-20">
                            @isset($words)
                                @empty($words->items())
                                    {{ 'Nenhuma palavra adicionada' }}
                                @else
                                    {{ 'Lista de palavras' }}
                                @endempty
                                @include('student.lesson.listWord')
                            @else
                                {{ 'Nenhum título adicionado' }}
                            @endif
                        </div>
                        @isset($words)
                            <div>
                                {{ $words->links() }}
                            </div>
                        @endisset
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('validation')
        @vite('resources/js/validation/lesson.js')
    @endpush

</x-app-layout>
