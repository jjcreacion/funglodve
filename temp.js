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

    // Salud
    
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
    
    // Insertar Salud
    
    /*$.ajax({
        url: './controllers/saludController.php',
        method: 'POST',
        data: {
            enfermedad: enfermedad,
            especifique: especifiqueSalud,
            diagnostico: diagnostico,
            tratamiento: tratamiento,
            cumple: cumple,
            institucion: institucionSalud,
            discapacitado: discapacitado,
            indique: indiqueSalud,
            insert: insertSalud,
            id: idGloriaHistorial
        },
        success: function(response) {
            insert1 = true;
            alert(response);
        },
        error: function(error) {
            sAlert("error","Error en cargar datos de salud");
            $('#staticBackdrop').modal('hide');
            habiliarHistorial();
        }
    });*/

    // Educacion
    let grado = $('#grado').val();
    let estudia = $('input[name="estudia"]:checked').val(); 
    if (estudia === undefined) { estudia = null; }
    let indiqueEducacion = $('#indiqueEducacion').val();
    let mision = $('input[name="mision"]:checked').val(); 
    if (mision === undefined) { mision = null; }
    let cualEducacion = $('#cualEducacion').val();

    // Insertar Educacion
    $.ajax({
        url: './controllers/educacionController.php',
        method: 'POST',
        data: {
            grado: grado,
            estudia: estudia,
            indique: indiqueEducacion,
            mision: mision,
            cual: cualEducacion,
            insert: insertEducacion,
            id: idGloriaHistorial
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
            posee: posee,
            ubicacion: ubicacion,
            condiciones: condiciones,
            especifique: especifiqueVivienda,
            tipo: tipo,
            anyos: anyos,
            insert: insertVivienda,
            id: idGloriaHistorial
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
    
    let lcasa = $('#lcasa').val();
    let lfundacion = $('#lfundacion').val();
    let lotro = $('#lotro').val();

    // Insertar Alimentacion
    $.ajax({
        url: './controllers/alimentacionController.php',
        method: 'POST',
        data: {
            balanceada: balanceada,
            dieta: dieta,
            lcasa: lcasa,
            lfundacion: lfundacion,
            lotro: lotro,
            insert: insertAlimentacion,
            id: idGloriaHistorial
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
            id: idGloriaHistorial
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
    let pasear = $('#pasear').val();
    let jugar = $('#jugar').val();
    let compartir = $('#compartir').val();
    let playa = $('#playa').val();
    let cine = $('#cine').val();
    let otroRecreacion = $('#otroRecreacion').val();
    let cantar = $('#cantar').val();
    let bailar = $('#bailar').val();
    let actuar = $('#actuar').val();
    let recitar = $('#recitar').val();
    let escribir = $('#escribir').val();
    let pintar = $('#pintar').val();
    let cotro = $('#cotro').val();

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
            id: idGloriaHistorial
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

    habiliarHistorial();
    $('#ModalHistorial').modal('hide'); // Ocultar modal
    sAlert("success","Datos guardados con éxito");
    limpiarHistorial();
});