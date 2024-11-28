let beneficiosDetalle = [];
let nominaAsignada = [];
let id;

// Función para cargar las nóminas y los beneficios asignados
$(document).ready(function() {    
    $(document).on('click', '#btn-beneficios', function() {   
        id = $(this).data('id');
        
        // Obtener la lista de nóminas
        $.ajax({
            url: './controllers/nominasController.php', 
            type: 'GET',
            dataType: 'json',
            success: function(nominasResponse)  {
                console.log("Datos de nóminas recibidos: ", nominasResponse);
                
                nominasResponse.sort(function(a, b) {
                    return a.descripcion.localeCompare(b.descripcion);
                });

                if (!Array.isArray(nominasResponse)) {
                    nominasResponse = Object.values(nominasResponse); 
                }

                var $container = $('#lista-nominas');
                $container.empty(); // Limpiar el contenedor antes de añadir nuevos elementos

                $.each(nominasResponse, function(index, nomina) {
                    $container.append(
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" value="' + nomina.id + '" id="nomina' + nomina.id + '">' +
                        '<label class="form-check-label" for="nomina' + nomina.id + '">' + nomina.descripcion + '</label>' +
                        '</div>'
                    );
                });

                // Obtener los beneficios
                $.ajax({
                    url: './controllers/beneficiosController.php',
                    method: 'GET',
                    data: { id: id },
                    success: function(beneficiosResponse) {
                        beneficiosDetalle = JSON.parse(beneficiosResponse); 
                        console.log("Detalles de beneficios: ", beneficiosDetalle);

                        nominaAsignada = beneficiosDetalle.map(beneficio => beneficio.id_nomina); // Guardar las nóminas asignadas inicialmente

                        if(Object.keys(beneficiosDetalle).length > 0) {
                            $.each(beneficiosDetalle, function(index, beneficio) {
                                console.log("Beneficio: ", beneficio);
                                // Verificar y seleccionar el checkbox si id_nomina coincide con nomina.id
                                $('#lista-nominas .form-check-input').each(function() {
                                    if ($(this).val() == beneficio.id_nomina) {
                                        $(this).prop('checked', true);
                                    }
                                });
                            });
                        } else {
                            console.log("No hay detalles disponibles.");
                        }
                    },
                    error: function(error) {
                        sAlert("error", "Error al cargar los datos de beneficios");
                        console.log(error);
                    }
                });

            },
            error: function() {
                alert('Error al cargar las opciones.');
            }
        });
    });

    // Manejar clic en el botón para guardar beneficios
    $(document).on('click', '#btn-GuardarBeneficios', function() { 
        let nominasSeleccionadas = [];

        // Obtener el estado actual de los checkboxes
        $('#lista-nominas .form-check-input').each(function() {
            if ($(this).is(':checked')) {
                nominasSeleccionadas.push($(this).val());
            }
        });

        // Verificar cambios y realizar las acciones correspondientes
        nominasSeleccionadas.forEach(function(idNomina) {
            if (!nominaAsignada.includes(idNomina)) {
                // Si la nómina no estaba asignada inicialmente y ahora está seleccionada, agregar beneficio
                console.log("Agregar");
                $.ajax({
                    url: './controllers/beneficiosController.php',
                    method: 'POST',
                    data: {
                        id_nomina: idNomina,
                        id_gloria: id,
                        insert: true
                    },
                    success: function(response) {
                        console.log("Respesta ="+response)
                    },
                    error: function(error) {
                        sAlert("error", "Error al agregar el beneficio");
                        console.log(error);
                    }
                });
            }
        });

        nominaAsignada.forEach(function(idNomina) {
            if (!nominasSeleccionadas.includes(idNomina)) {
                // Si la nómina estaba asignada inicialmente y ahora no está seleccionada, eliminar beneficio
                console.log("Eliminar");
                $.ajax({
                    url: './controllers/beneficiosController.php',
                    method: 'DELETE',
                    data: {
                        id_nomina: idNomina,
                        id_gloria: id,
                    },
                    success: function(response) {
                        console.log("Beneficio eliminado: ", response);
                    },
                    error: function(error) {
                        sAlert("error", "Error al eliminar el beneficio");
                        console.log(error);
                    }
                });
            }
        });

        $('#ModalBeneficios').modal('hide'); // Ocultar modal
        sAlert("success","Datos guardados con éxito");
    
        console.log("Beneficios guardados/eliminados según la selección.");
    });
});





