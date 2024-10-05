let proyectos;

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();
    
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
            $('#encargado').val(proyecto.encargado).prop('disabled', true);
            $('#direccion').val(proyecto.direccion).prop('disabled', true);
            $('#telefono').val(proyecto.telefono).prop('disabled', true);
            $('#email').val(proyecto.email).prop('disabled', true);
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
            $('#encargado').val(proyecto.encargado);
            $('#direccion').val(proyecto.direccion);
            $('#telefono').val(proyecto.telefono);
            $('#email').val(proyecto.email);
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
    if (!$('#encargado').val()) {
        $('#textErrorEncargado').show();
        $('#encargado').addClass('border-red');
        isValid = false;
    }
    if (!$('#direccion').val()) {
        $('#textErrorDireccion').show();
        $('#direccion').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idproyecto').val();
        let nombre = $('#nombre').val();
        let encargado = $('#encargado').val();
        let direccion = $('#direccion').val();
        let telefono = $('#telefono').val();
        let email = $('#email').val();
        
        deshabilitar();
        $.ajax({
            url: './controllers/proyectosController.php',
            method: 'POST',
            data: {
                nombre: nombre,
                encargado: encargado,
                direccion: direccion,
                telefono: telefono,
                email: email,
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
                //Actualizar valores en el Data table
                proyectos[index].nombre = nombre;
                proyectos[index].encargado = encargado;
                proyectos[index].direccion = direccion;
                proyectos[index].telefono = telefono;
                proyectos[index].email = email;
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
                    proyecto.encargado,
                    proyecto.direccion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${proyecto.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });
            
            table.columns.adjust().draw();
            $('#spinner-container').hide();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });
    console.log("Despues de ingresar data table") 
    console.log(proyectos);  
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
        proyecto.encargado,
        proyecto.direccion,
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${proyecto.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${proyecto.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
            ]).draw(false);
        });
   table.columns.adjust().draw();  
   $('#spinner-container').hide();
   console.log("Despues de actualizar data table") 
   console.log(proyectos);   
}

function deshabilitar(){
    $('#nombre').prop('disabled', true);
    $('#encargado').prop('disabled', true);
    $('#direccion').prop('disabled', true);
    $('#telefono').prop('disabled', true);
    $('#email').prop('disabled', true);
    $('#btn-guardar').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){
    $('#nombre').prop('disabled', false);
    $('#encargado').prop('disabled', false);
    $('#direccion').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#email').prop('disabled', false);
    $('#btn-guardar').prop('disabled', true);
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
    $('#encargado').val("").prop('disabled', false);
    $('#direccion').val("").prop('disabled', false);
    $('#telefono').val("").prop('disabled', false);
    $('#email').val("").prop('disabled', false);
    $('#btn-Guardar').show();
    $('#idproyecto').val("");

    $('#textErrorNombre').hide();
    $('#textErrorEncargado').hide();
    $('#textErrorDireccion').hide();
    $('#nombre').removeClass('border-red');
    $('#encargado').removeClass('border-red');
    $('#direccion').removeClass('border-red');
}




