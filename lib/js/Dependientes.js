let dependientes;

$(document).ready(function() {
    $('.tableD').DataTable();
});

$(document).ready(function() {
    $(document).on('click', '#btn-dependientes', function() {
        let id = $(this).data('id');
        $('#idGloriaDependiente').val(id);

        let tableD = $('.tableD').DataTable();

        $.ajax({
            url: './controllers/dependientesController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(data) {
                dependientes = JSON.parse(data);
                console.log('Datos de dependientes:', dependientes); // Revisar los datos en la consola

                // Asegurarse de que dependientes es un array antes de usar forEach
                if (Array.isArray(dependientes)) {
                    tableD.clear();
                    dependientes.forEach(function(dependiente) {
                        console.log('Dependiente:', dependiente); // Verificar cada objeto dependiente
                        tableD.row.add([
                            dependiente.nombre,
                            dependiente.parentesco,
                            dependiente.telefono,
                            `<div class="btn-container">
                                <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${dependiente.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                                <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${dependiente.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                                <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${dependiente.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                            </div>`
                        ]).draw(false);
                    });
                    tableD.columns.adjust().draw();
                } else {
                    console.error('La respuesta no es un array:', dependientes);
                }
            },
            error: function(error) {
                console.error('Error al cargar los datos:', error);
            }
        });
    });

    $(document).on('click', '#btn-createDependientes', function() {
        let idGloriaDependiente = $('#idGloriaDependiente').val();
        // Lógica adicional para crear dependientes
    });
});
