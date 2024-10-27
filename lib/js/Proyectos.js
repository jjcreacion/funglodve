let proyectos;

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();

    $.ajax({
        url: './controllers/subsedesController.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            
            data.sort(function(a, b) {
                return a.nombre.localeCompare(b.nombre);
            });

            var $select = $('#subsede');
            $.each(data, function(index, subsede) {
                $select.append('<option value="' + subsede.id + '">' + subsede.nombre + '</option>');
            });
        },
        error: function() {
            alert('Error al cargar las opciones.');
        }
    });

    $.ajax({
        url: './controllers/institucionesController.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            data.sort(function(a, b) {
                return a.nombre.localeCompare(b.nombre);
            });

            var $select = $('#institucion');
            $.each(data, function(index, instituciones) {
                $select.append('<option value="' + instituciones.id + '">' + instituciones.nombre + '</option>');
            });
        },
        error: function() {
            alert('Error al cargar las opciones.');
        }
    });
    
    $.ajax({
        url: './controllers/proyectosController.php', 
        method: 'GET',
        success: function(data) {
            proyectos = JSON.parse(data);
            proyectos.forEach(function(proyecto) {
                table.row.add([
                    proyecto.nombre,
                    proyecto.ubicacion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${proyecto.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });
            console.log(proyectos);
            table.columns.adjust().draw();
            $('#spinner-container').hide();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });


    //Visualizar
    $(document).on('click', '#btn-view', function() {
        let id = $(this).data('id');
        let proyecto = proyectos.find(s => s.id == id);
    
        if (proyecto) {
            $('#idproyecto').val(proyecto.id);
            $('#nombre').val(proyecto.nombre).prop('disabled', true);
            $('#ubicacion').val(proyecto.ubicacion).prop('disabled', true);
            $('#subsede').val(proyecto.subsede).prop('disabled', true);
            $('#encargado').val(proyecto.encargado).prop('disabled', true);
            $('#trabajadores').val(proyecto.trabajadores).prop('disabled', true);
            $('#institucion').val(proyecto.institucion).prop('disabled', true);
            $('#f_inicio').val(proyecto.f_inicio).prop('disabled', true);
            $('#f_fin').val(proyecto.f_fin).prop('disabled', true);
            $('#actividad').val(proyecto.actividad).prop('disabled', true);
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let proyecto = proyectos.find(s => s.id === id);
        limpiar();
        if (proyecto) {
            $('#idproyecto').val(proyecto.id);
            $('#nombre').val(proyecto.nombre);
            $('#ubicacion').val(proyecto.ubicacion);
            $('#subsede').val(proyecto.subsede);
            $('#encargado').val(proyecto.encargado);
            $('#trabajadores').val(proyecto.trabajadores);
            $('#institucion').val(proyecto.institucion);
            $('#f_inicio').val(proyecto.f_inicio);
            $('#f_fin').val(proyecto.f_fin);
            
            $('#actividad').val(proyecto.actividad);
        } 
    });

    $(document).on('click', '#btn-create', function() {
        limpiar();
    });
    
    //Eliminar
    $(document).on('click', '#btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: "Desea eliminar esta información?",
            text: "Los datos almacenados en este registro no podran ser recuperados!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
          }).then((result) => {
            if (result.isConfirmed) {
                let row = $(this).closest('tr');
                $.ajax({
                    url: './controllers/proyectosController.php',
                    method: 'DELETE',
                    data: {
                        idproyecto: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = proyectos.findIndex(proyecto => proyecto.id == id);
                        proyectos.splice(index, 1);
                    },
                    error: function(error) {
                        sAlert("error","Error en cargar datos");
                    }
                });
            }
          });
    });

    // Guardar: insertar y actualizar
    $(document).on('click', '#btn-Guardar', function() {
    var isValid = true;
    var insert = true;
   
    if ($('#idproyecto').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#nombre').val()) {
        $('#textErrorNombre').show();
        $('#nombre').addClass('border-red');
        isValid = false;
    }
    if (!$('#ubicacion').val()) {
        $('#textErrorUbicacion').show();
        $('#ubicacion').addClass('border-red');
        isValid = false;
    }
    if (!$('#actividad').val()) {
        $('#textErrorActividad').show();
        $('#actividad').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idproyecto').val();
        
        let nombre = $('#nombre').val();
        let ubicacion = $('#ubicacion').val();
        let subsede = $('#subsede').val();
        let encargado = $('#encargado').val();
        let trabajadores = $('#trabajadores').val();
        let institucion = $('#institucion').val();
        let f_inicio = $('#f_inicio').val();
        let f_fin = $('#f_fin').val();
        let actividad = $('#actividad').val();
        
        deshabilitar();
        $.ajax({
            url: './controllers/proyectosController.php',
            method: 'POST',
            data: {
                nombre: nombre,
                ubicacion: ubicacion,
                subsede: subsede,
                encargado: encargado,
                trabajadores: trabajadores,
                institucion: institucion,
                f_inicio: f_inicio,
                f_fin: f_fin,
                actividad: actividad,                            
                insert: insert,
                idproyecto: $('#idproyecto').val()
            },
            success: function(response) {
               limpiar();
               habiliar();
               $('#staticBackdrop').modal('hide');//Ocultar modal
               sAlert("success","Datos guardados con éxito");
               if(!insert){//
                // Encuentra el índice de la proyecto a actualizar
                let index = proyectos.findIndex(proyecto => proyecto.id == id);
                proyectos[index].nombre = nombre;
                proyectos[index].ubicacion = ubicacion;
                proyectos[index].subsede = subsede;
                proyectos[index].encargado = encargado;
                proyectos[index].trabajadores = trabajadores;
                proyectos[index].institucion = institucion;
                proyectos[index].f_inicio = f_inicio;
                proyectos[index].f_fin = f_fin;
                proyectos[index].actividad = actividad;
                proyectos[index].id = Number(id);
                actualizarDatatable();
                console.log("Actualizar proyecto");
                console.log("ID="+id);
               }
               else{
                actualizarDatatableConsulta();
               }
               
            },
            error: function(error) {
                // Manejar el error
                sAlert("error","Error en cargar datos");
                $('#staticBackdrop').modal('hide');//Ocultar modal
                habiliar();
            }
        });
    }    

    });
    
});

