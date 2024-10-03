let subsedes;

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();

    $.ajax({
        url: '../controllers/subsedesController.php', 
        method: 'GET',
        success: function(data) {
            subsedes = JSON.parse(data);
            
            subsedes.forEach(function(subsede) {
                table.row.add([
                    subsede.nombre,
                    subsede.encargado,
                    subsede.direccion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" class="btn-sm btn-warning btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn-sm btn-danger btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });

            // Ajustar columnas al contenido
            table.columns.adjust().draw();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });

    $(document).on('click', '#btn-view', function() {
        let nombre = subsedes
        let encargado = $(this).data('encargado');
        let direccion = $(this).data('direccion');
        let telefono = $(this).data('telefono');
        let email = $(this).data('email');

        $('#nombre').val(nombre);
        $('#encargado').val(encargado);
        $('#direccion').val(direccion);
        $('#telefono').val(telefono);
        $('#email').val(email);
    });

});




