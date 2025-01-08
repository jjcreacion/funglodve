let usuarios;
let perfiles;
var perfilesMap = {};
let modus = $('#modus').val();

$(document).ready( function () {
$('.table').DataTable();
});

$(document).ready(function() {
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();

    $.ajax({
        url: './controllers/perfilesController.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            perfiles = data;
            
            data.sort(function(a, b) {
                return a.descripcion.localeCompare(b.descripcion);
            });

            var $select = $('#perfil');
            $.each(data, function(index, p) {
                $select.append('<option value="' + p.id + '">' + p.descripcion + '</option>');
            });

            perfiles.forEach(function(p) { 
                perfilesMap[p.id] = p.descripcion; 
            });
        
            $.ajax({
                url: './controllers/usuariosController.php', 
                method: 'GET',
                success: function(data) {
                    
                    usuarios = JSON.parse(data);
                    usuarios.forEach(function(usuario) {

                        let buttons = `<div class="btn-container">`; 
                        if (modus.includes('R')) { 
                        buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${usuario.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
                        }
                        if (modus.includes('U')) { 
                        buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${usuario.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
                        } 
                        if (modus.includes('D')) { 
                        buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${usuario.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
                        }
                        buttons += `</div>`; 

                        var descripcionPerfil = perfilesMap[usuario.perfil];
                        table.row.add([
                            usuario.nombre,
                            descripcionPerfil,
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
        },
        error: function() {
            alert('Error al cargar las opciones.');
        }
    });

    //Visualizar
    $(document).on('click', '#btn-view', function() {
        let id = $(this).data('id');
        let usuario = usuarios.find(s => s.id == id);
    
        if (usuario) {
            $('#idusuario').val(usuario.id);
            $('#nombre').val(usuario.nombre).prop('disabled', true);
            $('#perfil').val(usuario.perfil).prop('disabled', true);
            $('#password1').prop('disabled', true);
            $('#password2').prop('disabled', true);
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let usuario = usuarios.find(s => s.id === id);
        limpiar();
        if (usuario) {
            $('#idusuario').val(usuario.id);
            $('#nombre').val(usuario.nombre);
            $('#perfil').val(usuario.perfil);
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
                    url: './controllers/usuariosController.php',
                    method: 'DELETE',
                    data: {
                        idusuario: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = usuarios.findIndex(usuario => usuario.id == id);
                        usuarios.splice(index, 1);
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
   
    if ($('#idusuario').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#nombre').val()) {
        $('#textErrorNombre').show();
        $('#nombre').addClass('border-red');
        isValid = false;
    }
    if (!$('#password1').val()) {
        $('#textErrorPassword1').show();
        $('#password1').addClass('border-red');
        isValid = false;
    }
    if (!$('#password2').val()) {
        $('#textErrorPassword2').show();
        $('#password2').addClass('border-red');
        isValid = false;
    }

    if (!$('#perfil').val()) {
        $('#textErrorPerfil').show();
        $('#perfil').addClass('border-red');
        isValid = false;
    }

    if ($('#password1').val() != $('#password2').val()) {
        $('#textErrorPasswordDiferentes').show();
        $('#password2').addClass('border-red');
        $('#password2').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idusuario').val();
        
        let nombre = $('#nombre').val();
        let perfil = $('#perfil').val();
        let password = $('#password1').val();
        
        deshabilitar();
        $.ajax({
            url: './controllers/usuariosController.php',
            method: 'POST',
            data: {
                nombre: nombre,
                perfil: perfil,
                password: password,
                insert: insert,
                idusuario: $('#idusuario').val()
            },
            success: function(response) {
               actualizarDatatableConsulta();   
               limpiar();
               habiliar();
               $('#staticBackdrop').modal('hide');
               sAlert("success","Datos guardados con éxito");
            },
            error: function(error) {
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
    table.clear();
    
    $('#spinner-container').show();
    $.ajax({
        url: './controllers/perfilesController.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            perfiles = data;
            
            data.sort(function(a, b) {
                return a.descripcion.localeCompare(b.descripcion);
            });

            var $select = $('#perfil');
            $select.empty();
            
            $.each(data, function(index, p) {
                $select.append('<option value="' + p.id + '">' + p.descripcion + '</option>');
            });

            perfiles.forEach(function(p) { 
                perfilesMap[p.id] = p.descripcion; 
            });
        
            $.ajax({
                url: './controllers/usuariosController.php', 
                method: 'GET',
                success: function(data) {
                    
                    usuarios = JSON.parse(data);
                    usuarios.forEach(function(usuario) {
                        var descripcionPerfil = perfilesMap[usuario.perfil];
                        
                        let buttons = `<div class="btn-container">`; 
                        if (modus.includes('R')) { 
                        buttons += `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${usuario.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`; 
                        }
                        if (modus.includes('U')) { 
                        buttons += `<button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${usuario.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>`;
                        } 
                        if (modus.includes('D')) { 
                        buttons += `<button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${usuario.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>`; 
                        }
                        buttons += `</div>`; 

                        table.row.add([
                            usuario.nombre,
                            descripcionPerfil,
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
        },
        error: function() {
            alert('Error al cargar las opciones.');
        }
    });
}


function deshabilitar(){    
    $('#nombre').prop('disabled', true);
    $('#perfil').prop('disabled', true);
    $('#password1').prop('disabled', true);
    $('#password2').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){ 
    $('#nombre').prop('disabled', false);
    $('#perfil').prop('disabled', false);
    $('#password1').prop('disabled', false);
    $('#password2').prop('disabled', false);
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
    $('#perfil').val("").prop('disabled', false);
    $('#password1').val("").prop('disabled', false);
    $('#password2').val("").prop('disabled', false);
    
    $('#btn-Guardar').show();
    $('#idusuario').val("");

    $('#textErrorNombre').hide();
    $('#textErrorPerfil').hide();
    $('#textErrorPassword1').hide();
    $('#textErrorPassword2').hide();
    $('#textErrorPasswordDiferentes').hide();

    $('#nombre').removeClass('border-red');
    $('#perfil').removeClass('border-red');
    $('#password1').removeClass('border-red');
    $('#password2').removeClass('border-red');
}