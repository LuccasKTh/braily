<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $topic->title }}
                </h2>
            </div>
            <div class="flex flex-row gap-x-6">
                @if (request()->routeIs('*publicTopic*'))
                    <form action="{{ route('community.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="publicTopic_id" id="publicTopic_id" value="{{ $topic->publicTopic->id }}">
                        <x-secondary-button type="submit">{{ 'Adicionar' }} </x-secondary-button>
                    </form>
                @endif
            </div>
        </div>
        <div class="">
            <div class="grid grid-cols-2 gap-x-4 text-gray-400">
                <h4>Criado em: {{ date('d/m/Y', strtotime($topic->created_at)) }}</h4>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-md font-bold">Palavras utilizadas na aula:</h3>
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($topic->words as $topicWord)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $topicWord->word }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{-- <div>
                        {{ $topicWords->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>