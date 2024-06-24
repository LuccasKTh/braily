import { lettersOnly } from "./newMethod/lettersOnly";
import { noSpace } from "./newMethod/noSpace";

$(document).ready(function () {

    lettersOnly();
    noSpace();
    
    var form = $('#formWord');

    formValidation(form);

    var forms = $('.formEditWord');
    var inputs = forms.find('[id="word"]');
    for (let x = 0; x < inputs.length; x++) {
        $(inputs[x]).attr('size', $(inputs[x]).val().length);
    }

    window.FormEditWord = function(botao, id) {
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
        formValidation(form);
    }

});
