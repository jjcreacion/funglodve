let glorias;

$(document).ready(function () {
    
    $('#cedula').on('input', function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Eliminar cualquier carácter no numérico
    });

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

    if ($.fn.dataTable.isDataTable('.table')) {
        $('.table').DataTable().destroy();
    }

    let table = $('.table').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "ordering": true,
        "searching": true,
        "ajax": {
            "url": './controllers/dataTableGlorias.php',
            "type": "POST",
            "data": function (d) {
                return JSON.stringify(d);
            },
            "contentType": "application/json",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "cedula" },
            { "data": "nombre_completo" },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `
                    <div class="btn-container">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="fa-solid fa-plus"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="btn-social" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalSocial" href="#" ><i class="fa-solid fa-users"></i> Datos Sociales</a></li>
                        <li><a class="dropdown-item" id="btn-dependientes" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalDependientes" href="#"><i class="fa-solid fa-people-roof"></i> Carga Familiar</a></li>
                        <li><a class="dropdown-item" id="btn-historial" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalHistorial" href="#"><i class="fa-solid fa-medal"></i> Historial Deportivo</a></li>
                        <li><a class="dropdown-item" id="btn-beneficios" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalBeneficios" href="#"><i class="fa-regular fa-money-bill-1"></i> Beneficios Asignados</a></li>
                    </ul>
                    </div>
                    </div>`;
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `<div class="btn-container">
                                <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                                <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                                <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${data.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                            </div>`;
                }
            } 
        ]
    });

    //Visualizar
    $(document).on('click', '#btn-view', function() {
        limpiar();
        deshabilitar();
        let id = $(this).data('id');
        $.ajax({
            url: './controllers/gloriasController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(response) {
                let gloriaDetalle = JSON.parse(response); 
                $('#btn-Guardar').hide();   
                $('#cedula').val(gloriaDetalle.cedula);
                $('#nombre').val(gloriaDetalle.nombre);
                $('#apellido').val(gloriaDetalle.apellido);
                $('#direccion').val(gloriaDetalle.direccion);
                $('#email').val(gloriaDetalle.email);
                $('#telefono').val(gloriaDetalle.telefono);
                $('#ocupacion').val(gloriaDetalle.ocupacion);
                $('#e_civil').val(gloriaDetalle.e_civil);
                $('#fecha_nac').val(gloriaDetalle.fecha_nac);
                $('#subsede').val(gloriaDetalle.sub_sede);
                $('#estado').val(gloriaDetalle.estado);
                cargarMunicipios(gloriaDetalle.estado);
                $('#municipio').val(gloriaDetalle.municipio);
                $('#disciplina').val(gloriaDetalle.disciplina);
                $('#tipo').val(gloriaDetalle.tipo);
                $('#grado').val(gloriaDetalle.grado);
                $('#f_ingreso').val(gloriaDetalle.ingreso);
               
            },
            error: function(error) {
                sAlert("error","Error en cargar datos");
                console.log(error);
            }
        });
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        limpiar();
        habiliar();
        let id = $(this).data('id');
        $.ajax({
            url: './controllers/gloriasController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(response) {
                let gloriaDetalle = JSON.parse(response); 
                $('#idgloria').val(gloriaDetalle.id);        
                $('#cedula').val(gloriaDetalle.cedula);
                $('#nombre').val(gloriaDetalle.nombre);
                $('#apellido').val(gloriaDetalle.apellido);
                $('#direccion').val(gloriaDetalle.direccion);
                $('#email').val(gloriaDetalle.email);
                $('#telefono').val(gloriaDetalle.telefono);
                $('#ocupacion').val(gloriaDetalle.ocupacion);
                $('#e_civil').val(gloriaDetalle.e_civil);
                $('#fecha_nac').val(gloriaDetalle.fecha_nac);
                $('#subsede').val(gloriaDetalle.sub_sede);
                $('#estado').val(gloriaDetalle.estado);
                cargarMunicipios(gloriaDetalle.estado);
                $('#municipio').val(gloriaDetalle.municipio);
                $('#disciplina').val(gloriaDetalle.disciplina);
                $('#tipo').val(gloriaDetalle.tipo);
                $('#grado').val(gloriaDetalle.grado);
                $('#f_ingreso').val(gloriaDetalle.ingreso);
            },
            error: function(error) {
                sAlert("error","Error en cargar datos");
                console.log(error);
            }
        });
    });

    $(document).on('click', '#btn-create', function() {
        limpiar();
        habiliar();
    });
    
    //vERIFICAR SI CEDULA YA EXISTE
    $(document).on('blur', '#cedula', function() {
        let cedula = $('#cedula').val();
        deshabilitar();
        $.ajax({
            url: './controllers/gloriasController.php',
            method: 'GET',
            data: {
                cedula: cedula
            },
            success: function(response) {
                habiliar();
                nombre.focus()
                let gloriaDetalle = JSON.parse(response);
                if(Object.keys(gloriaDetalle).length > 0){
                    $('#idgloria').val(gloriaDetalle.id);
                    $('#nombre').val(gloriaDetalle.nombre);
                    $('#apellido').val(gloriaDetalle.apellido);
                    $('#direccion').val(gloriaDetalle.direccion);
                    $('#email').val(gloriaDetalle.email);
                    $('#telefono').val(gloriaDetalle.telefono);
                    $('#ocupacion').val(gloriaDetalle.ocupacion);
                    $('#e_civil').val(gloriaDetalle.e_civil);
                    $('#fecha_nac').val(gloriaDetalle.fecha_nac);
                    $('#subsede').val(gloriaDetalle.sub_sede);
                    $('#estado').val(gloriaDetalle.estado);
                    cargarMunicipios(gloriaDetalle.estado);
                    $('#municipio').val(gloriaDetalle.municipio);
                    $('#disciplina').val(gloriaDetalle.disciplina);
                    $('#tipo').val(gloriaDetalle.tipo);
                    $('#grado').val(gloriaDetalle.grado);
                    $('#f_ingreso').val(gloriaDetalle.ingreso);
                }     
            },
            error: function(error) {
                sAlert("error","Error en cargar datos");
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
                 $.ajax({
                    url: './controllers/gloriasController.php',
                    method: 'DELETE',
                    data: {
                        idgloria: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        actualizarDatatable(); 
                    },
                    error: function(error) {
                        sAlert("error","Error en cargar datos");
                    }
                });
            }
          });
    });

     
    $(document).on('click', '#btn-historial', function() {
        limpiarHistorial();
       
        let id = $(this).data('id');
        
        $('#idGloriaHistorial').val(id);
        //Historial Basico
        $.ajax({
            url: './controllers/historialBController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(response) {
                let historialDetalle = JSON.parse(response); 
                
                if(Object.keys(historialDetalle).length > 0){
                $('#historialBasico').val('1');
                } 

                $('#fecha_i').val(historialDetalle.fecha_i);

                if (historialDetalle.federado == 1) {
                    $('#fopcion1').prop('checked', true);
                } else if (historialDetalle.federado == 2) {
                    $('#fopcion2').prop('checked', true);
                }

                $('#cual').val(historialDetalle.cual);
                $('#estadoH').val(historialDetalle.estado);
                
                if (historialDetalle.j_nac == 1) {
                    $('#jopcion1').prop('checked', true);
                } else if (historialDetalle.j_nac == 2) {
                    $('#jopcion2').prop('checked', true);
                }

                $('#ediciones').val(historialDetalle.ediciones);
                $('#fecha_p').val(historialDetalle.fecha_p);

                if (historialDetalle.selec_nac == 1) {
                    $('#sopcion1').prop('checked', true);
                } else if (historialDetalle.selec_nac == 2) {
                    $('#sopcion2').prop('checked', true);  
                } else if (historialDetalle.selec_nac == 3) {
                    $('#sopcion3').prop('checked', true);
                }

              },
            error: function(error) {
                sAlert("error","Error en cargar datos");
                console.log(error);
            }
        });

        //Historial Nacional
        $.ajax({
            url: './controllers/historialNController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(response) {
                let historialDetalle = JSON.parse(response); 

                if(Object.keys(historialDetalle).length > 0){
                $('#historialNacional').val('1');
                }

                if(historialDetalle.distrital==1)
                    $('#distrital').prop('checked', true);
                if(historialDetalle.estatal==1)
                    $('#estatal').prop('checked', true);
                if(historialDetalle.interclubes==1)
                    $('#interclubes').prop('checked', true);
                if(historialDetalle.cnacionales==1)
                    $('#cnacionales').prop('checked', true);               
                if(historialDetalle.jnacionales==1)
                    $('#jnacionales').prop('checked', true);               
              },
            error: function(error) {
                sAlert("error","Error en cargar datos");
                console.log(error);
            }
        });

        //Historial Internacional
        $.ajax({
            url: './controllers/historialIController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(response) {
                let historialDetalle = JSON.parse(response); 

                if(Object.keys(historialDetalle).length > 0){
                $('#historialInternacional').val('1');
                }
                
                if(historialDetalle.csuda==1)
                    $('#csuda').prop('checked', true);
                if(historialDetalle.ccentro==1)
                    $('#ccentro').prop('checked', true);
                if(historialDetalle.clatino==1)
                    $('#clatino').prop('checked', true);
                if(historialDetalle.cboliva==1)
                    $('#cboliva').prop('checked', true);    
                if(historialDetalle.cpana==1)
                    $('#cpana').prop('checked', true);               
                if(historialDetalle.cibero==1)
                    $('#cibero').prop('checked', true); 
                if(historialDetalle.cligas==1)
                    $('#cligas').prop('checked', true);               
                if(historialDetalle.cmundiales==1)
                    $('#cmundiales').prop('checked', true);    
                if(historialDetalle.invitacionales==1)
                    $('#invitacionales').prop('checked', true);    
                if(historialDetalle.jsuda==1)
                    $('#jsuda').prop('checked', true);
                if(historialDetalle.jcentro==1)
                    $('#jcentro').prop('checked', true);
                if(historialDetalle.jlatino==1)
                    $('#jlatino').prop('checked', true);
                 if(historialDetalle.jboliva==1)
                    $('#jboliva').prop('checked', true);    
                if(historialDetalle.jpana==1)
                    $('#jpana').prop('checked', true);               
                if(historialDetalle.jalba==1)
                    $('#jalba').prop('checked', true);    
                if(historialDetalle.jjoo==1)
                    $('#jjoo').prop('checked', true);               
              },
            error: function(error) {
                sAlert("error","Error en cargar datos");
                console.log(error);
            }
        });

        //Historial Otros
        $.ajax({
            url: './controllers/historialOController.php',
            method: 'GET',
            data: {
                idgloria: id
            },
            success: function(response) {
                let historialDetalle = JSON.parse(response); 
              
                if(Object.keys(historialDetalle).length > 0){
                    $('#historialOtros').val('1');
                }

                if(historialDetalle.entrenador==1)
                    $('#entrenador').prop('checked', true);               
                if(historialDetalle.arbitro==1)
                    $('#arbitro').prop('checked', true);    
                if(historialDetalle.juez==1)
                    $('#juez').prop('checked', true);               
              
                $('#oinstitucion').val(historialDetalle.institucion);
                $('#otiempo').val(historialDetalle.tiempo);
                
                if (historialDetalle.dirigente == 1) {
                    $('#dopcion1').prop('checked', true);
                } else if (historialDetalle.dirigente == 2) {
                    $('#dopcion2').prop('checked', true);
                }

                $('#dinstitucion').val(historialDetalle.dinstitucion);
                $('#dtiempo').val(historialDetalle.dtiempo);

              },
            error: function(error) {
                sAlert("error","Error en cargar datos");
                console.log(error);
            }
        });

    });    
       
    $(document).on('click', '#btn-Guardar', function() {
    var isValid = true;
    var insert = true;
   
    if ($('#idgloria').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#nombre').val()) {
        $('#textErrorNombre').show();
        $('#nombre').addClass('border-red');
        isValid = false;
    }
    if (!$('#apellido').val()) {
        $('#textErrorApellido').show();
        $('#apellido').addClass('border-red');
        isValid = false;
    }
    if (!$('#cedula').val()) {
        $('#textErrorCedula').show();
        $('#cedula').addClass('border-red');
        isValid = false;
    }
    
    if ($('#subsede').val() == "-1" || !$('#subsede').val()) {
        $('#textErrorSubsede').show();
        $('#subsede').addClass('border-red');
        isValid = false;
    }

    if ($('#disciplina').val() == "-1" || !$('#subsede').val()) {
        $('#textErrorDisciplina').show();
        $('#disciplina').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idgloria').val();
        
        let cedula = $('#cedula').val();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let direccion = $('#direccion').val();
        let email = $('#email').val();
        let telefono = $('#telefono').val();
        let ocupacion = $('#ocupacion').val();
        let e_civil = $('#e_civil').val();
        let fecha_nac = $('#fecha_nac').val();
        let subsede = $('#subsede').val();
        let estado = $('#estado').val();
        let municipio = $('#municipio').val();
        let disciplina = $('#disciplina').val();
        let tipo = $('#tipo').val();
        let grado = $('#grado').val();
        let f_ingreso = $('#f_ingreso').val();

        deshabilitar();
        $.ajax({
            url: './controllers/gloriasController.php',
            method: 'POST',
            data: {
                cedula : cedula,
                nombre : nombre,
                apellido : apellido,
                direccion : direccion,
                email : email,
                telefono : telefono,
                ocupacion : ocupacion,
                e_civil : e_civil,
                fecha_nac : fecha_nac,
                subsede : subsede,
                estado : estado,
                municipio : municipio,
                disciplina : disciplina,
                tipo : tipo,
                grado : grado,
                f_ingreso : f_ingreso,                            
                insert: insert,
                idgloria: $('#idgloria').val()
            },
            success: function(response) {
               habiliar();
               $('#staticBackdrop').modal('hide');//Ocultar modal
               sAlert("success","Datos guardados con éxito");
               actualizarDatatable(); 
               limpiar();
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

    $(document).on('click', '#btn-GuardarHistorial', function() {
 
    var insertBasico, insertNacional, insertInternacional, insertOtros;
    insertBasico = insertNacional = insertInternacional = insertOtros = true;

    if($('#historialBasico').val() == '1')insertBasico = false;
    if($('#historialNacional').val() == '1')insertNacional = false;
    if($('#historialInternacional').val() == '1')insertInternacional = false;
    if($('#historialOtros').val() == '1')insertOtros = false;

    let insert1, insert2, insert3, insert4; 
    insert1 = insert2 = insert3 = insert4 = false;

    let idGloriaHistorial = $('#idGloriaHistorial').val();
    
    let fecha_i = $('#fecha_i').val();
    let federado = $('input[name="federado"]:checked').val(); 
    if (federado === undefined) { federado = null; }
    let cual =  $('#cual').val();
    let estado = $('#estadoH').val();
    let j_nac = $('input[name="j_nac"]:checked').val(); 
    if (j_nac === undefined) { j_nac = null; }
    let ediciones = $('#ediciones').val();
    let fecha_p = $('#fecha_p').val();
    let selec_nac = $('input[name="selec_nac"]:checked').val(); 
    if (selec_nac === undefined) { selec_nac = null; }

    deshabilitarHistorial();
    
    //Insertar Datos Basicos
    $.ajax({
        url: './controllers/historialBController.php',
        method: 'POST',
        data: {
            fecha_i : fecha_i,
            federado : federado,
            cual : cual,
            estado : estado,
            j_nac : j_nac,
            ediciones :ediciones,
            fecha_p :fecha_p,
            selec_nac :selec_nac,
            insert: insertBasico,
            id: idGloriaHistorial
        },
        success: function(response) {
            insert1 = true;
        },
        error: function(error) {
            // Manejar el error
            sAlert("error","Error en cargar datos");
            $('#staticBackdrop').modal('hide');//Ocultar modal
            habiliarHistorial();
        }
    });

    //Historial Nacional 
    let distrital = $('#distrital').is(':checked') ? 1 : 0; 
    let estatal = $('#estatal').is(':checked') ? 1 : 0; 
    let interclubes = $('#interclubes').is(':checked') ? 1 : 0;
    let cnacionales = $('#cnacionales').is(':checked') ? 1 : 0; 
    let jnacionales = $('#jnacionales').is(':checked') ? 1 : 0;

     //Insertar Historial Nacional
    $.ajax({
        url: './controllers/historialNController.php',
        method: 'POST',
        data: {
            distrital : distrital,
            estatal : estatal,
            interclubes : interclubes,
            cnacionales : cnacionales,
            jnacionales : jnacionales,
            insert: insertNacional,
            id: idGloriaHistorial
        },
        success: function(response) {
            insert2 = true;
        },
        error: function(error) {
            // Manejar el error
            sAlert("error","Error en cargar datos");
            $('#staticBackdrop').modal('hide');//Ocultar modal
            habiliar();
        }
    });

    //Historial Internacional
    let csuda = $('#csuda').is(':checked') ? 1 : 0;
    let ccentro = $('#ccentro').is(':checked') ? 1 : 0;
    let clatino = $('#clatino').is(':checked') ? 1 : 0;
    let cboliva = $('#cboliva').is(':checked') ? 1 : 0;
    let cpana = $('#cpana').is(':checked') ? 1 : 0;
    let cibero = $('#cibero').is(':checked') ? 1 : 0;
    let cligas = $('#cligas').is(':checked') ? 1 : 0;
    let cmundiales = $('#cmundiales').is(':checked') ? 1 : 0;
    let invitacionales = $('#invitacionales').is(':checked') ? 1 : 0;
    let jsuda = $('#jsuda').is(':checked') ? 1 : 0;
    let jcentro = $('#jcentro').is(':checked') ? 1 : 0;
    let jlatino = $('#jlatino').is(':checked') ? 1 : 0;
    let jboliva = $('#jboliva').is(':checked') ? 1 : 0;
    let jpana = $('#jpana').is(':checked') ? 1 : 0;
    let jalba = $('#jalba').is(':checked') ? 1 : 0;
    let jjoo = $('#jjoo').is(':checked') ? 1 : 0;

    //Insertar Historial Internacional
    $.ajax({
        url: './controllers/historialIController.php',
        method: 'POST',
        data: {
            csuda: csuda,
            ccentro: ccentro,
            clatino: clatino,
            cboliva: cboliva,
            cpana: cpana,
            cibero: cibero,
            cligas: cligas,
            cmundiales: cmundiales,
            invitacionales: invitacionales,
            jsuda: jsuda,
            jcentro: jcentro,
            jlatino: jlatino,
            jboliva: jboliva,
            jpana: jpana,
            jalba: jalba,
            jjoo: jjoo,
            insert: insertInternacional,
            id: idGloriaHistorial
        },
        success: function(response) {
            insert3 = true;
        },
        error: function(error) {
            // Manejar el error
            sAlert("error","Error en cargar datos");
            $('#staticBackdrop').modal('hide');//Ocultar modal
            habiliarHistorial();
        }
    });

    //Historial Otros 
  
    let entrenador = $('#entrenador').is(':checked') ? 1 : 0;               
    let arbitro = $('#arbitro').is(':checked') ? 1 : 0;
    let juez = $('#juez').is(':checked') ? 1 : 0;
    let oinstitucion = $('#oinstitucion').val();
    let otiempo = $('#otiempo').val();
    let dirigente = $('input[name="dirigente"]:checked').val(); 
    if (dirigente === undefined) { dirigente = null; }
    let dinstitucion = $('#dinstitucion').val();
    let dtiempo = $('#dtiempo').val();
    
    //Insertar Otros
  
    $.ajax({
        url: './controllers/historialOController.php',
        method: 'POST',
        data: {
            entrenador : entrenador,
            arbitro : arbitro,
            juez : juez,
            oinstitucion : oinstitucion,
            dirigente : dirigente,
            dinstitucion : dinstitucion,
            dtiempo : dtiempo,
            otiempo : otiempo,
            insert: insertOtros,
            id: idGloriaHistorial
        },
        success: function(response) {
           insert4 = true;
        },
        error: function(error) {
            // Manejar el error
            sAlert("error","Error en cargar datos");
            $('#staticBackdrop').modal('hide');//Ocultar modal
            habiliarHistorial();
        }
    });

        habiliarHistorial();
        $('#ModalHistorial').modal('hide');//Ocultar modal
        sAlert("success","Datos guardados con éxito");
        limpiarHistorial();
    //Fin Insert

    });
});


function actualizarDatatable(){
    
    if ($.fn.dataTable.isDataTable('.table')) {
        $('.table').DataTable().destroy();
    }

    let table = $('.table').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "ordering": true,
        "searching": true,
        "ajax": {
            "url": './controllers/dataTableGlorias.php',
            "type": "POST",
            "data": function (d) {
                return JSON.stringify(d);
            },
            "contentType": "application/json",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "cedula" },
            { "data": "nombre_completo" },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `
                    <div class="btn-container">
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="fa-solid fa-plus"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="btn-social" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalSocial" href="#"><i class="fa-solid fa-users"></i> Datos Sociales</a></li>
                        <li><a class="dropdown-item" id="btn-dependientes" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalDependientes" href="#"><i class="fa-solid fa-people-roof"></i> Carga Familiar</a></li>
                        <li><a class="dropdown-item" id="btn-historial" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalHistorial" href="#"><i class="fa-solid fa-medal"></i> Historial Deportivo</a></li>
                        <li><a class="dropdown-item" id="btn-beneficios" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#ModalBeneficios" href="#"><i class="fa-regular fa-money-bill-1"></i> Beneficios Asignados</a></li>
                    </ul>
                    </div>
                    </div>`;
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `<div class="btn-container">
                                <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                                <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${data.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                                <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${data.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                            </div>`;
                }
            } 
        ]
    });
    
}

