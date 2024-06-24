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