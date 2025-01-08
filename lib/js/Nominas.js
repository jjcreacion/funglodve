let nominas;
let tipoNomina =['BECA DEPORTIVA', 'FUNCIONARIOS']
let tipoPeriodicidad =['SEMANAL', 'QUINCENAL', 'MENSUAL', 'ANUAL']
let modnm = $('#modnm').val();

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

                let buttons = `<div class="btn-container">`; 
                if (modnm.includes('R')) { 
                buttons += `
                <button type="button" id="btn-listar" class="btn-sm btn-magick btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdropListado"><i class="fa-solid fa-print"></i></button>
                <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
                }
                if (modnm.includes('U')) { 
                buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
                } 
                if (modnm.includes('D')) { 
                buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${nomina.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
                }
                buttons += `</div>`; 

                table.row.add([
                    nomina.descripcion,
                    tipoPeriodicidad[nomina.periodicidad-1],
                    tipoNomina[nomina.tipo-1],
                    buttons
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

    $(document).on('click', '#btn-listar', function() {
        let id = $(this).data('id');
        let listadoBeneficios;
        let nominaNombre = nominas.find(nomina => nomina.id === id);

        $.ajax({
            url: './controllers/beneficiosController.php',
            method: 'GET',
            data: { idnomina: id },
            success: function(response) {
                console.log(response);
                listadoBeneficios = JSON.parse(response);
                
                let tbody = $('#beneficios-body'); 
                tbody.empty(); 
                $('#nomina-title').text(nominaNombre.descripcion);

                listadoBeneficios.forEach(function(beneficio, index) { 
                    let fila = `<tr> <th scope="row">${index + 1}</th> 
                    <td>${beneficio.cedula}</td> 
                    <td>${beneficio.nombre}</td> 
                    <td>${beneficio.apellido}</td>
                    </tr>`;
                    tbody.append(fila); 
                });
            },
            error: function(error) {
                sAlert("error", "Error al cargar los datos de beneficios");
                console.log(error);
            }
        });

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
                let buttons = `<div class="btn-container">`; 
                if (modnm.includes('R')) { 
                buttons += `
                <button type="button" id="btn-listar" class="btn-sm btn-magick btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdropListado"><i class="fa-solid fa-print"></i></button>
                <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
                }
                if (modnm.includes('U')) { 
                buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
                } 
                if (modnm.includes('D')) { 
                buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${nomina.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
                }
                buttons += `</div>`; 

                table.row.add([
                    nomina.descripcion,
                    tipoPeriodicidad[nomina.periodicidad-1],
                    tipoNomina[nomina.tipo-1],
                    buttons
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
  
  nominas.forEach(function(nomina) {
    let buttons = `<div class="btn-container">`; 
    if (modnm.includes('R')) { 
    buttons += `
    <button type="button" id="btn-listar" class="btn-sm btn-magick btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdropListado"><i class="fa-solid fa-print"></i></button>
    <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
    }
    if (modnm.includes('U')) { 
    buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${nomina.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
    } 
    if (modnm.includes('D')) { 
    buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${nomina.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
    }
    buttons += `</div>`; 

    table.row.add([
        nomina.descripcion,
        tipoPeriodicidad[nomina.periodicidad-1],
        tipoNomina[nomina.tipo-1],
        buttons
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






