<div class='card' id="tablaDependientes">
    <div class='card-header'>
        <h2><i class="fas fa-users"></i> Carga Familiar </h2>
        <button type="button" id="btn-createDependientes" class="btn btn-success btn btn3d">
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

<div class='card' id="modalCrearDependientes">
    <div class='card-header'>
        <h2><i class="fas fa-users"></i> Datos del Familiar </h2>
    </div>
    <div class='card-body'>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input type="hidden" id="idGloriaDependiente" name="idGloriaDependiente" value="">
                <input type="hidden" id="idDependiente" name="idDependiente" value="">
                <label for="nombre">Nombre y Apellido</label>
                <input type="text" class="form-control" id="nombreDep" name="nombreDep">
                <small id="textErrorNombreDep" style="display:none;" class="form-text text-danger">Campo Requerido</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="parentesco">Parentesco</label>
                <input type="text" class="form-control" id="parentescoDep" name="parentescoDep">
                <small id="textErrorParentesco" style="display:none;" class="form-text text-danger">Campo Requerido</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="grado">Grado de Instrucción</label>
                <input type="text" class="form-control" id="gradoDep" name="gradoDep">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="ocupacion">Ocupación</label>
                <input type="text" class="form-control" id="ocupacionDep" name="ocupacionDep">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="ingreso">Ingreso Mensual</label>
                <input type="text" class="form-control" id="ingresoDep" name="ingresoDep">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefonoDep" name="telefonoDep">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="f_nac">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="f_nacDep" name="f_nacDep">
            </div>
        </div> 
        <div class="col">
            <div class="form-group">
            </div>
        </div>
    </div>
    </div>    
</div>
