import { lettersOnly } from "../newMethod/lettersOnly";
import { noSpace } from "../newMethod/noSpace";

export function formValidation(form) {

    lettersOnly();
    noSpace();

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
                noSpace: 'Não pode conter espaços'
            }
        }
    });
}