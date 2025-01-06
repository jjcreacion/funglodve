let subsedes;
let modss = $('#modss').val();

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();
    
    $.ajax({
        url: './controllers/subsedesController.php', 
        method: 'GET',
        success: function(data) {
            
            subsedes = JSON.parse(data);
            
            subsedes.forEach(function(subsede) {

            let buttons = `<div class="btn-container">`; 
            if (modss.includes('R')) { 
            buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${subsede.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
            }
            if (modss.includes('U')) { 
            buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${subsede.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
            } 
            if (modss.includes('D')) { 
            buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${subsede.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
            }
            buttons += `</div>`; 

                    table.row.add([
                    subsede.nombre,
                    subsede.encargado,
                    subsede.direccion,
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
        let subsede = subsedes.find(s => s.id == id);
    
        if (subsede) {
            $('#idSubsede').val(subsede.id);
            $('#nombre').val(subsede.nombre).prop('disabled', true);
            $('#encargado').val(subsede.encargado).prop('disabled', true);
            $('#direccion').val(subsede.direccion).prop('disabled', true);
            $('#telefono').val(subsede.telefono).prop('disabled', true);
            $('#email').val(subsede.email).prop('disabled', true);
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let subsede = subsedes.find(s => s.id === id);
        limpiar();
        if (subsede) {
            $('#idSubsede').val(subsede.id);
            $('#nombre').val(subsede.nombre);
            $('#encargado').val(subsede.encargado);
            $('#direccion').val(subsede.direccion);
            $('#telefono').val(subsede.telefono);
            $('#email').val(subsede.email);
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
                    url: './controllers/subsedesController.php',
                    method: 'DELETE',
                    data: {
                        idSubsede: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = subsedes.findIndex(subsede => subsede.id == id);
                        subsedes.splice(index, 1);
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
   
    if ($('#idSubsede').val()) {
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
        let id = $('#idSubsede').val();
        let nombre = $('#nombre').val();
        let encargado = $('#encargado').val();
        let direccion = $('#direccion').val();
        let telefono = $('#telefono').val();
        let email = $('#email').val();
        
        deshabilitar();
        $.ajax({
            url: './controllers/subsedesController.php',
            method: 'POST',
            data: {
                nombre: nombre,
                encargado: encargado,
                direccion: direccion,
                telefono: telefono,
                email: email,
                insert: insert,
                idSubsede: $('#idSubsede').val()
            },
            success: function(response) {
               limpiar();
               habiliar();
               $('#staticBackdrop').modal('hide');//Ocultar modal
               sAlert("success","Datos guardados con éxito");
               if(!insert){//
                // Encuentra el índice de la subsede a actualizar
                let index = subsedes.findIndex(subsede => subsede.id == id);
                //Actualizar valores en el Data table
                subsedes[index].nombre = nombre;
                subsedes[index].encargado = encargado;
                subsedes[index].direccion = direccion;
                subsedes[index].telefono = telefono;
                subsedes[index].email = email;
                subsedes[index].id = Number(id);
                actualizarDatatable();
                console.log("Actualizar subsede");
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
        url: './controllers/subsedesController.php', 
        method: 'GET',
        success: function(data) {
            
            subsedes = JSON.parse(data);
            
            subsedes.forEach(function(subsede) {

            let buttons = `<div class="btn-container">`; 
            if (modss.includes('R')) { 
            buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${subsede.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
            }
            if (modss.includes('U')) { 
            buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${subsede.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
            } 
            if (modss.includes('D')) { 
            buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${subsede.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
            }
            buttons += `</div>`; 

                    table.row.add([
                    subsede.nombre,
                    subsede.encargado,
                    subsede.direccion,
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
    console.log(subsedes);  
}

function actualizarDatatable(){
  subsedes.sort((a, b) => a.nombre.localeCompare(b.nombre));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();
  subsedes.forEach(function(subsede) {
    table.row.add([
        subsede.nombre,
        subsede.encargado,
        subsede.direccion,
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${subsede.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${subsede.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${subsede.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
            ]).draw(false);
        });
   table.columns.adjust().draw();  
   $('#spinner-container').hide();
   console.log("Despues de actualizar data table") 
   console.log(subsedes);   
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
    $('#idSubsede').val("");

    $('#textErrorNombre').hide();
    $('#textErrorEncargado').hide();
    $('#textErrorDireccion').hide();
    $('#nombre').removeClass('border-red');
    $('#encargado').removeClass('border-red');
    $('#direccion').removeClass('border-red');
}




