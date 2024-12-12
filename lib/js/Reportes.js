$(document).ready(function() {
    let arraySubsedeNombre = [];
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
                arrayBecados.push(item.total_becados);
                arrayNoBecados.push(item.total_no_becados);

                $('#subsedeBus').append(new Option(item.descripcion_subsede, item.descripcion_subsede));
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

    $('#subsedeBus').change(function() { 
        let subsedeBus = $(this).val(); 
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
    
});
