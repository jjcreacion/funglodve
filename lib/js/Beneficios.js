$(document).ready(function() {    
    $(document).on('click', '#btn-beneficios', function() {   
        $.ajax({
            url: './controllers/nominasController.php', 
            type: 'GET',
            dataType: 'json',
            success: function(response)  {
                console.log("Datos recibidos: ", response); // Verificar datos recibidos
                
                response.sort(function(a, b) {
                    return a.descripcion.localeCompare(b.descripcion);
                });

                if (!Array.isArray(response)) {
                    response = Object.values(response); 
                }

                var $container = $('#lista-nominas');
                $container.empty(); // Limpiar el contenedor antes de añadir nuevos elementos

                $.each(response, function(index, nomina) {

                    $container.append(
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" value="' + nomina.id + '" id="nomina' + nomina.id + '">' +
                        '<label class="form-check-label" for="nomina' + nomina.id + '">' + nomina.descripcion + '</label>' +
                        '</div>'
                    );
                });
            },
            error: function() {
                alert('Error al cargar las opciones.');
            }
        });
    });
});



