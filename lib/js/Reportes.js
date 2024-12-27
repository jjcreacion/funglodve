$(document).ready(function() {
    let arraySubsedeNombre = [];
    let arraySubsedeId = [];
    let arrayBecados = [];
    let arrayNoBecados = [];

    function toggleInputs() { 
        if ($('#subsede').is(':checked')) { 
            $('#subsedeBus').prop('disabled', false);
            $('#estado').prop('disabled', true);
            $('#municipio').prop('disabled', true); 
        } else if ($('#municipioBus').is(':checked')) { 
            $('#subsedeBus').prop('disabled', true);
            $('#estado').prop('disabled', false);
            $('#municipio').prop('disabled', false); }
    } 

    toggleInputs(); 
    
    $('input[name="busqueda"]').change(function() { 
     toggleInputs(); 
        $('#totalGeneral .badge').text('0'); 
        $('#becados .badge').text('0');
        $('#noBecados .badge').text('0'); 
    });

    $.ajax({
        url: './controllers/reportesController.php', 
        method: 'GET',
        success: function(data) {
            let response = JSON.parse(data);

            $('#subsedeBus').empty();
            $('#subsedeBus').append(new Option('', ''));

            response.forEach(function(item) {
                arraySubsedeNombre.push(item.descripcion_subsede);
                arraySubsedeId.push(item.id_subsede);
                arrayBecados.push(item.total_becados);
                arrayNoBecados.push(item.total_no_becados);

                $('#subsedeBus').append(new Option(item.descripcion_subsede, item.id_subsede));
            });

            // Crear la gráfica después de obtener los datos
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: arraySubsedeNombre, 
                    datasets: [{
                        label: 'Becados',
                        data: arrayBecados, 
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'No Becados',
                        data: arrayNoBecados, 
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        },
        error: function(error) {
            alert("Error al cargar los datos de glorias");
            console.log(error);
        }
    });

    $.ajax({
        url: './controllers/reportesController.php', 
        method: 'POST',
        data: {
            tipoBusqueda: 'municipio',
        },
        success: function(data) {
            let response = JSON.parse(data);
          },
        error: function(error) {
            alert("Error al cargar los datos de glorias");
            console.log(error);
        }
    });

    $('#subsedeBus').change(function() { 
        let subsedeBus = $('#subsedeBus').find('option:selected').text(); 
        let selectedIndex = arraySubsedeNombre.indexOf(subsedeBus);
         if (selectedIndex !== -1) { 
            let totalBecados = arrayBecados[selectedIndex]; 
            let totalNoBecados = arrayNoBecados[selectedIndex]; 
            let totalGeneral = totalBecados + totalNoBecados; 
            $('#totalGeneral .badge').text(totalGeneral); 
            $('#becados .badge').text(totalBecados);
            $('#noBecados .badge').text(totalNoBecados); 
        } 
    });

    $('#municipio').change(function() { 
        let municipio = $(this).val(); 
        
        $('#totalGeneral .badge').text('0'); 
        $('#becados .badge').text('0');
        $('#noBecados .badge').text('0'); 
         
    });

    $(document).on('click', '#totalGeneral', function() {
    $('#listado-body').empty(); 
    let subsedeBus = $('#subsedeBus').val();   
     $('#nomina-title').text('REPORTE TOTAL: ' + $('#subsedeBus').find('option:selected').text());

     $.ajax({
        url: './controllers/reportesController.php', 
        method: 'POST',
        data: {
            tipoBusqueda: 'subsede',
            tipo: 'total',
            subsede: subsedeBus
        },
        success: function(data) {
            let response = JSON.parse(data);
   
            response.forEach(function(item, index) { 
                let row = `<tr> <td>${index + 1}</td> 
                <td>${item.cedula}</td> 
                <td>${item.nombre}</td> 
                <td>${item.apellido}</td> 
                </tr>`; 
            $('#listado-body').append(row); 
           });

        },
        error: function(error) {
            alert("Error al cargar los datos de glorias");
            console.log(error);
        }
    });

    });

    $(document).on('click', '#becados', function() {
        $('#listado-body').empty(); 
        let subsedeBus = $('#subsedeBus').val();   
        $('#nomina-title').text('BECADOS: ' + $('#subsedeBus').find('option:selected').text());
   
        $.ajax({
           url: './controllers/reportesController.php', 
           method: 'POST',
           data: {
               tipoBusqueda: 'subsede',
               tipo: 'becados',
               subsede: subsedeBus
           },
           success: function(data) {
               let response = JSON.parse(data);
               response.forEach(function(item, index) { 
                   let row = `<tr> <td>${index + 1}</td> 
                   <td>${item.cedula}</td> 
                   <td>${item.nombre}</td> 
                   <td>${item.apellido}</td> 
                   </tr>`; 
               $('#listado-body').append(row); 
              });
   
           },
           error: function(error) {
               alert("Error al cargar los datos de glorias");
               console.log(error);
           }
       });
    });

    $(document).on('click', '#noBecados', function() {
        $('#listado-body').empty(); 
        let subsedeBus = $('#subsedeBus').val();   
        $('#nomina-title').text('BECADOS: ' + $('#subsedeBus').find('option:selected').text());
   
        $.ajax({
           url: './controllers/reportesController.php', 
           method: 'POST',
           data: {
               tipoBusqueda: 'subsede',
               tipo: 'nobecados',
               subsede: subsedeBus
           },
           success: function(data) {
               let response = JSON.parse(data);
               response.forEach(function(item, index) { 
                   let row = `<tr> <td>${index + 1}</td> 
                   <td>${item.cedula}</td> 
                   <td>${item.nombre}</td> 
                   <td>${item.apellido}</td> 
                   </tr>`; 
               $('#listado-body').append(row); 
              });
   
           },
           error: function(error) {
               alert("Error al cargar los datos de glorias");
               console.log(error);
           }
       });
    });
       
});
