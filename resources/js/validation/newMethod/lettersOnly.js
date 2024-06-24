export function lettersOnly() {
    $.validator.addMethod('lettersOnly', function(value, element) {
        return this.optional(element) || /^[a-z ]+$/i.test(value);
    });
}