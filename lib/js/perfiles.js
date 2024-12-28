let perfiles;

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();
    
    $.ajax({
        url: './controllers/perfilesController.php', 
        method: 'GET',
        success: function(data) {
            perfiles = JSON.parse(data);
            perfiles.forEach(function(perfil) {
                table.row.add([
                    perfil.descripcion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${perfil.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
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
        let perfil = perfiles.find(s => s.id == id);
    
        if (perfil) {
            $('#idperfil').val(perfil.id);
            $('#nombre').val(perfil.nombre).prop('disabled', true);
            $('#direccion').val(perfil.direccion).prop('disabled', true);
            $('#telefono').val(perfil.telefono).prop('disabled', true);
            $('#email').val(perfil.email).prop('disabled', true);
            $('#contacto').val(perfil.contacto).prop('disabled', true);
            $('#web').val(perfil.web).prop('disabled', true); 
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let perfil = perfiles.find(s => s.id === id);
        limpiar();
        if (perfil) {
            $('#idperfil').val(perfil.id);
            $('#nombre').val(perfil.nombre);
            $('#direccion').val(perfil.direccion);
            $('#telefono').val(perfil.telefono);
            $('#email').val(perfil.email);
            $('#contacto').val(perfil.telefono);
            $('#web').val(perfil.email);     
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
                    url: './controllers/perfilesController.php',
                    method: 'DELETE',
                    data: {
                        idperfil: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = perfiles.findIndex(perfil => perfil.id == id);
                        perfiles.splice(index, 1);
                    },
                    error: function(error) {
                        sAlert("error","Error en cargar datos");
                    }
                });
            }
          });
    });

    // Guardar: insertar y actualizar
    // Guardar: insertar y actualizar
$(document).on('click', '#btn-Guardar', function() {
    var isValid = true;
    var insert = true;

    if ($('#idperfil').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#descripcion').val()) {
        $('#textErrorDescripcion').show();
        $('#descripcion').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idperfil').val();
        let descripcion = $('#descripcion').val();
        
        let modgl = '';
        if ($('#modglC').is(':checked')) modgl += 'C'; 
        if ($('#modglR').is(':checked')) modgl += '-R'; 
        if ($('#modglU').is(':checked')) modgl += '-U'; 
        if ($('#modglD').is(':checked')) modgl += '-D';
        
        let modds = '';        
        let modcf = '';
        let modhd = '';
        let modbf = '';

        if ($('#modglC').is(':checked')) modds += 'C';
        if ($('#modcfC').is(':checked')) modcf += 'C';
        if ($('#modhdC').is(':checked')) modhd += 'C';
        if ($('#modbfC').is(':checked')) modbf += 'C';

        let modss = '';
        if ($('#modssC').is(':checked')) modss += 'C'; 
        if ($('#modssR').is(':checked')) modss += '-R'; 
        if ($('#modssU').is(':checked')) modss += '-U'; 
        if ($('#modssD').is(':checked')) modss += '-D';
        
        let modin = '';
        if ($('#modinC').is(':checked')) modin += 'C'; 
        if ($('#modinR').is(':checked')) modin += '-R'; 
        if ($('#modinU').is(':checked')) modin += '-U'; 
        if ($('#modinD').is(':checked')) modin += '-D';
        
        let modpr = '';
        if ($('#modprC').is(':checked')) modpr += 'C'; 
        if ($('#modprR').is(':checked')) modpr += '-R'; 
        if ($('#modprU').is(':checked')) modpr += '-U'; 
        if ($('#modprD').is(':checked')) modpr += '-D';
        
        let modrp = '';
        if ($('#modrpV').is(':checked')) modrp += 'R'; 

        let modnm = '';
        if ($('#modnmC').is(':checked')) modnm += 'C'; 
        if ($('#modnmR').is(':checked')) modnm += '-R'; 
        if ($('#modnmU').is(':checked')) modnm += '-U'; 
        if ($('#modnmD').is(':checked')) modnm += '-D';
        
        let modus = '';
        if ($('#modusC').is(':checked')) modus += 'C'; 
        if ($('#modusR').is(':checked')) modus += '-R'; 
        if ($('#modusU').is(':checked')) modus += '-U'; 
        if ($('#modusD').is(':checked')) modus += '-D';
        
        let modpf = '';
        if ($('#modpfC').is(':checked')) modpf += 'C'; 
        if ($('#modpfR').is(':checked')) modpf += '-R'; 
        if ($('#modpfU').is(':checked')) modpf += '-U'; 
        if ($('#modpfD').is(':checked')) modpf += '-D';

        console.log('modgl:'+ modgl);
        console.log('modds:'+ modds);
        console.log('modcf:'+ modcf);
        console.log('modhd:'+ modhd);
        console.log('modbf:'+ modbf);
        console.log('modss:'+ modss);
        console.log('modin:'+ modin);
        console.log('modpr:'+ modpr);
        console.log('modrp:'+ modrp);
        console.log('modnm:'+ modnm);
        console.log('modus:'+ modus);
        console.log('modpf:'+ modpf);
        
        deshabilitar();
        $.ajax({
            url: './controllers/perfilesController.php',
            method: 'POST',
            data: {
                descripcion: descripcion,
                modgl: modgl,
                modds: modds,
                modcf: modcf,
                modhd: modhd,
                modbf: modbf,
                modss: modss,
                modin: modin,
                modpr: modpr,
                modrp: modrp,
                modnm: modnm,
                modus: modus,
                modpf: modpf,
                insert: insert,
                id: id
            },
            success: function(response) {
                alert(response);
                limpiar();
                habiliar();
                $('#staticBackdrop').modal('hide'); // Ocultar modal
                sAlert("success", "Datos guardados con éxito");
                if (!insert) {
                    // Encuentra el índice del perfil a actualizar
                    let index = perfiles.findIndex(perfil => perfil.id == id);
                    // Actualizar valores en el Data table
                    perfiles[index].descripcion = descripcion;
                    perfiles[index].modgl = modgl;
                    perfiles[index].modds = modds;
                    perfiles[index].modcf = modcf;
                    perfiles[index].modhd = modhd;
                    perfiles[index].modbf = modbf;
                    perfiles[index].modss = modss;
                    perfiles[index].modin = modin;
                    perfiles[index].modpr = modpr;
                    perfiles[index].modrp = modrp;
                    perfiles[index].modnm = modnm;
                    perfiles[index].modus = modus;
                    perfiles[index].modpf = modpf;
                    perfiles[index].id = Number(id);
                    actualizarDatatable();
                    console.log("Actualizar perfil");
                    console.log("ID=" + id);
                } else {
                    actualizarDatatableConsulta();
                }
            },
            error: function(error) {
                // Manejar el error
                sAlert("error", "Error en cargar datos");
                $('#staticBackdrop').modal('hide'); // Ocultar modal
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
        url: './controllers/perfilesController.php', 
        method: 'GET',
        success: function(data) {
            perfiles = JSON.parse(data);
            perfiles.forEach(function(perfil) {
                table.row.add([
                    perfil.nombre,
                    perfil.direccion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${perfil.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
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
    console.log(perfiles);  
}

function actualizarDatatable(){
  perfiles.sort((a, b) => a.nombre.localeCompare(b.nombre));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();
  perfiles.forEach(function(perfil) {
    table.row.add([
        perfil.nombre,
        perfil.direccion,
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${perfil.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
        ]).draw(false);
    });
   table.columns.adjust().draw();  
   $('#spinner-container').hide();
   console.log("Despues de actualizar data table") 
   console.log(perfiles);   
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
    $('#idperfil').val("");

    $('#textErrorNombre').hide();
    $('#textErrorDireccion').hide();
    $('#nombre').removeClass('border-red');
    $('#direccion').removeClass('border-red');
}




