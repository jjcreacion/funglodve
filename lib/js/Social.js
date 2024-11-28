$(document).ready(function () {

$(document).on('click', '#btn-GuardarSocial', function() {
    var insertSalud, insertEducacion, insertVivienda, insertAlimentacion, insertIvss, insertRecreacion;
    insertSalud = insertEducacion = insertVivienda = insertAlimentacion = insertIvss = insertRecreacion = true;

    if($('#salud').val() == '1') insertSalud = false;
    if($('#educacion').val() == '1') insertEducacion = false;
    if($('#vivienda').val() == '1') insertVivienda = false;
    if($('#alimentacion').val() == '1') insertAlimentacion = false;
    if($('#ivss').val() == '1') insertIvss = false;
    if($('#recreacion').val() == '1') insertRecreacion = false;

    let insert1, insert2, insert3, insert4, insert5, insert6; 
    insert1 = insert2 = insert3 = insert4 = insert5 = insert6 = false;

    let idGloriaSocial = $('#idGloriaSocial').val();

    // Salud Insertar Datos Salud Salud
    let enfermedad = $('input[name="enfermedad"]:checked').val(); 
    if (enfermedad === undefined) { enfermedad = null; }
    let especifiqueSalud = $('#especifique').val();
    let diagnostico = $('#diagnostico').val();
    let tratamiento = $('#tratamiento').val();
    let cumple = $('input[name="cumple"]:checked').val(); 
    if (cumple === undefined) { cumple = null; }
    let institucionSalud = $('#institucion').val();
    let discapacitado = $('input[name="discapacitado"]:checked').val(); 
    if (discapacitado === undefined) { discapacitado = null; }
    let indiqueSalud = $('#indique').val();

    $.ajax({
        url: './controllers/saludController.php',
        method: 'POST',
        data: {
            id_gloria: idGloriaSocial,
            enfermedad: enfermedad,
            especifique: especifiqueSalud,
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            cumple: cumple,
            institucion: institucionSalud,
            discapacitado: discapacitado ,
            indique: indiqueSalud,
            insert: insertSalud
        },
        success: function(response) {
            insert1 = true;
        },
        error: function(error) {
            sAlert("error","Error en cargar datos de salud");
            $('#staticBackdrop').modal('hide');
            habiliarHistorial();
        }
    });  
    
     // Educacion
     let grado = $('#grado').val();
     let estudia = $('input[name="estudia"]:checked').val(); 
     if (estudia === undefined) { estudia = null; }
     let indiqueEducacion = $('#indiqueEducacion').val();
     let mision = $('input[name="mision"]:checked').val(); 
     if (mision === undefined) { mision = null; }
     let cualMision = $('#cualMision').val();
     /**/
     // Insertar Educacion
     $.ajax({
         url: './controllers/educacionController.php',
         method: 'POST',
         data: {
            id_gloria: idGloriaSocial,
            grado: grado,
            estudia: estudia,
            indique: indiqueEducacion,
            mision: mision,
            cual: cualMision,
            insert: insertEducacion,
         },
         success: function(response) {
             insert2 = true;
         },
         error: function(error) {
             sAlert("error","Error en cargar datos de educación");
             $('#staticBackdrop').modal('hide');
             habiliarHistorial();
         }
     });  
    
     // Vivienda
    let posee = $('input[name="posee"]:checked').val(); 
    if (posee === undefined) { posee = null;  }
    let ubicacion = $('#ubicacion').val();
    let condiciones = $('input[name="condiciones"]:checked').val(); 
    if (condiciones === undefined) { condiciones = null; }
    let especifiqueVivienda = $('#especifiqueVivienda').val();
    let tipo = $('input[name="tipo"]:checked').val(); 
    if (tipo === undefined) { tipo = null; }
    let anyos = $('#anyos').val();

    // Insertar Vivienda
    $.ajax({
        url: './controllers/viviendaController.php',
        method: 'POST',
        data: {
            id_gloria: idGloriaSocial,
            posee: posee,
            ubicacion: ubicacion,
            condiciones: condiciones,
            especifique: especifiqueVivienda,
            tipo: tipo,
            anyos: anyos,
            insert: insertVivienda
        },
        success: function(response) {
            insert3 = true;
        },
        error: function(error) {
            sAlert("error","Error en cargar datos de vivienda");
            $('#staticBackdrop').modal('hide');
            habiliarHistorial();
        }
    });

    // Alimentacion
    let balanceada = $('input[name="balanceada"]:checked').val(); 
    if (balanceada === undefined) { balanceada = null;  }
    
    let dieta = $('input[name="dieta"]:checked').val(); 
    if (dieta === undefined) { dieta = null;  }
    
    let lcasa = $('#lcasa').is(':checked') ? 1 : 0;
    let lfundacion = $('#lfundacion').is(':checked') ? 1 : 0;
    let lotro = $('#lotro').is(':checked') ? 1 : 0;
    
    // Insertar Alimentacion
    $.ajax({
        url: './controllers/alimentacionController.php',
        method: 'POST',
        data: {
            id_gloria: idGloriaSocial,
            balanceada: balanceada,
            dieta: dieta,
            lcasa: lcasa,
            lfundacion: lfundacion,
            lotro: lotro,
            insert: insertAlimentacion,
        },
        success: function(response) {
            insert4 = true;
        },
        error: function(error) {
            sAlert("error","Error en cargar datos de alimentación");
            $('#staticBackdrop').modal('hide');
            habiliarHistorial();
        }
    });

      // IVSS
      let cotiza = $('input[name="cotiza"]:checked').val(); 
      if (cotiza === undefined) { cotiza = null;  }
      
      let semanas = $('#semanas').val();
      let estadoIvss = $('#estadoIvss').val();
      let empresa = $('#empresa').val();
      let anyosIvss = $('#anyosIvss').val();
  
      // Insertar IVSS
      $.ajax({
          url: './controllers/ivssController.php',
          method: 'POST',
          data: {
              cotiza: cotiza,
              semanas: semanas,
              estado: estadoIvss,
              empresa: empresa,
              anyos: anyosIvss,
              insert: insertIvss,
              id_gloria: idGloriaSocial
          },
          success: function(response) {
              insert5 = true;
          },
          error: function(error) {
              sAlert("error","Error en cargar datos de IVSS");
              $('#staticBackdrop').modal('hide');
              habiliarHistorial();
          }
      });

     // Recreacion
     let pertenece = $('input[name="pertenece"]:checked').val(); 
     if (pertenece === undefined) { pertenece = null;  }

     let indiqueRecreacion = $('#indiqueRecreacion').val();

     let pasear = $('#pasear').is(':checked') ? 1 : 0;
     let jugar = $('#jugar').is(':checked') ? 1 : 0;
     let compartir = $('#compartir').is(':checked') ? 1 : 0;
     let playa = $('#playa').is(':checked') ? 1 : 0;
     let cine = $('#cine').is(':checked') ? 1 : 0;
     let otroRecreacion = $('#rec_otro').is(':checked') ? 1 : 0;
     let cantar = $('#cantar').is(':checked') ? 1 : 0;
     let bailar = $('#bailar').is(':checked') ? 1 : 0;
     let actuar = $('#actuar').is(':checked') ? 1 : 0;
     let recitar = $('#recitar').is(':checked') ? 1 : 0;
     let escribir = $('#escribir').is(':checked') ? 1 : 0;
     let pintar = $('#pintar').is(':checked') ? 1 : 0;
     let cotro = $('#cotro').is(':checked') ? 1 : 0;
 
     // Insertar Recreacion
     $.ajax({
         url: './controllers/recreacionController.php',
         method: 'POST',
         data: {
             pertenece: pertenece,
             indique: indiqueRecreacion,
             pasear: pasear,
             jugar: jugar,
             compartir: compartir,
             playa: playa,
             cine: cine,
             otro: otroRecreacion,
             cantar: cantar,
             bailar: bailar,
             actuar: actuar,
             recitar: recitar,
             escribir: escribir,
             pintar: pintar,
             cotro: cotro,
             insert: insertRecreacion,
             id_gloria: idGloriaSocial
         },
         success: function(response) {
             insert6 = true;
         },
         error: function(error) {
             sAlert("error","Error en cargar datos de recreación");
             $('#staticBackdrop').modal('hide');
             habiliarHistorial();
         }
     });

    habiliarSocial();
    $('#ModalHistorial').modal('hide'); // Ocultar modal
    sAlert("success","Datos guardados con éxito");
    limpiarSocial();
    });
    
$(document).on('click', '#btn-social', function() {
    limpiarSocial();
    let id = $(this).data('id');
    
    $('#idGloriaSocial').val(id);

    // Salud
    $.ajax({
        url: './controllers/saludController.php',
        method: 'GET',
        data: { idgloria: id },
        success: function(response) {
            let saludDetalle = JSON.parse(response); 
            if(Object.keys(saludDetalle).length > 0){
                $('#salud').val('1');
            }

            if (saludDetalle.enfermedad == 1) {
                $('#enf_opcion1').prop('checked', true);
            } else if (saludDetalle.enfermedad == 2) {
                $('#enf_opcion2').prop('checked', true);
            }

            $('#especifique').val(saludDetalle.especifique);
            $('#diagnostico').val(saludDetalle.diagnostico);
            $('#tratamiento').val(saludDetalle.tratamiento);

            if (saludDetalle.cumple == 1) {
                $('#cum_opcion1').prop('checked', true);
            } else if (saludDetalle.cumple == 2) {
                $('#cum_opcion2').prop('checked', true);
            }

            $('#institucion').val(saludDetalle.institucion);
            
            if (saludDetalle.discapacitado == 1) {
                $('#disc_opcion1').prop('checked', true);
            } else if (saludDetalle.discapacitado == 2) {
                $('#disc_opcion2').prop('checked', true);
            }
            $('#indique').val(saludDetalle.indique);
          },
        error: function(error) {
            sAlert("error","Error en cargar datos de salud");
            console.log(error);
        }
    });

    // Educacion
    $.ajax({
        url: './controllers/educacionController.php',
        method: 'GET',
        data: { idgloria: id },
        success: function(response) {
            let educacionDetalle = JSON.parse(response); 
            if(Object.keys(educacionDetalle).length > 0){
                $('#educacion').val('1');
            }
            $('#grado').val(educacionDetalle.grado);
            
            if (educacionDetalle.estudia == 1) {
                $('#estu_opcion1').prop('checked', true);
            } else if (educacionDetalle.estudia == 2) {
                $('#estu_opcion2').prop('checked', true);
            }

            $('#indiqueEducacion').val(educacionDetalle.indique);
            
            if (educacionDetalle.mision == 1) {
                $('#misi_opcion1').prop('checked', true);
            } else if (educacionDetalle.mision == 2) {
                $('#misi_opcion2').prop('checked', true);
            }

            $('#cualMision').val(educacionDetalle.cual);
          },
        error: function(error) {
            sAlert("error","Error en cargar datos de educación");
            console.log(error);
        }
    });

    // Vivienda
    $.ajax({
        url: './controllers/viviendaController.php',
        method: 'GET',
        data: { idgloria: id },
        success: function(response) {
            let viviendaDetalle = JSON.parse(response); 
            if(Object.keys(viviendaDetalle).length > 0){
                $('#vivienda').val('1');
            }

            if (viviendaDetalle.posee == 1) {
                $('#pos_opcion1').prop('checked', true);
            } else if (viviendaDetalle.posee == 2) {
                $('#pos_opcion2').prop('checked', true);
            }

            $('#ubicacion').val(viviendaDetalle.ubicacion);
            
            if (viviendaDetalle.condiciones == 1) {
                $('#cond_opcion1').prop('checked', true);
            } else if (viviendaDetalle.condiciones == 2) {
                $('#cond_opcion2').prop('checked', true);
            }
            
            $('#especifiqueVivienda').val(viviendaDetalle.especifique);
            
            if (viviendaDetalle.tipo == 1) {
                $('#tipo_opcion1').prop('checked', true);
            } else if (viviendaDetalle.tipo == 2) {
                $('#tipo_opcion2').prop('checked', true);
            }
            $('#anyos').val(viviendaDetalle.anyos);
          },
        error: function(error) {
            sAlert("error","Error en cargar datos de vivienda");
            console.log(error);
        }
    });

    // Alimentacion
    $.ajax({
        url: './controllers/alimentacionController.php',
        method: 'GET',
        data: { idgloria: id },
        success: function(response) {
            let alimentacionDetalle = JSON.parse(response); 
            if(Object.keys(alimentacionDetalle).length > 0){
                $('#alimentacion').val('1');
            }
           
            if (alimentacionDetalle.balanceada == 1) {
                $('#bal_opcion1').prop('checked', true);
            } else if (alimentacionDetalle.balanceada == 2) {
                $('#bal_opcion2').prop('checked', true);
            }

            if (alimentacionDetalle.dieta == 1) {
                $('#diet_opcion1').prop('checked', true);
            } else if (alimentacionDetalle.dieta == 2) {
                $('#diet_opcion2').prop('checked', true);
            }
            
            if (alimentacionDetalle.lcasa == 1) {
                $('#lcasa').prop('checked', true);
            }
            if (alimentacionDetalle.lfundacion == 1) {
                $('#lfundacion').prop('checked', true);
            }
            if (alimentacionDetalle.lotro == 1) {
                $('#lotro').prop('checked', true);
            }

          },
        error: function(error) {
            sAlert("error","Error en cargar datos de alimentación");
            console.log(error);
        }
    });

    // IVSS
    $.ajax({
        url: './controllers/ivssController.php',
        method: 'GET',
        data: { idgloria: id },
        success: function(response) {
            let ivssDetalle = JSON.parse(response); 
            if(Object.keys(ivssDetalle).length > 0){
                $('#ivss').val('1');
            }
            
            if (ivssDetalle.cotiza == 1) {
                $('#cot_opcion1').prop('checked', true);
            } else if (ivssDetalle.cotiza == 2) {
                $('#cot_opcion2').prop('checked', true);
            }

            $('#semanas').val(ivssDetalle.semanas);
            $('#estadoIvss').val(ivssDetalle.estado);
            $('#empresa').val(ivssDetalle.empresa);
            $('#anyosIvss').val(ivssDetalle.anyos);
          },
        error: function(error) {
            sAlert("error","Error en cargar datos de IVSS");
            console.log(error);
        }
    });

    // Recreacion
    $.ajax({
        url: './controllers/recreacionController.php',
        method: 'GET',
        data: { idgloria: id },
        success: function(response) {
            let recreacionDetalle = JSON.parse(response); 
            if(Object.keys(recreacionDetalle).length > 0){
                $('#recreacion').val('1');
            }
           
            if (recreacionDetalle.pasear == 1) {
                $('#pasear').prop('checked', true);
            }
            if (recreacionDetalle.jugar == 1) {
                $('#jugar').prop('checked', true);
            }
            if (recreacionDetalle.compartir == 1) {
                $('#compartir').prop('checked', true);
            }
            if (recreacionDetalle.playa == 1) {
                $('#playa').prop('checked', true);
            }
            if (recreacionDetalle.cine == 1) {
                $('#cine').prop('checked', true);
            }
            if (recreacionDetalle.otro == 1) {
                $('#rec_otro').prop('checked', true);
            }

            if (recreacionDetalle.cantar == 1) {
                $('#cantar').prop('checked', true);
            }
            if (recreacionDetalle.bailar == 1) {
                $('#bailar').prop('checked', true);
            }
            if (recreacionDetalle.actuar == 1) {
                $('#actuar').prop('checked', true);
            }
            if (recreacionDetalle.recitar == 1) {
                $('#recitar').prop('checked', true);
            }
            if (recreacionDetalle.escribir == 1) {
                $('#escribir').prop('checked', true);
            }
            if (recreacionDetalle.pintar == 1) {
                $('#pintar').prop('checked', true);
            }
            if (recreacionDetalle.cotro == 1) {
                $('#cotro').prop('checked', true);
            }
           
            if (recreacionDetalle.pertenece == 1) {
                $('#grupo_opcion1').prop('checked', true);
            } else if (recreacionDetalle.pertenece == 2){
                $('#grupo_opcion2').prop('checked', true);
            }

            $('#indiqueRecreacion').val(recreacionDetalle.indique);
           
          },
        error: function(error) {
            sAlert("error","Error en cargar datos de recreación");
            console.log(error);
        }
     });
  });

  
});

