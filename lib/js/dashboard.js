  let subsedes;
  let arraySubsedeNombre = [];
  let glorias;
            
  $(document).ready(function() {

    $.ajax({
        url: './controllers/gloriasController.php', 
        method: 'GET',
        success: function(data) {
            glorias = JSON.parse(data);
            console.log(glorias);
            verificarGloriasSubsedes();
        }
    });

      $.ajax({
          url: './controllers/subsedesController.php', 
          method: 'GET',
          success: function(data) {
              subsedes = JSON.parse(data);
              subsedes.forEach(function(subsede) {
                  arraySubsedeNombre.push(subsede.nombre);
              });
              arraySubsedeNombre.sort(); 
              verificarGloriasSubsedes();

         },
      });
  });
  
  function verificarGloriasSubsedes() { 
    if (!glorias || !subsedes) return;
    let resultados = {}; 
    subsedes.forEach(function(subsede) { 
        resultados[subsede.id] = { 
            nombre: subsede.nombre,
            totalGlorias: 0 
        }; 
    }); 
    glorias.forEach(function(gloria) {
         if (resultados[gloria.sub_sede]) { 
            resultados[gloria.sub_sede].totalGlorias++; 
        } 
    }); 
    console.log(resultados); 

    let totalGloriasArray = []; 
    arraySubsedeNombre.forEach(function(nombreSubsede) { 
        let subsede = subsedes.find(subsede => subsede.nombre === nombreSubsede); 
        totalGloriasArray.push(resultados[subsede.id].totalGlorias); 
    });

  mostrarResultados(totalGloriasArray);
}

function mostrarResultados(totalGloriasArray) { 
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: arraySubsedeNombre, 
            datasets: [{
                label: 'Total Registrados',
                data: totalGloriasArray, 
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
    
}