<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
        $activePage = 'perfiles';
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
                            <h2><i class="fas fa-address-card"></i> Gestión de Perfiles </h2>
                                <button type="button" slot="end" id="btn-create" class="btn btn-success btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></span><i class="fa-solid fa-plus"></i> Crear Nuevo</button>
                        </div>
                        <div class='card-body'>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog custom-width-beneficios">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Gestión de Perfiles</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <!-- Id -->
                                        <input type="hidden" id="idperfil" name="idperfil" value="">
                                        <label for="exampleInputEmail1">Descipción del Perfil </label>
                                        <input type="text" class="form-control" id="descripcion" aria-describedby="emailHelp">
                                        <small id="textErrorDescripcion" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                                    </div>
                                 </div>

                                 <div class="col">
                                 </div>
                            </div>
                            <div class="row row-perfiles">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Glorias Deportivas</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modglC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modglR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modglU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modglD">
                                        <label class="form-check-label" > Eliminar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Registros</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="moddsC">
                                        <label class="form-check-label" > Social</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modhdC">
                                        <label class="form-check-label" > Deportivo</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modcfC">
                                        <label class="form-check-label" > Familiar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modbfC">
                                        <label class="form-check-label" > Beneficios</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Subsedes</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modssC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modssR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modssU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modssD">
                                        <label class="form-check-label" > Eliminar</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Instituciones</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modinC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modinR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modinU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modinD">
                                        <label class="form-check-label" > Eliminar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Proyectos</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modprC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modprR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modprU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modprD">
                                        <label class="form-check-label" > Eliminar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Nóminas</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modnmC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modnmR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modnmU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modnmD">
                                        <label class="form-check-label" > Eliminar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Reportes</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                </div>
                                 
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modrpV">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Perfiles</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modpfC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modpfR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modpfU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modpfD">
                                        <label class="form-check-label" > Eliminar</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Usuarios</label>
                                    <small id="textErrorDireccion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modusC">
                                        <label class="form-check-label" > Crear</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modusR">
                                        <label class="form-check-label" > Visualizar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modusU">
                                        <label class="form-check-label" > Editar</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="modusD">
                                        <label class="form-check-label" > Eliminar</label>
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
                        </div>

                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Descripción</th>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./lib/js/principal.js"></script>
    <script src="./lib/js/perfiles.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  </body>
</html>


