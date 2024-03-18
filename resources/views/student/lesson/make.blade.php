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
                    {{-- <form id="formTitle" action="{{ isset($lesson) ? route('lesson.update', $lesson->id) : route('lesson.store') }}" method="post">
                        @isset($lesson)
                            @method('PUT')
                        @endisset
                        @csrf
                        @include('student.lesson.formTitle')
                    </form>  --}}
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
            
            var form = $('#formWord');

            $(form).validate({
                rules: {
                    word: {
                        required: true,
                        lettersOnly: true,
                        noSpace: true,
                        maxlength: 10
                    }
                },
                messages: {
                    word: {
                        required: 'Adicione uma palavra',
                        lettersOnly: 'Não pode conter números',
                        noSpace: 'Não pode conter espaços',
                        maxlength: 'Não pode conter mais de 10 caracteres'
                    }
                }
            });

            var forms = $('.formEditWord');
            var inputs = forms.find('[id="word"]');
            for (let x = 0; x < inputs.length; x++) {
                console.log(inputs[x]);
                $(inputs[x]).attr('size', $(inputs[x]).val().length);
            }

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

                let inputValue = input.val();
                input.val('');
                input.val(inputValue);
                input[0].setSelectionRange(inputValue.length, inputValue.length);
                input.focus();

                function aumentarWidth() {
                    if ($(this).val().length == 0) {
                        $(this).attr('size', 1);
                    } else {
                        $(this).attr('size', $(this).val().length);
                    }
                };
                $(input).keyup(aumentarWidth).each(aumentarWidth);

            }
            $(form).validate({
                rules: {
                    word: {
                        required: true,
                        lettersOnly: true,
                        noSpace: true,
                        maxlength: 10
                    }
                },
                messages: {
                    word: {
                        required: 'Adicione uma palavra',
                        lettersOnly: 'Não pode conter números',
                        noSpace: 'Não pode conter espaços',
                        maxlength: 'Não pode conter mais de 10 caracteres'
                    }
                }
            });
        }
    </script>

</x-app-layout>