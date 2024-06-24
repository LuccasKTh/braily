export function noSpace() {
    $.validator.addMethod('noSpace', function (value, element) {
        return !(value == '' || value.indexOf(' ') !== -1);
    });
}