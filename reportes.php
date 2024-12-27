<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Nóminas</title>
    <link rel="stylesheet" href="./lib/css/Styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
  <div class='dashboard'>
    <?php
    $activePage = 'reportes';
    require_once('./views/components/navbar.php');
    ?>
    <div class='dashboard-app'>
       <?php
        require_once('./views/components/header.php');    
        ?>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-body'>

                    <canvas id="myChart" width="400" height="100"></canvas> 

                    </div>
                </div>

                <div class='card'>
                    <div class='card-body'>

                    <div class="row">
                        <div class="col">
                    
                        <div class="card p-3">
                        <div class="row">
                            <div class="col">
                            <input type="radio" name="busqueda" id="subsede" value="1" checked> Total por Sub Sede
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col">
                            <select class="form-control" id="subsedeBus">
                            </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>    
                        <div class="row pt-2">
                            <div class="col">
                            <input type="radio" name="busqueda" id="municipioBus" value="2"> Por Estado y Municipio
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <select id="estado" class="form-control">
                            </select>
                            </div>
                            <div class="col">
                            <select id="municipio" class="form-control">
                            </select>
                            </div>
                        </div>
                        </div>
                        </div>
                        
                        <div class="col">
                        <button type="button" class="btn btn-success position-relative m-4" id="totalGeneral" data-bs-toggle="modal" data-bs-target="#staticBackdropListado"> 
                            Total General 
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" id="badgeT"> 0 </span>
                          </button> 
                          <button type="button" class="btn btn-primary position-relative m-4" id="becados" data-bs-toggle="modal" data-bs-target="#staticBackdropListado"> 
                            Becados 
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" id="badgeB"> 0 </span> 
                          </button>
                           <button type="button" class="btn btn-danger position-relative m-4" id="noBecados" data-bs-toggle="modal" data-bs-target="#staticBackdropListado"> 
                            No Becados 
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark" id="badgeN"> 0 </span> 
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
            
            </div>

            
        </div>
    </div>
<!-- Modal Listado-->
<div class="modal fade" id="staticBackdropListado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog custom-width-proyectos">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 id="nomina-title" class="text-center">REPORTE TOTAL:  </h4>
                    <!-- Contenedor para aplicar scroll -->
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto; overflow-x: hidden;">
                    <div class="row justify-content-center">
                
                      <table class="table-striped table-bordered" style="width:90%">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                </tr>
                            </thead>
                            <tbody id="listado-body">
                                <!-- Filas se agregarán aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--Fin modal Listado-->


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./lib/js/Reportes.js"></script>
    <script src="./lib/js/Glorias.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

</body>
</html>
