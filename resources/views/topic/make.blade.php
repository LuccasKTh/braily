<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl my-2 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Adicionar Tópico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-4">
                    <form id="formTitle" action="{{ isset($topic) ? route('topic.update', $topic->id) : route('topic.store') }}" method="post">
                        @isset($topic)
                            @method('PUT')
                        @endisset
                        @csrf
                        @include('topic.formTitle')
                    </form> 
                    <form id="formWord" action="{{ route('topicCreated.store') }}" method="post">
                        @csrf
                        @include('topic.formWord')
                    </form>
                    <div>
                        @isset($words)
                            @include('topic.list')
                        @else
                            {{ "Nenhum título adicionado" }}
                        @endif
                    </div>
                    <div>
                        {{ $words->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function () {
            
            $('#formTitle').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3,
                    }
                },
                messages: {
                    title: {
                        required: 'Adicione um título',
                        minlength: 'Adicione pelo menos 3 caracteres'
                    }
                }
            });
            
            $.validator.addMethod('lettersOnly', function(value, element) {
                return this.optional(element) || /^[a-z ]+$/i.test(value);
            });
            
            $.validator.addMethod('noSpace', function (value, element) {
                return !(value == '' || value.indexOf(' ') !== -1);
            });
            
            $('#formWord').validate({
                onsubmit: true,
                rules: {
                    word: {
                        required: true,
                        lettersOnly: true,
                        noSpace: true
                    }
                },
                messages: {
                    word: {
                        required: 'Adicione uma palavra',
                        lettersOnly: 'Não pode conter números',
                        noSpace: 'Não pode conter espaços'
                    }
                }
            });

        });
    </script>

</x-app-layout>