function actualizarDatatableConsulta(){
    
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();
    table.clear();

    $.ajax({
        url: './controllers/proyectosController.php', 
        method: 'GET',
        success: function(data) {
            proyectos = JSON.parse(data);
            proyectos.forEach(function(proyecto) {
                table.row.add([
                    proyecto.nombre,
                    proyecto.ubicacion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${proyecto.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });
            console.log(proyectos);
            table.columns.adjust().draw();
            $('#spinner-container').hide();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}

function actualizarDatatable(){
  proyectos.sort((a, b) => a.nombre.localeCompare(b.nombre));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();
  proyectos.forEach(function(proyecto) {
    table.row.add([
        proyecto.nombre,
        proyecto.ubicacion,
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${proyecto.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
            ]).draw(false);
        });
   table.columns.adjust().draw();  
   $('#spinner-container').hide(); 
}

function deshabilitar(){    
    $('#idproyecto').prop('disabled', true);
    $('#nombre').prop('disabled', true);
    $('#ubicacion').prop('disabled', true);
    $('#subsede').prop('disabled', true);
    $('#encargado').prop('disabled', true);
    $('#trabajadores').prop('disabled', true);
    $('#institucion').prop('disabled', true);
    $('#f_inicio').prop('disabled', true);
    $('#f_fin').prop('disabled', true);
    $('#actividad').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){ 
    $('#idproyecto').prop('disabled', false);
    $('#nombre').prop('disabled', false);
    $('#ubicacion').prop('disabled', false);
    $('#subsede').prop('disabled', false);
    $('#encargado').prop('disabled', false);
    $('#trabajadores').prop('disabled', false);
    $('#institucion').prop('disabled', false);
    $('#f_inicio').prop('disabled', false);
    $('#f_fin').prop('disabled', false);
    $('#actividad').prop('disabled', false);
    $(".spinner-grow").hide();//Acultar Spiner
}

function sAlert(icono,mensaje){
    Swal.fire({
        icon: icono,
        title: mensaje,
    });
    limpiar();
}

function limpiar(){
    $('#nombre').val("").prop('disabled', false);
    $('#ubicacion').val("").prop('disabled', false);
    $('#subsede').val("").prop('disabled', false);
    $('#encargado').val("").prop('disabled', false);
    $('#trabajadores').val("").prop('disabled', false);
    $('#institucion').val("").prop('disabled', false);
    $('#f_inicio').val("").prop('disabled', false);
    $('#f_fin').val("").prop('disabled', false);
    $('#actividad').val("").prop('disabled', false);
   
    $('#btn-Guardar').show();
    $('#idproyecto').val("");

    $('#textErrorNombre').hide();
    $('#textErrorActividad').hide();
    $('#textErrorUbicacion').hide();
    $('#nombre').removeClass('border-red');
    $('#actividad').removeClass('border-red');
    $('#ubicacion').removeClass('border-red');
}




