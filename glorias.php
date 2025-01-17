<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Glorias Deportivas</title>
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
        $activePage = 'glorias';
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
                            <h2><i class="fas fa-medal"></i> Gestión de Glorias Deportivas</h2>
                            <?php if (strpos($perfil['modgl'], 'C') !== false) { ?>                            
                            <button type="button" slot="end" id="btn-create" class="btn btn-success btn btn3d" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></span><i class="fa-solid fa-plus"></i> Nuevo Registro</button>
                            <?php } ?>                            
                        </div>
                        <div class='card-body'>
                        <!-- Modal Historial -->
                        <div class="modal fade" id="ModalHistorial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog custom-width-proyectos">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Historial Deportivo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">    
                                <?php
                                require_once('historial.php');    
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btn-GuardarHistorial" class="btn btn-primary">
                                <span class="spinner-grow spinner-grow-sm" style="display: none;" aria-hidden="true"></span>    
                                    Guardar
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- Fin Modal Historial -->

                        <!-- Modal Social -->
                        <div class="modal fade" id="ModalSocial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog custom-width-proyectos">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Datos Sociales</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">    
                                <?php
                                require_once('social.php');    
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btn-GuardarSocial" class="btn btn-primary">
                                <span class="spinner-grow spinner-grow-sm" style="display: none;" aria-hidden="true"></span>    
                                    Guardar
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- Fin Modal Social -->

                        <!-- Modal Dependientes -->
                        <div class="modal fade" id="ModalDependientes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog custom-width-proyectos">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Carga Familiar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">    
                                <?php
                                require_once('dependientes.php');    
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btn-GuardarDependientes" name="btn-GuardarDependientes" class="btn btn-primary">
                                <span class="spinner-grow spinner-grow-sm" style="display: none;" aria-hidden="true"></span>    
                                    Guardar
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- Fin Modal Dependientes -->

                        <!-- Modal Beneficios -->
                        <div class="modal fade" id="ModalBeneficios" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog custom-width-beneficios">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Asignar Beneficios</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">    
                                <?php
                                require_once('beneficios.php');    
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btn-Cerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" id="btn-GuardarBeneficios" class="btn btn-primary">
                                <span class="spinner-grow spinner-grow-sm" style="display: none;" aria-hidden="true"></span>    
                                    Guardar
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>
                        <!-- Fin Modal Historial -->

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog custom-width-proyectos">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Gestión de Glorias Deportivas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <!-- Id -->
                                    <input type="hidden" id="idgloria" name="idgloria" value="">
                                    <input type="hidden" id="modgl" name="modgl" value="<?php echo $perfil['modgl']; ?>">
                                    <input type="hidden" id="modds" name="modds" value="<?php echo $perfil['modds']; ?>">
                                    <input type="hidden" id="modcf" name="modcf" value="<?php echo $perfil['modcf']; ?>">
                                    <input type="hidden" id="modhd" name="modhd" value="<?php echo $perfil['modhd']; ?>">
                                    <input type="hidden" id="modbf" name="modbf" value="<?php echo $perfil['modbf']; ?>">

                                    <label for="exampleInputEmail1">Cédula</label>
                                    <input type="text" class="form-control" id="cedula" aria-describedby="emailHelp">
                                    <small id="textErrorCedula" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
                                    <small id="textErrorNombre" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="subsede">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" aria-describedby="emailHelp">
                                    <small id="textErrorApellido" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                </div>

                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <!-- Id -->
                                    <label for="exampleInputEmail1">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp">
                                    <small id="textErrorCedula" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                                </div>
                                </div>
                                
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
                                </div>
                                </div>
                                
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" aria-describedby="emailHelp">
                                </div>
                                 </div>
                                 
                            </div>
                            <div class="row">
                                
                            </div>

                            <div class="row">
                             <div class="col">
                                <div class="form-group">
                                    <label for="subsede">Ocupación</label>
                                    <input type="text" class="form-control" id="ocupacion" aria-describedby="emailHelp">
                                </div>
                                 </div>
                                
                                 <div class="col">
                                <div class="form-group">
                                    <!-- Id -->
                                    <label for="exampleInputEmail1">Estado Civil</label>
                                    <select name="e_civil" id="e_civil" class="form-control">
                                        <option value="1">Soltero(a)</option>
                                        <option value="2">Casado(a)</option>
                                        <option value="3">Viudo(a)</option>
                                        <option value="3">Divorciado(a)</option>
                                    </select>
                                    <small id="textErrorCedula" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="subsede">Fecha de Nacimiento </label>
                                    <input type="date" class="form-control" id="fecha_nac" aria-describedby="emailHelp">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Sede</label>
                                    <select class="form-control" id="subsede">
                                    </select>
                                   <small id="textErrorSubsede" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                </div>
                                 </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estado </label>
                                    <select id="estado" class="form-control">
                                    </select>
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Municipio </label>
                                    <select id="municipio" class="form-control">
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Disciplina</label>
                                        <select class="form-control" id="disciplina">
                                        <option value="30">Ajedrez</option>
                                        <option value="1">Atletismo</option>
                                        <option value="31">Balon mano</option>
                                        <option value="2">Basket</option>
                                        <option value="3">B&eacute;isbol</option>
                                        <option value="24">Bolas criollas</option>
                                        <option value="29">Bowling</option>
                                        <option value="4">Boxeo</option>
                                        <option value="5">Canotaje</option>
                                        <option value="6">Ciclismo</option>
                                        <option value="27">Domin&oacute;</option>
                                        <option value="26">Karate</option>
                                        <option value="25">Kickingball</option>
                                        <option value="7">Nataci&oacute;n</option>
                                        <option value="8">Equitaci&oacute;n</option>
                                        <option value="9">Esgrima</option>
                                        <option value="10">F&uacute;tbol</option>
                                        <option value="11">Gimnasia</option>
                                        <option value="12">Judo</option>
                                        <option value="13">Lucha</option>
                                        <option value="14">Pesas</option>
                                        <option value="15">Remo</option>
                                        <option value="28">Sambo</option>
                                        <option value="16">Softbol</option>
                                        <option value="17">Taekwondo</option>
                                        <option value="18">Tenis</option>
                                        <option value="19">Tenis de mesa</option>
                                        <option value="20">Tiro con arco</option>
                                        <option value="21">Triatl&oacute;n</option>
                                        <option value="22">Vela</option>
                                        <option value="23">Voleibol</option>
                                        <option value="30">Wushu</option>
                                    </select>
                                    <small id="textErrorDisciplina" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
                                </div>
                                 </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipo de Gloria</label>
                                    <select class="form-control" id="tipo">
                                        <option value="1">Internacional</option>
                                        <option value="2">Regional</option>
                                    </select>
                                </div>
                                 </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Grado </label>
                                    <select class="form-control" name="grado" id="grado">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha de ingreso </label>
                                    <input type="date" class="form-control" id="f_ingreso" aria-describedby="emailHelp">
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
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Registros</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Registros</th>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="./lib/js/modalGlorias.js"></script>
    <script src="./lib/js/Glorias.js"></script>
    <script src="./lib/js/Social.js"></script>
    <script src="./lib/js/Beneficios.js"></script>
    <script src="./lib/js/Dependientes.js"></script>
  </body>
</html>


