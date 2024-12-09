let dependientes;

$(document).ready(function() {
    $('.tableD').DataTable();
});

$(document).ready(function() {
    
    $(document).on('click', '#btn-dependientes', function() {
        
        let id = $(this).data('id');
        
        $('#modalCrearDependientes').hide();
        $('#tablaDependientes').show();

        $('#idGloriaDependiente').val(id);

        let tableD = $('.tableD').DataTable();

        $.ajax({
            url: './controllers/dependientesController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(data) {
                dependientes = JSON.parse(data);
               
                if (Array.isArray(dependientes)) {
                    tableD.clear();
                    dependientes.forEach(function(dependiente) {
                        tableD.row.add([
                            dependiente.nombre,
                            dependiente.parentesco,
                            dependiente.telefono,
                            `<div class="btn-container">
                                <button type="button" id="btn-viewDep" class="btn-sm btn-info btn btn3d" data-id="${dependiente.id}" ><i class="fa-regular fa-eye"></i></button>
                                <button type="button" id="btn-editDep" class="btn-sm btn-warning btn btn3d" data-id="${dependiente.id}" ><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                                <button type="button" id="btn-deleteDep" class="btn-sm btn-danger btn btn3d" data-id="${dependiente.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                            </div>`
                        ]).draw(false);
                    });
                    tableD.columns.adjust().draw();
                } else {
                    console.error('La respuesta no es un array:', dependientes);
                }
            },
            error: function(error) {
                console.error('Error al cargar los datos:', error);
            }
        });
    });

    $(document).on('click', '#btn-createDependientes', function() {
        $('#tablaDependientes').hide();
        $('#modalCrearDependientes').show();
        limpiarDatosDep();
        habilitarDatosDep();
    });

    $(document).on('click', '#btn-Retroceso', function() {
        $('#tablaDependientes').show();
        $('#modalCrearDependientes').hide();
        limpiarDatosDep();
        habilitarDatosDep();
    });

    $(document).on('click', '#btn-viewDep', function() {
        $('#tablaDependientes').hide();
        $('#modalCrearDependientes').show();
        let id = $(this).data('id');
        limpiarDatosDep();
        deshabilitarDatosDep();
        cargarDatosDependiente(id);
    });

    
    $(document).on('click', '#btn-editDep', function() {
        $('#tablaDependientes').hide();
        $('#modalCrearDependientes').show();
        let id = $(this).data('id');
        limpiarDatosDep();
        habilitarDatosDep();
        cargarDatosDependiente(id);
    });

    $(document).on('click', '#btn-GuardarDependientes', function() {
        let idGloria = $('#idGloriaDependiente').val();
        
        var isValid = true;
        var insert = true;
       
        if ($('#idDependiente').val()) {
            insert = false; // Cambia a false si hay un ID de registro
        }
        if (!$('#nombreDep').val()) {
            $('#textErrorNombreDep').show();
            $('#nombreDep').addClass('border-red');
            isValid = false;
        }
        if (!$('#parentescoDep').val()) {
            $('#textErrorParentesco').show();
            $('#parentescoDep').addClass('border-red');
            isValid = false;
        }

        
    if (isValid) {
        let idDependiente = $('#idDependiente').val();
        let nombreDep = $('#nombreDep').val();
        let parentescoDep = $('#parentescoDep').val();
        let gradoDep = $('#gradoDep').val();
        let ocupacionDep = $('#ocupacionDep').val();
        let ingresoDep = $('#ingresoDep').val();
        let telefonoDep = $('#telefonoDep').val();
        let f_nacDep = $('#f_nacDep').val();
        console.log("Id dep ="+idDependiente+" Id Gloria="+idGloria);
        deshabilitarDatosDep();

            $.ajax({
                url: './controllers/dependientesController.php',
                method: 'POST',
                data: {
                    idDependiente: idDependiente,
                    idGloria: idGloria,
                    nombreDep: nombreDep,
                    parentescoDep: parentescoDep,
                    gradoDep: gradoDep,
                    ocupacionDep: ocupacionDep,
                    ingresoDep: ingresoDep,
                    telefonoDep: telefonoDep,
                    f_nacDep: f_nacDep,
                    insert: insert,
                    idSubsede: $('#idSubsede').val()
                },
                success: function(response) {
                limpiar();
                habiliar();
                $('#staticBackdrop').modal('hide');//Ocultar modal
                sAlert("success","Datos guardados con éxito");
                habilitarDatosDep();
                limpiarDatosDep();
                cargarDatatableDep(idGloria);
                $('#tablaDependientes').show();
                $('#modalCrearDependientes').hide();                
                
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

    $(document).on('click', '#btn-deleteDep', function() {
        let id = $(this).data('id');
        let tableD = $('.tableD').DataTable();

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
                    url: './controllers/dependientesController.php',
                    method: 'DELETE',
                    data: {
                        idDependiente: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        tableD.row(row).remove().draw(false);
                        let index = dependientes.findIndex(dependiente => dependiente.id == id);
                        dependientes.splice(index, 1);
                    },
                    error: function(error) {
                        sAlert("error","Error en cargar datos");
                    }
                });
            }
          });
    });
});

