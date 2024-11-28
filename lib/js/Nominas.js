let nominas;
let tipoNomina =['BECA DEPORTIVA', 'FUNCIONARIOS']
let tipoPeriodicidad =['SEMANAL', 'QUINCENAL', 'MENSUAL', 'ANUAL']

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();

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
        url: './controllers/nominasController.php', 
        method: 'GET',
        success: function(data) {
            nominas = JSON.parse(data);
            nominas.forEach(function(nomina) {
                table.row.add([
                    nomina.descripcion,
                    tipoPeriodicidad[nomina.periodicidad-1],
                    tipoNomina[nomina.tipo-1],
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${nomina.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });
            console.log(nominas);
            table.columns.adjust().draw();
            $('#spinner-container').hide();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });


    //Visualizar
    $(document).on('click', '#btn-view', function() {
        limpiar();
        let id = $(this).data('id');
        let nomina = nominas.find(s => s.id == id);
         
        if (nomina) {
            $('#idnomina').val(nomina.id);
            $('#descripcion').val(nomina.descripcion).prop('disabled', true);
            $('#institucion').val(nomina.institucion).prop('disabled', true);
            $('#tipo').val(nomina.tipo).prop('disabled', true);
            $('#periodicidad').val(nomina.periodicidad).prop('disabled', true);
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let nomina = nominas.find(s => s.id == id);
        limpiar();
        if (nomina) {
            $('#idnomina').val(nomina.id);
            $('#descripcion').val(nomina.descripcion);
            $('#institucion').val(nomina.institucion);
            $('#tipo').val(nomina.tipo);
            $('#periodicidad').val(nomina.periodicidad);
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
                    url: './controllers/nominasController.php',
                    method: 'DELETE',
                    data: {
                        idnomina: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = nominas.findIndex(nomina => nomina.id == id);
                        nominas.splice(index, 1);
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
   
    if ($('#idnomina').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#descripcion').val()) {
        $('#textErrorDescripcion').show();
        $('#descripcion').addClass('border-red');
        isValid = false;
    }
    if (!$('#institucion').val()) {
        $('#textErrorInstitucion').show();
        $('#institucion').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idnomina').val();
        let descripcion = $('#descripcion').val();
        let institucion = $('#institucion').val();
        let tipo = $('#tipo').val();
        let periodicidad = $('#periodicidad').val();
        
        deshabilitar();
        $.ajax({
            url: './controllers/nominasController.php',
            method: 'POST',
            data: {
                descripcion: descripcion,
                institucion: institucion,
                tipo: tipo,
                periodicidad: periodicidad,
                insert: insert,
                idnomina: $('#idnomina').val()
            },
            success: function(response) {
               limpiar();
               habiliar();
               $('#staticBackdrop').modal('hide');//Ocultar modal
               sAlert("success","Datos guardados con éxito");
               if(!insert){//
                // Encuentra el índice de la proyecto a actualizar
                let index = nominas.findIndex(nominas => nominas.id == id);
                nominas[index].descripcion = descripcion;
                nominas[index].institucion = institucion;
                nominas[index].periodicidad = periodicidad;
                nominas[index].tipo = tipo;
                nominas[index].id = Number(id);
                actualizarDatatableConsulta();
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
        url: './controllers/nominasController.php', 
        method: 'GET',
        success: function(data) {
            nominas = JSON.parse(data);
            nominas.forEach(function(nomina) {
                table.row.add([
                    nomina.descripcion,
                    tipoPeriodicidad[nomina.periodicidad-1],
                    tipoNomina[nomina.tipo-1],
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${nomina.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });
            console.log(nominas);
            table.columns.adjust().draw();
            $('#spinner-container').hide();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}

function actualizarDatatable(){
  nominas.sort((a, b) => a.descripcion.localeCompare(b.descripcion));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();
  nominas.forEach(function(nominas) {
    table.row.add([
        nominas.descripcion,
        tipoPeriodicidad[nomina.periodicidad-1],
        tipoNomina[nomina.tipo-1],
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${nominas.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${nominas.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${nominas.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
            ]).draw(false);
        });
   table.columns.adjust().draw();  
   $('#spinner-container').hide(); 
}

function deshabilitar(){    
    $('#descripcion').prop('disabled', true);
    $('#institucion').prop('disabled', true);
    $('#periodicidad').prop('disabled', true);
    $('#tipo').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){ 
    $('#descripcion').prop('disabled', false);
    $('#institucion').prop('disabled', false);
    $('#periodicidad').prop('disabled', false);
    $('#tipo').prop('disabled', false);
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
    $('#idnomina').val("");
    $('#descripcion').val("").prop('disabled', false);
    $('#institucion').val("").prop('disabled', false);
    $('#periodicidad').val("").prop('disabled', false);
    $('#tipo').val("").prop('disabled', false);
   
    $('#btn-Guardar').show();
    $('#idproyecto').val("");

    $('#textErrorDescripcion').hide();
    $('#textErrorInstitucion').hide();
    $('#descripcion').removeClass('border-red');
    $('#institucion').removeClass('border-red');
}




