export function formValidation(form) {
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