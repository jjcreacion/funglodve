<div class='card'>
    <div class='card-header'>
        <h2><i class="fas fa-users"></i> Carga Familiar </h2>
        <button type="button" id="btn-createDependientes" class="btn btn-success btn btn3d" data-bs-toggle="modal" data-bs-target="#modalCrearDependientes">
            <i class="fa-solid fa-plus"></i> Crear Nuevo
        </button>
    </div>
    <div class='card-body'>
        <table id="dataTableDependientes" class="tableD table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Parentesco</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Parentesco</th>
                    <th>Teléfono</th>
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

<!-- Modal -->
<div class="modal fade" id="modalCrearDependientes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Gestión de Dependientes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formDependiente">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="hidden" id="idGloriaDependiente" name="idGloriaDependiente" value="">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                                <small id="textErrorNombre" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="parentesco">Parentesco</label>
                                <input type="text" class="form-control" id="parentesco" name="parentesco">
                                <small id="textErrorParentesco" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <input type="text" class="form-control" id="grado" name="grado">
                                <small id="textErrorGrado" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="ocupacion">Ocupación</label>
                                <input type="text" class="form-control" id="ocupacion" name="ocupacion">
                                <small id="textErrorOcupacion" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="ingreso">Ingreso</label>
                                <input type="text" class="form-control" id="ingreso" name="ingreso">
                                <small id="textErrorIngreso" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                                <small id="textErrorTelefono" style="display:none;" class="form-text text-danger">Campo Requerido</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="f_nac">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="f_nac" name="f_nac">
                                <small id="textErrorFnac" style="display:none;" class="form-text text-danger">Campo Requerido</small>
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