function cargarDatosDependiente(id){
        // Educacion
        $.ajax({
            url: './controllers/dependientesController.php',
            method: 'GET',
            data: { idDependiente: id },
            success: function(response) {
               
                let depDetalle = JSON.parse(response);
                console.log(depDetalle.nombre);

                if(Object.keys(depDetalle).length > 0){
                    $('#Dependiente').val('1');
                }

                $('#idDependiente').val(depDetalle.id)
                $('#nombreDep').val(depDetalle.nombre);
                $('#parentescoDep').val(depDetalle.parentesco);
                $('#gradoDep').val(depDetalle.grado);
                $('#ocupacionDep').val(depDetalle.ocupacion);
                $('#ingresoDep').val(depDetalle.ingreso);
                $('#telefonoDep').val(depDetalle.telefono);
                $('#f_nacDep').val(depDetalle.f_nac);
              },
            error: function(error) {
                sAlert("error","Error en cargar datos de educación");
                console.log(error);
            }
        });    
}

function deshabilitarDatosDep(){
    $('#nombreDep').prop('disabled', true);
    $('#parentescoDep').prop('disabled', true);
    $('#gradoDep').prop('disabled', true);
    $('#ocupacionDep').prop('disabled', true);
    $('#ingresoDep').prop('disabled', true);
    $('#f_nacDep').prop('disabled', true);
    $('#telefonoDep').prop('disabled', true);
    $('#btn-GuardarDependientes').hide();
}

function habilitarDatosDep(){
    $('#nombreDep').prop('disabled', false);
    $('#parentescoDep').prop('disabled', false);
    $('#gradoDep').prop('disabled', false);
    $('#ocupacionDep').prop('disabled', false);
    $('#ingresoDep').prop('disabled', false);
    $('#f_nacDep').prop('disabled', false);
    $('#telefonoDep').prop('disabled', false);
    $('#btn-GuardarDependientes').show();
}

function limpiarDatosDep(){
    $('#idDependiente').val('');
    $('#nombreDep').val('');
    $('#parentescoDep').val('')
    $('#gradoDep').val('')
    $('#ocupacionDep').val('')
    $('#ingresoDep').val('')
    $('#f_nacDep').val('')
    $('#telefonoDep').val('')
}

function cargarDatatableDep(temp){

    
    $('#modalCrearDependientes').hide();
    $('#tablaDependientes').show();

    $('#idGloriaDependiente').val(temp);

    let tableD = $('.tableD').DataTable();

    $.ajax({
        url: './controllers/dependientesController.php',
        method: 'GET',
        data: {
            idgloria: temp
        },
        success: function(data) {
            dependientes = JSON.parse(data);
           
            if (Array.isArray(dependientes)) {
                tableD.clear();
                dependientes.forEach(function(dependiente) {
                    tableD.row.add([
                        dependiente.nombre,
                        dependiente.parentesco,
                        dependiente.telefono,
                        `<div class="btn-container">
                            <button type="button" id="btn-viewDep" class="btn-sm btn-info btn btn3d" data-id="${dependiente.id}"><i class="fa-regular fa-eye"></i></button>
                            <button type="button" id="btn-editDep" class="btn-sm btn-warning btn btn3d" data-id="${dependiente.id}"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                            <button type="button" id="btn-deleteDep" class="btn-sm btn-danger btn btn3d" data-id="${dependiente.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                        </div>`
                    ]).draw(false);
                });
                tableD.columns.adjust().draw();
            } else {
                console.error('La respuesta no es un array:', dependientes);
            }
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}