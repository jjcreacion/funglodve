let subsedes;
let arraySubsedeNombre = [];
         

$(document).ready(function() {

    let glorias = [];
    let beneficios = [];

    $.ajax({
        url: './controllers/gloriasController.php', 
        method: 'GET',
        success: function(data) {
            glorias = JSON.parse(data);
            verificarBeneficios();
        },
        error: function(error) {
            alert("Error al cargar los datos de glorias");
            console.log(error);
        }
    });

    $.ajax({
        url: './controllers/beneficiosController.php',
        method: 'GET',
        success: function(response) {
            beneficios = JSON.parse(response); 
            verificarBeneficios();
        },
       
    });

    /*
    function verificarBeneficios() {
        if (glorias.length === 0 || beneficios.length === 0) return;

        let gloriasConBeneficios = [];
        let gloriasSinBeneficios = [];

        glorias.forEach(function(gloria) {
            let tieneBeneficio = beneficios.some(function(beneficio) {
                console.log("Id gloria= "+glorias.id+" Beneficio Id_gloria="+beneficio.id_gloria);
                return beneficio.id_gloria === gloria.id;
            });

            if (tieneBeneficio) {
                gloriasConBeneficios.push(gloria);
            } else {
                gloriasSinBeneficios.push(gloria);
            }
        });

        console.log("Glorias con beneficios:", gloriasConBeneficios.length);
        console.log("Glorias sin beneficios:", gloriasSinBeneficios.length);

    } */

    $.ajax({
        url: './controllers/subsedesController.php', 
        method: 'GET',
        success: function(data) {
            subsedes = JSON.parse(data);
            subsedes.forEach(function(subsede) {
                arraySubsedeNombre.push(subsede.nombre);
            });
            arraySubsedeNombre.sort(); 

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: arraySubsedeNombre, 
                    datasets: [{
                        label: 'Becados',
                        data: [10, 20, 30, 40, 50, 60, 70, 10, 20, 30, 40, 50, 10, 20, 30, 40, 50, 60, 70, 10, 20, 30, 40, 50], 
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'No Becados',
                        data: [15, 25, 35, 45, 55, 65, 75, 10, 20, 30, 40, 50, 10, 20, 30, 40, 50, 60, 70, 10, 20, 30, 40, 50 ], 
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
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
    });
});


