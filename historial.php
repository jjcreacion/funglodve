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
                <input type="hidden" id="historialBasico" name="historialBasico" value="">
                <input type="text" class="form-control" id="fecha_i" aria-describedby="emailHelp">
                <small id="textErrorNombre" style="display:none;" class="form-text text-danger">Campo Requerido</small>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Estuvo Federado?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="federado" id="fopcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="federado" id="fopcion2" value="2">
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
                <input type="text" class="form-control" id="cual" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estado Representado</label>
                    <select id="estadoH" class="form-control">
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
                        <input class="form-check-input" type="radio" name="j_nac" id="jopcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="j_nac" id="jopcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Numero de ediciones</label>
                    <input type="number" class="form-control" id="ediciones" aria-describedby="emailHelp">
                </div>
            </div>
        </div><!-- Fin Row -->

        <div class="row">
         <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Fecha de Participación</label>
                    <input type="text" class="form-control" id="fecha_p" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Selección Nacional?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="selec_nac" id="sopcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="selec_nac" id="sopcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="selec_nac" id="sopcion3" value="3">
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
                <input type="hidden" id="historialNacional" name="historialNacional" value="">
                <input class="form-check-input" type="checkbox" name="distrital" id="distrital" value="1">
                <label class="form-check-label" for="opcion1">Distrital </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="estatal" id="estatal" value="1">
                <label class="form-check-label" for="opcion2">Estatal </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="interclubes" id="interclubes" value="1">
                <label class="form-check-label" for="opcion2">Inter-Clubes </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cnacionales" id="cnacionales" value="1">
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
                <input class="form-check-input" type="checkbox" name="jnacionales" id="jnacionales" value="1">
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
            <input type="hidden" id="historialInternacional" name="historialInternacional" value="">
                <input class="form-check-input" type="checkbox" name="csuda" id="csuda" value="1">
                <label class="form-check-label" for="opcion1">Sudamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="ccentro" id="ccentro" value="1">
                <label class="form-check-label" for="opcion2">Centroamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="clatino" id="clatino" value="1">
                <label class="form-check-label" for="opcion2">Latinomaericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cboliva" id="cboliva" value="1">
                <label class="form-check-label" for="opcion2">Bolivarianos </label>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cpana" id="cpana" value="1">
                <label class="form-check-label" for="opcion1">Panamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cibero" id="cibero" value="1">
                <label class="form-check-label" for="opcion2">Iberoamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cligas" id="cligas" value="1">
                <label class="form-check-label" for="opcion2">Ligas Continentales  </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cmundiales" id="cmundiales" value="1">
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
                <input class="form-check-input" type="checkbox" name="invitacionales" id="invitacionales" value="1">
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
                <input class="form-check-input" type="checkbox" name="jsuda" id="jsuda" value="1">
                <label class="form-check-label" for="opcion1">Sudamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jcentro" id="jcentro" value="1">
                <label class="form-check-label" for="opcion2">Centroamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jlatino" id="jlatino" value="1">
                <label class="form-check-label" for="opcion2">Latinomaericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jboliva" id="jboliva" value="1">
                <label class="form-check-label" for="opcion2">Bolivarianos </label>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jpana" id="jpana" value="1">
                <label class="form-check-label" for="opcion1">Panamericanos </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jalba" id="jalba" value="1">
                <label class="form-check-label" for="opcion2">ALba </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jjoo" id="jjoo" value="1">
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
                <input type="hidden" id="idGloriaHistorial" name="idGloriaHistorial" value="">
                <input type="hidden" id="historialOtros" name="historialOtros" value="">
                <input class="form-check-input" type="checkbox" name="entrenador" id="entrenador" value="1">
                <label class="form-check-label" for="opcion1">Entrenador</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="arbitro" id="arbitro" value="1">
                <label class="form-check-label" for="opcion1">Árbitro</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="juez" id="juez" value="1">
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
                <input type="text" class="form-control" id="oinstitucion" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiempo de servicio</label>
                    <input type="tiempo" class="form-control" id="otiempo" aria-describedby="emailHelp">
                </div>
            </div>
        </div><!-- Fin Row -->

    <div class="row">
    <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Dirigente deportivo?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dirigente" id="dopcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dirigente" id="dopcion2" value="2">
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
                <input type="text" class="form-control" id="dinstitucion" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiempo de servicio</label>
                    <input type="text" class="form-control" id="dtiempo" aria-describedby="emailHelp">
                </div>
            </div>
        </div><!-- Fin Row -->

    </div>
</div>
