window.sendWord = function (id, word) {
    $.ajax({
        url: 'http://127.0.0.1:8000/send-word',
        method: 'get',
        dataType: 'html',
        data: {
            word: word
        },
        success: function (data) {
            let response = JSON.parse(data);
            let status = response.status;
            let message = status ? "Enviado com sucesso!" : "Erro ao enviar!";

            let statusWord = $(`#statusWord-${id}`);

            let p = `<p class="text-sm text-gray-600 dark:text-gray-400">${message}</p>`;

            statusWord.html(p).fadeIn();
            setTimeout(function() {
                statusWord.fadeOut();
            }, 2000);
        }
    });
}