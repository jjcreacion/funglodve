let subsedes;
let arraySubsedeNombre = [];
          
$(document).ready(function() {
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


