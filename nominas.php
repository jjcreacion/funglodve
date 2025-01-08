<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nóminas</title>
    <link rel="stylesheet" href="./lib/css/Styles.css">
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
    $activePage = 'nominas';
    require_once('./views/components/navbar.php');
    ?>
    <div class='dashboard-app'>
       <?php
        require_once('./views/components/header.php');    
        ?>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    
                    <div class='card-header'>
                        <h2><i class="fas fa-chart-bar"></i> Gestión de Nóminas </h2>
                        <?php if (strpos($perfil['modnm'], 'C') !== false) { ?>                            
                            <button type="button" slot="end" id="btn-create" class="btn btn-success btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></span><i class="fa-solid fa-plus"></i> Crear Nueva</button>
                        <?php } ?>    
                    </div>
                    <div class='card-body'>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog custom-width-proyectos">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Gestión de Nóminas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <!-- Id -->
                                <input type="hidden" id="idnomina" name="idnomina" value="">
                                <input type="hidden" id="modnm" name="modnm" value="<?php echo $perfil['modnm']; ?>">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" aria-describedby="descHelp">
                                <small id="textErrorDescripcion" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label for="institucion">Institución de Apoyo</label>
                                <select class="form-control" id="institucion">
                                    <option value="">Seleccione una opción</option>
                                    <!-- Opciones dinámicas desde la base de datos -->
                                </select>
                                <small id="textErrorInstitucion" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>                           
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col">
                            <div class="form-group">
                                <label for="tipo">Periodicidad </label>
                                <select class="form-control" id="periodicidad">
                                    <option value="">Seleccione una opción</option>
                                    <option value="1">Semanal</option>
                                    <option value="2">Quincenal</option>
                                    <option value="3">Mensual</option>
                                    <option value="4">Anual</option>
                                </select>
                            </div>
                            </div>

                            <div class="col">
                            <div class="form-group">
                                <label for="tipo">Tipo de nómina</label>
                                <select class="form-control" id="tipo">
                                    <option value="">Seleccione una opción</option>
                                    <option value="1">Beca Deportiva</option>
                                    <option value="2">Funcionarios</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" id="btn-Guardar" class="btn btn-primary">
                            <span class="spinner-grow spinner-grow-sm" style="display: none;" aria-hidden="true"></span>    
                                Guardar
                            </button>
                        </div>
                        </div>
                    </div>
                    <!-- Fin modal -->

                    </div>

                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Perioricidad</th>
                                <th>Tipo de nómina</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Filas dinámicas desde la base de datos -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Descripción</th>
                                <th>Institución</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="spinner-container" style="text-align: center; display: none;">
                        <div class="spinner-border text-primary" role="status" style="width: 5rem; height: 5rem;">
                            <span class="sr-only">Cargando...</span>
                        </div>
                        <h3><span class="badge text-primary text-bg-secondary">Cargando</span></h3>
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
            <h5 class="modal-title" id="staticBackdropLabel">Listado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <h4 id="nomina-title" class="text-center">Nómina</h4>
        <table class="table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th scope="col">N°</th>
            <th scope="col">Cédula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            </tr>
        </thead>
        <tbody id="beneficios-body">

        </tbody>
        </table>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
        <!--Fin modal Listado-->
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./lib/js/principal.js"></script>
    <script src="./lib/js/Nominas.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

</body>
</html>
