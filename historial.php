<form>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active custom-tab" id="basic-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-solid fa-id-card-clip"></i> Datos Básicos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="nacional-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i class="fa-solid fa-building-flag"></i> Nacional</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="internacional-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i class="fa-solid fa-globe"></i> Internacional</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="otros-tab" data-bs-toggle="tab" data-bs-target="#otros-tab-pane" type="button" role="tab" aria-controls="otros-tab-pane" aria-selected="false"><i class="fa-solid fa-table"></i> Otras actividades</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent"> 
    <div class="bg-white tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="basic-tab" tabindex="0">
        <!-- Formulario Datos Basicos -->
  
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Fecha de inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" aria-describedby="emailHelp">
                <small id="textErrorNombre" style="display:none;" class="form-text text-danger">Campo Requerido</small>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Estuvo Federado?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
                <small id="textErrorUbicacion" style="display:none;" class="errorText form-text text-danger">Campo Requerido.</small>
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Cual Federación?</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estado Representado</label>
                    <select id="estado" class="form-control">
                    </select>
                </div>
            </div>
        </div><!-- Fin Row -->
        
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Juegos Nacionales</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Numero de ediciones</label>
                    <input type="number" class="form-control" id="nombre" aria-describedby="emailHelp">
                </div>
            </div>
        </div><!-- Fin Row -->

        <div class="row">
         <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Fecha de Participacón</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Selección Nacional?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion3" value="3">
                        <label class="form-check-label" for="opcion2">Preselección</label>
                    </div>
                </div>
            </div>
            </div>
        </div><!-- Fin Row -->
                                
    <!-- Fin Datos Basicos-->
    
    </div> 
    <div class="bg-white tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="nacional-tab" tabindex="0">
      <!--Formulario Juegos Nacionales -->  
  <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Campeonatos</label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Distrital </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Estatal </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Inter-Clubes </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Nacionales  </label>
            </div>
        </div>
    </div>
    </div>
    </div><!-- Fin Row -->

    <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Juegos</label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Nacionales</label>
            </div>
        </div>
    </div>
    </div>
    </div><!-- Fin Row -->
    <!-- Fin Nacionales-->
  
    </div> 
    <div class="bg-white tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="internacional-tab" tabindex="0">
    <!--Juegos Internacionales -->  
  <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Campeonatos</label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Sudamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Centroamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Latinomaericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Bolivarianos </label>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Panamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Iberoamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Ligas Continentales  </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Mundiales </label>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Fin Row -->
    <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Invitacionales</label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Invitacionales</label>
            </div>
        </div>
    </div>
    </div>
    </div><!-- Fin Row -->

    <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Juegos</label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Sudamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Centroamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Latinomaericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Bolivarianos </label>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Panamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">ALba </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion2" value="2">
                <label class="form-check-label" for="opcion2">Olimpicos  </label>
            </div>
        </div>
    </div>
    </div>
    </div><!-- Fin Row -->
    <!-- Fin Internacionales-->
 
    </div> 
    <div class="bg-white tab-pane fade p-3" id="otros-tab-pane" role="tabpanel" aria-labelledby="otros-tab" tabindex="0">
     <!-- Formulario otras actividades -->
      <!-- Fin Row -->
    <div class="row">
    <div class="col">
    <div class="form-group">
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Entrenador</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Árbitro</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="opciones" id="opcion1" value="1">
                <label class="form-check-label" for="opcion1">Juez</label>
            </div>
        </div>
    </div>
    </div>
    </div><!-- Fin Row -->
    <!-- Fin Row -->
        
    <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Institución</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiempo de servicio</label>
                    <input type="number" class="form-control" id="nombre" aria-describedby="emailHelp">
                </div>
            </div>
        </div><!-- Fin Row -->

    <div class="row">
    <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Dirigente deportivo?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
    </div><!-- Fin Row -->  
    <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Institución</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiempo de servicio</label>
                    <input type="number" class="form-control" id="nombre" aria-describedby="emailHelp">
                </div>
            </div>
        </div><!-- Fin Row -->

    </div>
</div>
