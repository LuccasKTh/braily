var enroll = $('#enroll');
var educationOptions = $('#education_id option').clone();
var education = $('#education_id');
var checkbox = $('#from_ifc');

$(document).ready(function () {
    toggleFrom();
});

checkbox.change(function () {
    toggleFrom();
});

function toggleFrom() {
    if (checkbox.is(':checked')) {
        enroll.prop('disabled', false); 
        toggleEducation(true);
    } else {
        enroll.prop('disabled', true);
        toggleEducation(false);
    }
}

function toggleEducation(val) {
    if (val) {
        education.find('option[value="1"]').remove();
    } else {
        education.empty();
        education.append(educationOptions.clone());
    }
}