function limpiarSocial(){

    $('input[name="enfermedad"]').prop('checked', false);
    $('#especifique').val('');
    $('#diagnostico').val('');
    $('#tratamiento').val('');
    $('input[name="cumple"]').prop('checked', false);
    $('#institucion').val('');
    $('input[name="discapacitado"]').prop('checked', false);
    $('#indique').val('');

    $('#grado').val('');
    $('input[name="estudia"]:checked').prop('checked', false);
    $('#indiqueEducacion').val('');
    $('input[name="mision"]:checked').prop('checked', false);
    $('#cualEducacion').val('');

    $('input[name="posee"]:checked').prop('checked', false);
    $('#ubicacion').val('');
    $('input[name="condiciones"]:checked').prop('checked', false);
    $('#especifiqueVivienda').val('');
    $('input[name="tipo"]:checked').prop('checked', false);
    $('#anyos').val('');

    $('input[name="balanceada"]:checked').prop('checked', false);
    $('input[name="dieta"]:checked').prop('checked', false);
    $('#lcasa').prop('checked', false);
    $('#lfundacion').prop('checked', false);
    $('#lotro').prop('checked', false);

    $('input[name="cotiza"]:checked').prop('checked', false);
    $('#semanas').val('');
    $('#estadoIvss').val('');
    $('#empresa').val('');
    $('#anyosIvss').val('');

    $('input[name="pertenece"]:checked').prop('checked', false); 
    
    $('#indiqueRecreacion').val();
    $('#pasear').prop('checked', false);
    $('#jugar').prop('checked', false);
    $('#compartir').prop('checked', false);
    $('#playa').prop('checked', false);
    $('#cine').prop('checked', false);
    $('#rec_otro').prop('checked', false);
    $('#cantar').prop('checked', false);
    $('#bailar').prop('checked', false);
    $('#actuar').prop('checked', false);
    $('#recitar').prop('checked', false);
    $('#escribir').prop('checked', false);
    $('#pintar').prop('checked', false);
    $('#cotro').prop('checked', false);
}
