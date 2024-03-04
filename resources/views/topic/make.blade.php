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
                    <div class="mt-2 mx-20">
                        @isset($words)
                            @empty($words->items())
                                {{ 'Nenhuma palavra adicionada' }}
                            @else
                                {{ 'Lista de palavras' }}
                            @endempty
                            @include('topic.list')
                        @else
                            {{ 'Nenhum título adicionado' }}
                        @endif
                    </div>
                    @isset($words)
                        <div>
                            {{ $words->links() }}
                        </div>
                    @endisset
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
    <script>
        function FormEditWord(botao, id) {
            var form = $(`#${id}`);
            if (id == form.attr('id')) {

                $('.btnFormEditWord').not(botao).addClass('hidden');

                var input = form.find('[id="word"]');;
                input.prop('disabled', false);
                input.prop('autofocus', true);

                var inputValue = input.val();
                input.val('');
                input.val(inputValue);
                input[0].setSelectionRange(inputValue.length, inputValue.length);
                input.focus();

            }
            $(form).validate({
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
        }
    </script>

</x-app-layout>