function deshabilitar(){    
    $('#cedula').prop('disabled', true);
    $('#nombre').prop('disabled', true);
    $('#apellido').prop('disabled', true);
    $('#direccion').prop('disabled', true);
    $('#email').prop('disabled', true);
    $('#telefono').prop('disabled', true);
    $('#ocupacion').prop('disabled', true);
    $('#e_civil').prop('disabled', true);
    $('#fecha_nac').prop('disabled', true);
    $('#subsede').prop('disabled', true);
    $('#estado').prop('disabled', true);
    $('#municipio').prop('disabled', true);
    $('#disciplina').prop('disabled', true);
    $('#tipo').prop('disabled', true);
    $('#grado').prop('disabled', true);
    $('#f_ingreso').prop('disabled', true);
}

function habiliar(){ 
    $('#cedula').prop('disabled', false);
    $('#nombre').prop('disabled', false);
    $('#apellido').prop('disabled', false);
    $('#direccion').prop('disabled', false);
    $('#email').prop('disabled', false);
    $('#telefono').prop('disabled', false);
    $('#ocupacion').prop('disabled', false);
    $('#e_civil').prop('disabled', false);
    $('#fecha_nac').prop('disabled', false);
    $('#subsede').prop('disabled', false);
    $('#estado').prop('disabled', false);
    $('#municipio').prop('disabled', false);
    $('#disciplina').prop('disabled', false);
    $('#tipo').prop('disabled', false);
    $('#grado').prop('disabled', false);
    $('#f_ingreso').prop('disabled', false);
}

