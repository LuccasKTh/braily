
const classrooms = $('#classrooms');
const notes = $('#notes');

window.addEventListener('hashchange', function () {

    var hash = window.location.hash.substring(1);
    
    $(classrooms).attr('active', hash === 'classrooms');

    location.reload();

    window.location.hash == '#classrooms' 
        ? console.log('class')
        : console.log('note');

})