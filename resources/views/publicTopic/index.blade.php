<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Lista de Tópicos Públicos') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($teachers as $name => $publicTopics)
                        <div class="px-2 m-2">
                            <details class="bg-slate-900/50 ring-1 ring-white/10 shadow-lg p-6 rounded-lg" close>
                                <summary class="text-sm leading-6 text-slate-900 dark:text-white font-semibold select-none">
                                    {{ $name }}
                                </summary>
                                <ul class="list-disc">
                                    @foreach ($publicTopics as $publicTopic)
                                        <li class="marker:text-indigo-400 mt-3 ms-8 text-sm leading-6 text-slate-600 dark:text-slate-400">
                                            <a href="{{ route('publicTopic.show', $publicTopic->id) }}" class="hover:underline">{{ $publicTopic->topic->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </details>
                        </div>
                    @endforeach
                    {{-- <div>
                        {{ $students->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