function deshabilitarHistorial(){    
    $('#fecha_i').prop('disabled', true);
    $('#sopcion1').prop('disabled', true);
    $('#sopcion2').prop('disabled', true);
    $('#sopcion3').prop('disabled', true);
    $('#jopcion1').prop('disabled', true);
    $('#jopcion2').prop('disabled', true);
    $('#fopcion1').prop('disabled', true);
    $('#fopcion2').prop('disabled', true);
    $('#cual').prop('disabled', true);
    $('#estadoH').prop('disabled', true);
    $('#j_nac').prop('disabled', true);
    $('#ediciones').prop('disabled', true);
    $('#fecha_p').prop('disabled', true);
    $('#selec_nac').prop('disabled', true);
    $('#distrital').prop('disabled', true);
    $('#estatal').prop('disabled', true);
    $('#interclubes').prop('disabled', true);
    $('#cnacionales').prop('disabled', true);               
    $('#jnacionales').prop('disabled', true); 
    $('#csuda').prop('disabled', true);
    $('#ccentro').prop('disabled', true);
    $('#clatino').prop('disabled', true);
    $('#cnacionales').prop('disabled', true);               
    $('#cboliva').prop('disabled', true);    
    $('#cpana').prop('disabled', true);               
    $('#cibero').prop('disabled', true); 
    $('#cligas').prop('disabled', true);               
    $('#cmundiales').prop('disabled', true);    
    $('#invitacionales').prop('disabled', true);    
    $('#jsuda').prop('disabled', true);
    $('#jcentro').prop('disabled', true);
    $('#jlatino').prop('disabled', true);
    $('#jboliva').prop('disabled', true);    
    $('#jpana').prop('disabled', true);               
    $('#jalba').prop('disabled', true);    
    $('#jjoo').prop('disabled', true);               
    $('#entrenador').prop('disabled', true);               
    $('#arbitro').prop('disabled', true); 
    $('#juez').prop('disabled', true);             
    $('#oinstitucion').prop('disabled', true);
    $('#otiempo').prop('disabled', true);
    $('#dopcion1').prop('disabled', true);
    $('#dopcion2').prop('disabled', true);
    $('#dinstitucion').prop('disabled', true);
    $('#dtiempo').prop('disabled', true);
    $('#historialBasico').prop('disabled', true);
    $('#historialNacional').prop('disabled', true);
    $('#historialInternacional').prop('disabled', true);
    $('#historialOtros').prop('disabled', true);
    $('#idGloriaHistorial').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliarHistorial(){ 
    $('#fecha_i').prop('disabled', false);
    $('#sopcion1').prop('disabled', false);
    $('#sopcion2').prop('disabled', false);
    $('#sopcion3').prop('disabled', false);
    $('#jopcion1').prop('disabled', false);
    $('#jopcion2').prop('disabled', false);
    $('#fopcion1').prop('disabled', false);
    $('#fopcion2').prop('disabled', false);
    $('#cual').prop('disabled', false);
    $('#estadoH').prop('disabled', false);
    $('#j_nac').prop('disabled', false);
    $('#ediciones').prop('disabled', false);
    $('#fecha_p').prop('disabled', false);
    $('#selec_nac').prop('disabled', false);
    $('#distrital').prop('disabled', false);
    $('#estatal').prop('disabled', false);
    $('#interclubes').prop('disabled', false);
    $('#cnacionales').prop('disabled', false);               
    $('#jnacionales').prop('disabled', false); 
    $('#csuda').prop('disabled', false);
    $('#ccentro').prop('disabled', false);
    $('#clatino').prop('disabled', false);
    $('#cnacionales').prop('disabled', false);               
    $('#cboliva').prop('disabled', false);    
    $('#cpana').prop('disabled', false);               
    $('#cibero').prop('disabled', false); 
    $('#cligas').prop('disabled', false);               
    $('#cmundiales').prop('disabled', false);    
    $('#invitacionales').prop('disabled', false);    
    $('#jsuda').prop('disabled', false);
    $('#jcentro').prop('disabled', false);
    $('#jlatino').prop('disabled', false);
    $('#jboliva').prop('disabled', false);    
    $('#jpana').prop('disabled', false);               
    $('#jalba').prop('disabled', false);    
    $('#jjoo').prop('disabled', false);               
    $('#entrenador').prop('disabled', false);               
    $('#arbitro').prop('disabled', false); 
    $('#juez').prop('disabled', false);             
    $('#oinstitucion').prop('disabled', false);
    $('#otiempo').prop('disabled', false);
    $('#dopcion1').prop('disabled', false);
    $('#dopcion2').prop('disabled', false);
    $('#dinstitucion').prop('disabled', false);
    $('#dtiempo').prop('disabled', false);
    $('#historialBasico').prop('disabled', false);
    $('#historialNacional').prop('disabled', false);
    $('#historialInternacional').prop('disabled', false);
    $('#historialOtros').prop('disabled', false);
    $('#idGloriaHistorial').prop('disabled', false);
    $(".spinner-grow").hide();//Acultar Spiner
}

function sAlert(icono,mensaje){
    Swal.fire({
        icon: icono,
        title: mensaje,
    });
    limpiar();
}

function limpiarHistorial(){
    
    $('#fecha_i').val("");
    $('#sopcion1').prop('checked', false);
    $('#sopcion2').prop('checked', false);
    $('#sopcion3').prop('checked', false);
    $('#jopcion1').prop('checked', false);
    $('#jopcion2').prop('checked', false);
    $('#fopcion1').prop('checked', false);
    $('#fopcion2').prop('checked', false);
    $('#cual').val("");
    $('#estado').val("");
    $('#j_nac').val("");
    $('#ediciones').val("");
    $('#fecha_p').val("");
    $('#selec_nac').val("");
    $('#distrital').prop('checked', false);
    $('#estatal').prop('checked', false);
    $('#interclubes').prop('checked', false);
    $('#cnacionales').prop('checked', false);               
    $('#jnacionales').prop('checked', false); 
    $('#csuda').prop('checked', false);
    $('#ccentro').prop('checked', false);
    $('#clatino').prop('checked', false);
    $('#cnacionales').prop('checked', false);               
    $('#cboliva').prop('checked', false);    
    $('#cpana').prop('checked', false);               
    $('#cibero').prop('checked', false); 
    $('#cligas').prop('checked', false);               
    $('#cmundiales').prop('checked', false);    
    $('#invitacionales').prop('checked', false);    
    $('#jsuda').prop('checked', false);
    $('#jcentro').prop('checked', false);
    $('#jlatino').prop('checked', false);
    $('#jboliva').prop('checked', false);    
    $('#jpana').prop('checked', false);               
    $('#jalba').prop('checked', false);    
    $('#jjoo').prop('checked', false);               
    $('#entrenador').prop('checked', false);               
    $('#arbitro').prop('checked', false);    
    $('#juez').prop('checked', false);               
    $('#oinstitucion').val("");
    $('#otiempo').val("");
    $('#dopcion1').prop('checked', false);
    $('#dopcion2').prop('checked', false);
    $('#dinstitucion').val("");
    $('#dtiempo').val("");
    $('#historialBasico').val('');
    $('#historialNacional').val('');
    $('#historialInternacional').val('');
    $('#historialOtros').val('');
    $('#idGloriaHistorial').val('')
}

function limpiar(){
    $('#cedula').val("");
    $('#nombre').val("");
    $('#apellido').val("");
    $('#direccion').val("");
    $('#email').val("");
    $('#telefono').val("");
    $('#ocupacion').val("");
    $('#e_civil').val("");
    $('#fecha_nac').val("");
    $('#subsede').val("");
    $('#estado').val("");
    $('#municipio').empty();
    $('#disciplina').val("");
    $('#tipo').val("");
    $('#grado').val("");
    $('#f_ingreso').val("");

    $('#btn-Guardar').show();
    $('#idgloria');

    $('#textErrorNombre').hide();
    $('#textErrorCedula').hide();
    $('#textErrorApellido').hide();
    $('#textErrorSubsede').hide();
    $('#textErrorDisciplina').hide();

    $('#subsede').removeClass('border-red');
    $('#disciplina').removeClass('border-red');
    $('#nombre').removeClass('border-red');
    $('#cedula').removeClass('border-red');
    $('#apellido').removeClass('border-red');
}


document.addEventListener('DOMContentLoaded', function() {
    cargarEstados();
});

function cargarEstados() {
    const estados = [
        { id: 1, nombre: 'Amazonas' },
        { id: 2, nombre: 'Anzoátegui' },
        { id: 3, nombre: 'Apure' },
        { id: 4, nombre: 'Aragua' },
        { id: 5, nombre: 'Barinas' },
        { id: 6, nombre: 'Bolívar' },
        { id: 7, nombre: 'Carabobo' },
        { id: 8, nombre: 'Cojedes' },
        { id: 9, nombre: 'Delta Amacuro' },
        { id: 10, nombre: 'Distrito Capital' },
        { id: 11, nombre: 'Falcón' },
        { id: 12, nombre: 'Guárico' },
        { id: 13, nombre: 'Lara' },
        { id: 14, nombre: 'Mérida' },
        { id: 15, nombre: 'Miranda' },
        { id: 16, nombre: 'Monagas' },
        { id: 17, nombre: 'Nueva Esparta' },
        { id: 18, nombre: 'Portuguesa' },
        { id: 19, nombre: 'Sucre' },
        { id: 20, nombre: 'Táchira' },
        { id: 21, nombre: 'Trujillo' },
        { id: 22, nombre: 'Vargas' },
        { id: 23, nombre: 'Yaracuy' },
        { id: 24, nombre: 'Zulia' }
    ];
    

    const estadoSelect = document.getElementById('estado');
    estados.forEach(function(estado) {
        const option = document.createElement('option');
        option.value = estado.id;
        option.textContent = estado.nombre;
        estadoSelect.appendChild(option);
    });

    const estadoSelectH = document.getElementById('estadoH');
    estados.forEach(function(estado) {
        const option = document.createElement('option');
        option.value = estado.id;
        option.textContent = estado.nombre;
        estadoSelectH.appendChild(option);
    });
}

document.getElementById('estado').addEventListener('change', function() {
    const estadoId = this.value;
    cargarMunicipios(estadoId);
});

function cargarMunicipios(estadoId) {
    const municipios = {
        1: [
            { id: 101, nombre: 'Alto Orinoco' },
            { id: 102, nombre: 'Atabapo' },
            { id: 103, nombre: 'Atures' },
            { id: 104, nombre: 'Autana' },
            { id: 105, nombre: 'Manapiare' },
            { id: 106, nombre: 'Maroa' },
            { id: 107, nombre: 'Río Negro' }
        ],
        2: [
            { id: 201, nombre: 'Anaco' },
            { id: 202, nombre: 'Aragua' },
            { id: 203, nombre: 'Bolívar' },
            { id: 204, nombre: 'Bruzual' },
            { id: 205, nombre: 'Cajigal' },
            { id: 206, nombre: 'Carvajal' },
            { id: 207, nombre: 'Guanta' },
            { id: 208, nombre: 'Independencia' },
            { id: 209, nombre: 'Libertad' },
            { id: 210, nombre: 'McGregor' },
            { id: 211, nombre: 'Miranda' },
            { id: 212, nombre: 'Monagas' },
            { id: 213, nombre: 'Peñalver' },
            { id: 214, nombre: 'Píritu' },
            { id: 215, nombre: 'San Juan de Capistrano' },
            { id: 216, nombre: 'Santa Ana' },
            { id: 217, nombre: 'Simón Bolívar' },
            { id: 218, nombre: 'Sotillo' },
            { id: 219, nombre: 'Urdaneta' }
        ],
        3: [
            { id: 301, nombre: 'Achaguas' },
            { id: 302, nombre: 'Biruaca' },
            { id: 303, nombre: 'Camejo' },
            { id: 304, nombre: 'Muñoz' },
            { id: 305, nombre: 'Páez' },
            { id: 306, nombre: 'Pedro Camejo' },
            { id: 307, nombre: 'Rómulo Gallegos' },
            { id: 308, nombre: 'San Fernando' }
        ],
        4: [
            { id: 401, nombre: 'Bolívar' },
            { id: 402, nombre: 'Camatagua' },
            { id: 403, nombre: 'Francisco Linares Alcántara' },
            { id: 404, nombre: 'Girardot' },
            { id: 405, nombre: 'José Ángel Lamas' },
            { id: 406, nombre: 'José Félix Ribas' },
            { id: 407, nombre: 'José Rafael Revenga' },
            { id: 408, nombre: 'Libertador' },
            { id: 409, nombre: 'Mario Briceño Iragorry' },
            { id: 410, nombre: 'Ocumare de la Costa de Oro' },
            { id: 411, nombre: 'San Casimiro' },
            { id: 412, nombre: 'San Sebastián' },
            { id: 413, nombre: 'Santiago Mariño' },
            { id: 414, nombre: 'Santos Michelena' },
            { id: 415, nombre: 'Sucre' },
            { id: 416, nombre: 'Tovar' },
            { id: 417, nombre: 'Urdaneta' },
            { id: 418, nombre: 'Zamora' }
        ],
        5: [
            { id: 501, nombre: 'Alberto Arvelo Torrealba' },
            { id: 502, nombre: 'Andrés Eloy Blanco' },
            { id: 503, nombre: 'Antonio José de Sucre' },
            { id: 504, nombre: 'Arismendi' },
            { id: 505, nombre: 'Barinas' },
            { id: 506, nombre: 'Bolívar' },
            { id: 507, nombre: 'Cruz Paredes' },
            { id: 508, nombre: 'Ezequiel Zamora' },
            { id: 509, nombre: 'Obispos' },
            { id: 510, nombre: 'Pedraza' },
            { id: 511, nombre: 'Rojas' },
            { id: 512, nombre: 'Sosa' }
        ],
        6: [
            { id: 601, nombre: 'Caroní' },
            { id: 602, nombre: 'Cedeño' },
            { id: 603, nombre: 'El Callao' },
            { id: 604, nombre: 'Gran Sabana' },
            { id: 605, nombre: 'Heres' },
            { id: 606, nombre: 'Piar' },
            { id: 607, nombre: 'Raúl Leoni' },
            { id: 608, nombre: 'Roscio' },
            { id: 609, nombre: 'Sifontes' },
            { id: 610, nombre: 'Sucre' },
            { id: 611, nombre: 'Padre Pedro Chien' }
        ],
        7: [
            { id: 701, nombre: 'Bejuma' },
            { id: 702, nombre: 'Carlos Arvelo' },
            { id: 703, nombre: 'Diego Ibarra' },
            { id: 704, nombre: 'Guacara' },
            { id: 705, nombre: 'Juan José Mora' },
            { id: 706, nombre: 'Libertador' },
            { id: 707, nombre: 'Los Guayos' },
            { id: 708, nombre: 'Miranda' },
            { id: 709, nombre: 'Montalbán' },
            { id: 710, nombre: 'Naguanagua' },
            { id: 711, nombre: 'Puerto Cabello' },
            { id: 712, nombre: 'San Diego' },
            { id: 713, nombre: 'San Joaquín' },
            { id: 714, nombre: 'Valencia' }
        ],
        8: [
            { id: 801, nombre: 'Anzoátegui' },
            { id: 802, nombre: 'Tinaquillo' },
            { id: 803, nombre: 'Girardot' },
            { id: 804, nombre: 'Lima Blanco' },
            { id: 805, nombre: 'Pao de San Juan Bautista' },
            { id: 806, nombre: 'Ricaurte' },
            { id: 807, nombre: 'Rómulo Gallegos' },
            { id: 808, nombre: 'San Carlos' },
            { id: 809, nombre: 'Tinaco' }
        ],
        9: [
            { id: 901, nombre: 'Antonio Díaz' },
            { id: 902, nombre: 'Casacoima' },
            { id: 903, nombre: 'Pedernales' },
            { id: 904, nombre: 'Tucupita' }
        ],
        10: [
            { id: 1001, nombre: 'Libertador' }
        ],
        11: [
            { id: 1101, nombre: 'Acosta' },
            { id: 1102, nombre: 'Bolívar' },
            { id: 1103, nombre: 'Buchivacoa' },
            { id: 1104, nombre: 'Cacique Manaure' },
            { id: 1105, nombre: 'Carirubana' },
            { id: 1106, nombre: 'Colina' },
            { id: 1107, nombre: 'Dabajuro' },
            { id: 1108, nombre: 'Democracia' },
            { id: 1109, nombre: 'Falcón' },
            { id: 1110, nombre: 'Federación' },
            { id: 1111, nombre: 'Jacura' },
            { id: 1112, nombre: 'Los Taques' },
            { id: 1113, nombre: 'Mauroa' },
            { id: 1114, nombre: 'Miranda' },
            { id: 1115, nombre: 'Monseñor Iturriza' },
            { id: 1116, nombre: 'Palmasola' },
            { id: 1117, nombre: 'Petit' },
            { id: 1118, nombre: 'Píritu' },
            { id: 1119, nombre: 'San Francisco' },
            { id: 1120, nombre: 'Silva' },
            { id: 1121, nombre: 'Sucre' },
            { id: 1122, nombre: 'Tocópero' },
            { id: 1123, nombre: 'Unión' },
            { id: 1124, nombre: 'Urumaco' },
            { id: 1125, nombre: 'Zamora' }
        ],
        12: [
            { id: 1201, nombre: 'Camaguán' },
            { id: 1202, nombre: 'Chaguaramas' },
            { id: 1203, nombre: 'El Socorro' },
            { id: 1204, nombre: 'Francisco de Miranda' },
            { id: 1205, nombre: 'José Félix Ribas' },
            { id: 1206, nombre: 'José Tadeo Monagas' },
            { id: 1207, nombre: 'Juan Germán Roscio' },
            { id: 1208, nombre: 'Julián Mellado' },
            { id: 1209, nombre: 'Las Mercedes' },
            { id: 1210, nombre: 'Leonardo Infante' },
            { id: 1211, nombre: 'Pedro Zaraza' },
            { id: 1212, nombre: 'Ortiz' },
            { id: 1213, nombre: 'San Gerónimo de Guayabal' },
            { id: 1214, nombre: 'San José de Guaribe' },
            { id: 1215, nombre: 'Santa María de Ipire' }
        ],
        13: [
            { id: 1301, nombre: 'Andrés Eloy Blanco' },
            { id: 1302, nombre: 'Crespo' },
            { id: 1303, nombre: 'Iribarren' },
            { id: 1304, nombre: 'Jiménez' },
            { id: 1305, nombre: 'Morán' },
            { id: 1306, nombre: 'Palavecino' },
            { id: 1307, nombre: 'Simón Planas' },
            { id: 1308, nombre: 'Torres' },
            { id: 1309, nombre: 'Urdaneta' }
        ],
        14: [
            { id: 1401, nombre: 'Alberto Adriani' },
            { id: 1402, nombre: 'Andrés Bello' },
            { id: 1403, nombre: 'Antonio Pinto Salinas' },
            { id: 1404, nombre: 'Aricagua' },
            { id: 1405, nombre: 'Arzobispo Chacón' },
            { id: 1406, nombre: 'Campo Elías' },
            { id: 1407, nombre: 'Caracciolo Parra Olmedo' },
            { id: 1408, nombre: 'Cardenal Quintero' },
            { id: 1409, nombre: 'Guaraque' },
            { id: 1410, nombre: 'Julio César Salas' },
            { id: 1411, nombre: 'Justo Briceño' },
            { id: 1412, nombre: 'Libertador' },
            { id: 1413, nombre: 'Miranda' },
            { id: 1414, nombre: 'Obispo Ramos de Lora' },
            { id: 1415, nombre: 'Padre Noguera' },
            { id: 1416, nombre: 'Pueblo Llano' },
            { id: 1417, nombre: 'Rangel' },
            { id: 1418, nombre: 'Rivas Dávila' },
            { id: 1419, nombre: 'Santos Marquina' },
            { id: 1420, nombre: 'Sucre' },
            { id: 1421, nombre: 'Tovar' },
            { id: 1422, nombre: 'Tulio Febres Cordero' },
            { id: 1423, nombre: 'Zea' }
        ],
        15: [
            { id: 1501, nombre: 'Acevedo' },
            { id: 1502, nombre: 'Andrés Bello' },
            { id: 1503, nombre: 'Baruta' },
            { id: 1504, nombre: 'Brión' },
            { id: 1505, nombre: 'Buroz' },
            { id: 1506, nombre: 'Carrizal' },
            { id: 1507, nombre: 'Chacao' },
            { id: 1508, nombre: 'Cristóbal Rojas' },
            { id: 1509, nombre: 'El Hatillo' },
            { id: 1510, nombre: 'Guaicaipuro' },
            { id: 1511, nombre: 'Independencia' },
            { id: 1512, nombre: 'Lander' },
            { id: 1513, nombre: 'Los Salias' },
            { id: 1514, nombre: 'Páez' },
            { id: 1515, nombre: 'Paz Castillo' },
            { id: 1516, nombre: 'Pedro Gual' },
            { id: 1517, nombre: 'Plaza' },
            { id: 1518, nombre: 'Simón Bolívar' },
            { id: 1519, nombre: 'Sucre' },
            { id: 1520, nombre: 'Urdaneta' },
            { id: 1521, nombre: 'Zamora' }
        ],
        16: [
            { id: 1601, nombre: 'Acosta' },
            { id: 1602, nombre: 'Aguasay' },
            { id: 1603, nombre: 'Bolívar' },
            { id: 1604, nombre: 'Caripe' },
            { id: 1605, nombre: 'Cedeño' },
            { id: 1606, nombre: 'Ezequiel Zamora' },
            { id: 1607, nombre: 'Libertador' },
            { id: 1608, nombre: 'Maturín' },
            { id: 1609, nombre: 'Piar' },
            { id: 1610, nombre: 'Punceres' },
            { id: 1611, nombre: 'Santa Bárbara' },
            { id: 1612, nombre: 'Sotillo' },
            { id: 1613, nombre: 'Uracoa' }
        ],
        17: [
            { id: 1701, nombre: 'Antolín del Campo' },
            { id: 1702, nombre: 'Arismendi' },
            { id: 1703, nombre: 'Díaz' },
            { id: 1704, nombre: 'García' },
            { id: 1705, nombre: 'Gómez' },
            { id: 1706, nombre: 'Maneiro' },
            { id: 1707, nombre: 'Marcano' },
            { id: 1708, nombre: 'Mariño' },
            { id: 1709, nombre: 'Península de Macanao' },
            { id: 1710, nombre: 'Tubores' },
            { id: 1711, nombre: 'Villalba' }
        ],
        18: [
            { id: 1801, nombre: 'Agua Blanca' },
            { id: 1802, nombre: 'Araure' },
            { id: 1803, nombre: 'Esteller' },
            { id: 1804, nombre: 'Guanare' },
            { id: 1805, nombre: 'Guanarito' },
            { id: 1806, nombre: 'Monseñor José Vicente de Unda' },
            { id: 1807, nombre: 'Ospino' },
            { id: 1808, nombre: 'Páez' },
            { id: 1809, nombre: 'Papelón' },
            { id: 1810, nombre: 'San Genaro de Boconoíto' },
            { id: 1811, nombre: 'San Rafael de Onoto' },
            { id: 1812, nombre: 'Santa Rosalía' },
            { id: 1813, nombre: 'Sucre' },
            { id: 1814, nombre: 'Turén' }
        ],
        19: [
            { id: 1901, nombre: 'Andrés Eloy Blanco' },
            { id: 1902, nombre: 'Andrés Mata' },
            { id: 1903, nombre: 'Arismendi' },
            { id: 1904, nombre: 'Benítez' },
            { id: 1905, nombre: 'Bermúdez' },
            { id: 1906, nombre: 'Bolívar' },
            { id: 1907, nombre: 'Cajigal' },
            { id: 1908, nombre: 'Cruz Salmerón Acosta' },
            { id: 1909, nombre: 'Libertador' },
            { id: 1910, nombre: 'Mariño' },
            { id: 1911, nombre: 'Mejía' },
            { id: 1912, nombre: 'Montes' },
            { id: 1913, nombre: 'Ribero' },
            { id: 1914, nombre: 'Sucre' },
            { id: 1915, nombre: 'Valdez' }
        ],
        20: [
            { id: 2001, nombre: 'Andrés Bello' },
            { id: 2002, nombre: 'Antonio Rómulo Costa' },
            { id: 2003, nombre: 'Ayacucho' },
            { id: 2004, nombre: 'Bolívar' },
            { id: 2005, nombre: 'Cárdenas' },
            { id: 2006, nombre: 'Córdoba' },
            { id: 2007, nombre: 'Fernández Feo' },
            { id: 2008, nombre: 'Francisco de Miranda' },
            { id: 2009, nombre: 'García de Hevia' },
            { id: 2010, nombre: 'Guásimos' },
            { id: 2011, nombre: 'Independencia' },
            { id: 2012, nombre: 'Jáuregui' },
            { id: 2013, nombre: 'José María Vargas' },
            { id: 2014, nombre: 'Junín' },
            { id: 2015, nombre: 'Libertad' },
            { id: 2016, nombre: 'Libertador' },
            { id: 2017, nombre: 'Lobatera' },
            { id: 2018, nombre: 'Michelena' },
            { id: 2019, nombre: 'Panamericano' },
            { id: 2020, nombre: 'Pedro María Ureña' },
            { id: 2021, nombre: 'Rafael Urdaneta' },
            { id: 2022, nombre: 'Samuel Darío Maldonado' },
            { id: 2023, nombre: 'San Cristóbal' },
            { id: 2024, nombre: 'Seboruco' },
            { id: 2025, nombre: 'Simón Rodríguez' },
            { id: 2026, nombre: 'Sucre' },
            { id: 2027, nombre: 'Torbes' },
            { id: 2028, nombre: 'Uribante' },
            { id: 2029, nombre: 'San Judas Tadeo' }
        ],
        21: [
            { id: 2101, nombre: 'Andrés Bello' },
            { id: 2102, nombre: 'Boconó' },
            { id: 2103, nombre: 'Bolívar' },
            { id: 2104, nombre: 'Candelaria' },
            { id: 2105, nombre: 'Carache' },
            { id: 2106, nombre: 'Escuque' },
            { id: 2107, nombre: 'José Felipe Márquez Cañizalez' },
            { id: 2108, nombre: 'Juan Vicente Campo Elías' },
            { id: 2109, nombre: 'La Ceiba' },
            { id: 2110, nombre: 'Miranda' },
            { id: 2111, nombre: 'Monte Carmelo' },
            { id: 2112, nombre: 'Motatán' },
            { id: 2113, nombre: 'Pampán' },
            { id: 2114, nombre: 'Pampanito' },
            { id: 2115, nombre: 'Rafael Rangel' },
            { id: 2116, nombre: 'San Rafael de Carvajal' },
            { id: 2117, nombre: 'Sucre' },
            { id: 2118, nombre: 'Trujillo' },
            { id: 2119, nombre: 'Urdaneta' },
            { id: 2120, nombre: 'Valera' }
        ],
        22: [
            { id: 2201, nombre: 'Vargas' }
        ], 
        23: [
            { id: 2301, nombre: 'Arístides Bastidas' },
            { id: 2302, nombre: 'Bolívar' },
            { id: 2303, nombre: 'Bruzual' },
            { id: 2304, nombre: 'Cocorote' },
            { id: 2305, nombre: 'Independencia' },
            { id: 2306, nombre: 'José Antonio Páez' },
            { id: 2307, nombre: 'La Trinidad' },
            { id: 2308, nombre: 'Manuel Monge' },
            { id: 2309, nombre: 'Nirgua' },
            { id: 2310, nombre: 'Peña' },
            { id: 2311, nombre: 'San Felipe' },
            { id: 2312, nombre: 'Sucre' },
            { id: 2313, nombre: 'Urachiche' },
            { id: 2314, nombre: 'Veroes' }
        ],
        24: [
            { id: 2401, nombre: 'Almirante Padilla' },
            { id: 2402, nombre: 'Baralt' },
            { id: 2403, nombre: 'Cabimas' },
            { id: 2404, nombre: 'Catatumbo' },
            { id: 2405, nombre: 'Colón' },
            { id: 2406, nombre: 'Francisco Javier Pulgar' },
            { id: 2407, nombre: 'Jesús Enrique Lossada' },
            { id: 2408, nombre: 'Jesús María Semprún' },
            { id: 2409, nombre: 'La Cañada de Urdaneta' },
            { id: 2410, nombre: 'Lagunillas' },
            { id: 2411, nombre: 'Machiques de Perijá' },
            { id: 2412, nombre: 'Mara' },
            { id: 2413, nombre: 'Maracaibo' },
            { id: 2414, nombre: 'Miranda' },
            { id: 2415, nombre: 'Páez' },
            { id: 2416, nombre: 'Rosario de Perijá' },
            { id: 2417, nombre: 'San Francisco' },
            { id: 2418, nombre: 'Santa Rita' },
            { id: 2419, nombre: 'Simón Bolívar' },
            { id: 2420, nombre: 'Sucre' },
            { id: 2421, nombre: 'Valmore Rodríguez' }
        ]
    };
    const municipioSelect = document.getElementById('municipio');
    municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>'; // Limpiar

    if (municipios[estadoId]) {
        municipios[estadoId].forEach(function(municipio) {
            const option = document.createElement('option');
            option.value = municipio.id;
            option.textContent = municipio.nombre;
            municipioSelect.appendChild(option);
        });
    }
}

