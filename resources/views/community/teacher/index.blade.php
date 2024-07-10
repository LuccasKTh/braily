<x-app-layout>
    
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $teacher->user->name }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul role="list" class="divide-y divide-gray-100">
                        @forelse ($publicTopicsFromTeacher as $publicTopicFromTeacher)
                            <li class="flex justify-between items-center gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-100">{{ $publicTopicFromTeacher->topic->title }}</p>
                                        <div class="flex gap-5">
                                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">Curtidas: {{ $publicTopicFromTeacher->likes->count() }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ request()->routeIs('*admin*') ? route('admin.community.teacher.publicTopic', [$teacher->id, $publicTopicFromTeacher->id]) : route('community.publicTopicFromTeacher', $publicTopicFromTeacher->id) }}">
                                        <x-secondary-button>
                                            {{ __('Ver Tópico Público') }}
                                        </x-secondary-button>
                                    </a>
                                </div>
                            </li>
                        @empty
                            <h2 class="text-center text-lg">
                                Nenhum tópico público adicionado
                            </h2>
                        @endforelse
                    </ul>
                    {{-- <div>
                        {{ $lessons->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
