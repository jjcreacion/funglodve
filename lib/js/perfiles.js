let perfiles;
let modpf = $('#modpf').val();

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
                let buttons = `<div class="btn-container">`; 
                if (modpf.includes('R')) { 
                buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
                }
                if (modpf.includes('U')) { 
                buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
                } 
                if (modpf.includes('D')) { 
                buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${perfil.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
                }
                buttons += `</div>`; 

                table.row.add([
                    perfil.descripcion,
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
        limpiar();
        deshabilitar();
        let id = $(this).data('id');
        let perfil = perfiles.find(s => s.id == id);
        $('#btn-Guardar').hide(); 

        if (perfil) {
            $('#descripcion').val(perfil.descripcion);
            
            if(perfil.modds=='C')$('#moddsC').prop('checked', true);
            if(perfil.modcf=='C')$('#modcfC').prop('checked', true);
            if(perfil.modhd=='C')$('#modhdC').prop('checked', true);
            if(perfil.modbf=='C')$('#modbfC').prop('checked', true);        
            
            if(perfil.modgl.includes('C'))$('#modglC').prop('checked', true);
            if(perfil.modgl.includes('R'))$('#modglR').prop('checked', true);
            if(perfil.modgl.includes('U'))$('#modglU').prop('checked', true);
            if(perfil.modgl.includes('D'))$('#modglD').prop('checked', true);
           
            if(perfil.modss.includes('C'))$('#modssC').prop('checked', true);
            if(perfil.modss.includes('R'))$('#modssR').prop('checked', true);
            if(perfil.modss.includes('U'))$('#modssU').prop('checked', true);
            if(perfil.modss.includes('D'))$('#modssD').prop('checked', true);
           
            if(perfil.modds.includes('C'))$('#modssC').prop('checked', true); 
            if(perfil.modds.includes('R'))$('#modssR').prop('checked', true);
            if(perfil.modds.includes('U'))$('#modssU').prop('checked', true);
            if(perfil.modds.includes('D'))$('#modssD').prop('checked', true);
           
            if(perfil.modin.includes('C'))$('#modinC').prop('checked', true);
            if(perfil.modin.includes('R'))$('#modinR').prop('checked', true);
            if(perfil.modin.includes('U'))$('#modinU').prop('checked', true);
            if(perfil.modin.includes('D'))$('#modinD').prop('checked', true);

            if(perfil.modpr.includes('C'))$('#modprC').prop('checked', true);
            if(perfil.modpr.includes('R'))$('#modprR').prop('checked', true);
            if(perfil.modpr.includes('U'))$('#modprU').prop('checked', true);
            if(perfil.modpr.includes('D'))$('#modprD').prop('checked', true);

            if(perfil.modrp.includes('R'))$('#modrpV').prop('checked', true);

            if(perfil.modnm.includes('C'))$('#modnmC').prop('checked', true);
            if(perfil.modnm.includes('R'))$('#modnmR').prop('checked', true);
            if(perfil.modnm.includes('U'))$('#modnmU').prop('checked', true);
            if(perfil.modnm.includes('D'))$('#modnmD').prop('checked', true);

            if(perfil.modus.includes('C'))$('#modusC').prop('checked', true);
            if(perfil.modus.includes('R'))$('#modusR').prop('checked', true);
            if(perfil.modus.includes('U'))$('#modusU').prop('checked', true);
            if(perfil.modus.includes('D'))$('#modusD').prop('checked', true);
            
            if(perfil.modpf.includes('C'))$('#modpfC').prop('checked', true);
            if(perfil.modpf.includes('R'))$('#modpfR').prop('checked', true);
            if(perfil.modpf.includes('U'))$('#modpfU').prop('checked', true);
            if(perfil.modpf.includes('D'))$('#modpfD').prop('checked', true);
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let perfil = perfiles.find(s => s.id === id);
        limpiar();
        habiliar();
        $('#btn-Guardar').show(); 

        if (perfil) {
            
            $('#descripcion').val(perfil.descripcion);
            $('#idperfil').val(perfil.id);

            if(perfil.modds=='C')$('#moddsC').prop('checked', true);
            if(perfil.modcf=='C')$('#modcfC').prop('checked', true);
            if(perfil.modhd=='C')$('#modhdC').prop('checked', true);
            if(perfil.modbf=='C')$('#modbfC').prop('checked', true);        
            
            if(perfil.modgl.includes('C'))$('#modglC').prop('checked', true);
            if(perfil.modgl.includes('R'))$('#modglR').prop('checked', true);
            if(perfil.modgl.includes('U'))$('#modglU').prop('checked', true);
            if(perfil.modgl.includes('D'))$('#modglD').prop('checked', true);
           
            if(perfil.modss.includes('C'))$('#modssC').prop('checked', true);
            if(perfil.modss.includes('R'))$('#modssR').prop('checked', true);
            if(perfil.modss.includes('U'))$('#modssU').prop('checked', true);
            if(perfil.modss.includes('D'))$('#modssD').prop('checked', true);
           
            if(perfil.modds.includes('C'))$('#modssC').prop('checked', true); 
            if(perfil.modds.includes('R'))$('#modssR').prop('checked', true);
            if(perfil.modds.includes('U'))$('#modssU').prop('checked', true);
            if(perfil.modds.includes('D'))$('#modssD').prop('checked', true);
           
            if(perfil.modin.includes('C'))$('#modinC').prop('checked', true);
            if(perfil.modin.includes('R'))$('#modinR').prop('checked', true);
            if(perfil.modin.includes('U'))$('#modinU').prop('checked', true);
            if(perfil.modin.includes('D'))$('#modinD').prop('checked', true);

            if(perfil.modpr.includes('C'))$('#modprC').prop('checked', true);
            if(perfil.modpr.includes('R'))$('#modprR').prop('checked', true);
            if(perfil.modpr.includes('U'))$('#modprU').prop('checked', true);
            if(perfil.modpr.includes('D'))$('#modprD').prop('checked', true);

            if(perfil.modrp.includes('R'))$('#modrpV').prop('checked', true);

            if(perfil.modnm.includes('C'))$('#modnmC').prop('checked', true);
            if(perfil.modnm.includes('R'))$('#modnmR').prop('checked', true);
            if(perfil.modnm.includes('U'))$('#modnmU').prop('checked', true);
            if(perfil.modnm.includes('D'))$('#modnmD').prop('checked', true);

            if(perfil.modus.includes('C'))$('#modusC').prop('checked', true);
            if(perfil.modus.includes('R'))$('#modusR').prop('checked', true);
            if(perfil.modus.includes('U'))$('#modusU').prop('checked', true);
            if(perfil.modus.includes('D'))$('#modusD').prop('checked', true);
            
            if(perfil.modpf.includes('C'))$('#modpfC').prop('checked', true);
            if(perfil.modpf.includes('R'))$('#modpfR').prop('checked', true);
            if(perfil.modpf.includes('U'))$('#modpfU').prop('checked', true);
            if(perfil.modpf.includes('D'))$('#modpfD').prop('checked', true);
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
                        actualizarDatatableConsulta();
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
                limpiar();
                habiliar();
                $('#staticBackdrop').modal('hide'); // Ocultar modal
                sAlert("success", "Datos guardados con éxito");
                actualizarDatatableConsulta();
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
    $('#spinner-container').show();
    table.clear();

    $.ajax({
        url: './controllers/perfilesController.php', 
        method: 'GET',
        success: function(data) {
            perfiles = JSON.parse(data);
            
            perfiles.forEach(function(perfil) {
                
                let buttons = `<div class="btn-container">`; 
                if (modpf.includes('R')) { 
                buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
                }
                if (modpf.includes('U')) { 
                buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
                } 
                if (modpf.includes('D')) { 
                buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${perfil.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
                }
                buttons += `</div>`; 

                table.row.add([
                    perfil.descripcion,
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

}

function actualizarDatatable(){
  perfiles.sort((a, b) => a.nombre.localeCompare(b.nombre));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();

  perfiles.forEach(function(perfil) {
    let buttons = `<div class="btn-container">`; 
    if (modpf.includes('R')) { 
    buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
    }
    if (modpf.includes('U')) { 
    buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${perfil.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
    } 
    if (modpf.includes('D')) { 
    buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${perfil.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
    }
    buttons += `</div>`; 

    table.row.add([
        perfil.nombre,
        perfil.direccion,
        buttons
        ]).draw(false);
    });
    
   table.columns.adjust().draw();  
   $('#spinner-container').hide();
   console.log("Despues de actualizar data table") 
   console.log(perfiles);   
}

function deshabilitar(){
    //$('#idperfil').val();
    $('#descripcion').prop('disabled', true);
    
    $('#modssC').prop('disabled', true);
    $('#modssR').prop('disabled', true);
    $('#modssU').prop('disabled', true);
    $('#modssD').prop('disabled', true);
    $('#modglC').prop('disabled', true);
    $('#modglR').prop('disabled', true);
    $('#modglU').prop('disabled', true);
    $('#modglD').prop('disabled', true);
    $('#modglC').prop('disabled', true);
    $('#moddsC').prop('disabled', true);
    $('#modcfC').prop('disabled', true);
    $('#modhdC').prop('disabled', true);
    $('#modbfC').prop('disabled', true);
    $('#modssC').prop('disabled', true); 
    $('#modssR').prop('disabled', true);
    $('#modssU').prop('disabled', true);
    $('#modssD').prop('disabled', true);
    $('#modinC').prop('disabled', true);
    $('#modinR').prop('disabled', true);
    $('#modinU').prop('disabled', true);
    $('#modinD').prop('disabled', true);
    $('#modprC').prop('disabled', true);
    $('#modprR').prop('disabled', true);
    $('#modprU').prop('disabled', true);
    $('#modprD').prop('disabled', true);
    $('#modrpV').prop('disabled', true);
    $('#modnmC').prop('disabled', true);
    $('#modnmR').prop('disabled', true);
    $('#modnmU').prop('disabled', true);
    $('#modnmD').prop('disabled', true);
    $('#modusC').prop('disabled', true);
    $('#modusR').prop('disabled', true);
    $('#modusU').prop('disabled', true);
    $('#modusD').prop('disabled', true);
    $('#modpfC').prop('disabled', true);
    $('#modpfR').prop('disabled', true);
    $('#modpfU').prop('disabled', true);
    $('#modpfD').prop('disabled', true);
    $('#btn-guardar').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){
    
    $('#descripcion').prop('disabled', false);
    
    $('#modglC').prop('disabled', false);
    
    $('#modssC').prop('disabled', true);
    $('#modssR').prop('disabled', true);
    $('#modssU').prop('disabled', true);
    $('#modssD').prop('disabled', true);
    $('#modglR').prop('disabled', false);
    $('#modglU').prop('disabled', false);
    $('#modglD').prop('disabled', false);
    $('#modglC').prop('disabled', false);
    $('#modcfC').prop('disabled', false);
    $('#moddsC').prop('disabled', false);
    $('#modhdC').prop('disabled', false);
    $('#modbfC').prop('disabled', false);
    $('#modssC').prop('disabled', false); 
    $('#modssR').prop('disabled', false);
    $('#modssU').prop('disabled', false);
    $('#modssD').prop('disabled', false);
    $('#modinC').prop('disabled', false);
    $('#modinR').prop('disabled', false);
    $('#modinU').prop('disabled', false);
    $('#modinD').prop('disabled', false);
    $('#modprC').prop('disabled', false);
    $('#modprR').prop('disabled', false);
    $('#modprU').prop('disabled', false);
    $('#modprD').prop('disabled', false);
    $('#modrpV').prop('disabled', false);
    $('#modnmC').prop('disabled', false);
    $('#modnmR').prop('disabled', false);
    $('#modnmU').prop('disabled', false);
    $('#modnmD').prop('disabled', false);
    $('#modusC').prop('disabled', false);
    $('#modusR').prop('disabled', false);
    $('#modusU').prop('disabled', false);
    $('#modusD').prop('disabled', false);
    $('#modpfC').prop('disabled', false);
    $('#modpfR').prop('disabled', false);
    $('#modpfU').prop('disabled', false);
    $('#modpfD').prop('disabled', false);
    $('#btn-guardar').prop('disabled', false);
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
    var checkboxes = document.querySelectorAll('input[type="checkbox"]'); 
    
    checkboxes.forEach(function(checkbox) { 
        checkbox.checked = false;
    });

    $('#descripcion').val('');

    $('#textErrorDescripcion').hide();
    $('#descripcion').removeClass('border-red');
}




