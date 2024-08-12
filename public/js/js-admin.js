// const { event } = require("jquery");

document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal-component-container').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('modal-component-container').classList.add('hidden');
});

function openModalAssign(profesor){
    event.preventDefault();
    var professorId = profesor.getAttribute('data-professor-id');
    document.getElementById(`modal-assign-container${professorId}`).classList.remove('hidden');
}

function closeModalAssign(profesor){
    event.preventDefault();
    var professorId = profesor.getAttribute('data-professor-id');
    document.getElementById(`modal-assign-container${professorId}`).classList.add('hidden');
}

function openModalEdit(id){
    event.preventDefault();
    var id = id.getAttribute('data-id');
    document.getElementById(`modal-edit-container${id}`).classList.remove('hidden');
}

function closeModalEdit(id){
    event.preventDefault();
    var id = id.getAttribute('data-id');
    document.getElementById(`modal-edit-container${id}`).classList.add('hidden');
}

function confirmarBorrado(id) {
    if (confirm("¿Estás seguro de que quieres borrar este dato?")) {
        document.getElementById('deleteForm_' + id).submit();
    }
}

document.getElementById('agregar-campo').addEventListener('click', function() {
    var div = document.createElement('div');
    div.innerHTML = '<input type="text" name="campos_dinamicos[]" required>';
    document.getElementById('campos-dinamicos').appendChild(div);
});