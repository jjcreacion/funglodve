let instituciones;
let modin = $('#modin').val();

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();
    
    $.ajax({
        url: './controllers/institucionesController.php', 
        method: 'GET',
        success: function(data) {
            instituciones = JSON.parse(data);
            instituciones.forEach(function(institucion) {

                
            let buttons = `<div class="btn-container">`; 
            if (modin.includes('R')) { 
            buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${institucion.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
            }
            if (modin.includes('U')) { 
            buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${institucion.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
            } 
            if (modin.includes('D')) { 
            buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${institucion.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
            }
            buttons += `</div>`; 

                table.row.add([
                    institucion.nombre,
                    institucion.direccion,
                    buttons
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
        let institucion = instituciones.find(s => s.id == id);
    
        if (institucion) {
            $('#idinstitucion').val(institucion.id);
            $('#nombre').val(institucion.nombre).prop('disabled', true);
            $('#direccion').val(institucion.direccion).prop('disabled', true);
            $('#telefono').val(institucion.telefono).prop('disabled', true);
            $('#email').val(institucion.email).prop('disabled', true);
            $('#contacto').val(institucion.contacto).prop('disabled', true);
            $('#web').val(institucion.web).prop('disabled', true); 
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let institucion = instituciones.find(s => s.id === id);
        limpiar();
        if (institucion) {
            $('#idinstitucion').val(institucion.id);
            $('#nombre').val(institucion.nombre);
            $('#direccion').val(institucion.direccion);
            $('#telefono').val(institucion.telefono);
            $('#email').val(institucion.email);
            $('#contacto').val(institucion.telefono);
            $('#web').val(institucion.email);     
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
                    url: './controllers/institucionesController.php',
                    method: 'DELETE',
                    data: {
                        idinstitucion: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = instituciones.findIndex(institucion => institucion.id == id);
                        instituciones.splice(index, 1);
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
   
    if ($('#idinstitucion').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#nombre').val()) {
        $('#textErrorNombre').show();
        $('#nombre').addClass('border-red');
        isValid = false;
    }
    
    if (!$('#direccion').val()) {
        $('#textErrorDireccion').show();
        $('#direccion').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idinstitucion').val();
        let nombre = $('#nombre').val();
        let direccion = $('#direccion').val();
        let telefono = $('#telefono').val();
        let email = $('#email').val();
        let contacto = $('#contacto').val();
        let web = $('#web').val();
        
        
        deshabilitar();
        $.ajax({
            url: './controllers/institucionesController.php',
            method: 'POST',
            data: {
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                email: email,
                contacto: contacto,
                web: web,
                insert: insert,
                idinstitucion: $('#idinstitucion').val()
            },
            success: function(response) {
               limpiar();
               habiliar();
               $('#staticBackdrop').modal('hide');//Ocultar modal
               sAlert("success","Datos guardados con éxito");
               if(!insert){//
                // Encuentra el índice de la institucion a actualizar
                let index = instituciones.findIndex(institucion => institucion.id == id);
                //Actualizar valores en el Data table
                instituciones[index].nombre = nombre;
                instituciones[index].direccion = direccion;
                instituciones[index].telefono = telefono;
                instituciones[index].email = email;
                instituciones[index].web = web;
                instituciones[index].contacto = contacto;
                instituciones[index].id = Number(id);
                actualizarDatatable();
                console.log("Actualizar institucion");
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
        url: './controllers/institucionesController.php', 
        method: 'GET',
        success: function(data) {
            instituciones = JSON.parse(data);
            instituciones.forEach(function(institucion) {

                
            let buttons = `<div class="btn-container">`; 
            if (modin.includes('R')) { 
            buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${institucion.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
            }
            if (modin.includes('U')) { 
            buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${institucion.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
            } 
            if (modin.includes('D')) { 
            buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${institucion.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
            }
            buttons += `</div>`; 

                table.row.add([
                    institucion.nombre,
                    institucion.direccion,
                    buttons
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
    console.log(instituciones);  
}

function actualizarDatatable(){
  instituciones.sort((a, b) => a.nombre.localeCompare(b.nombre));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();
  instituciones.forEach(function(institucion) {
    table.row.add([
        institucion.nombre,
        institucion.direccion,
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${institucion.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${institucion.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${institucion.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
        ]).draw(false);
    });
   table.columns.adjust().draw();  
   $('#spinner-container').hide();
   console.log("Despues de actualizar data table") 
   console.log(instituciones);   
}

function deshabilitar(){
    $('#nombre').prop('disabled', true);
    $('#direccion').prop('disabled', true);
    $('#telefono').prop('disabled', true);
    $('#email').prop('disabled', true);
    $('#contacto').prop('disabled', true);
    $('#web').prop('disabled', true);
    $('#btn-guardar').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){
    $('#nombre').prop('disabled', false);
    $('#direccion').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#email').prop('disabled', false);
    $('#contacto').prop('disabled', false);
    $('#web').prop('disabled', false);
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
    $('#direccion').val("").prop('disabled', false);
    $('#telefono').val("").prop('disabled', false);
    $('#email').val("").prop('disabled', false);
    $('#contacto').val("").prop('disabled', false);
    $('#web').val("").prop('disabled', false);
    $('#btn-Guardar').show();
    $('#idinstitucion').val("");

    $('#textErrorNombre').hide();
    $('#textErrorDireccion').hide();
    $('#nombre').removeClass('border-red');
    $('#direccion').removeClass('border-red');
}




