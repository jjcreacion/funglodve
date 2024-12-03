      
<!-- Social -->
<form>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active custom-tab" id="salud-tab" data-bs-toggle="tab" data-bs-target="#salud-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i class="fa-solid fa-staff-snake"></i> Salud</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="educacion-tab" data-bs-toggle="tab" data-bs-target="#educacion-tab-pane" type="button" role="tab" aria-controls="educacion-tab-pane" aria-selected="false"><i class="fa-solid fa-school"></i> Educación</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="vivienda-tab" data-bs-toggle="tab" data-bs-target="#vivienda-tab-pane" type="button" role="tab" aria-controls="vivienda-tab-pane" aria-selected="false"><i class="fa-solid fa-house"></i> Vivienda</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="alimentacion-tab" data-bs-toggle="tab" data-bs-target="#alimentacion-tab-pane" type="button" role="tab" aria-controls="alimentacion-tab-pane" aria-selected="false"><i class="fa-solid fa-kitchen-set"></i> Alimentacion</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="ivss-tab" data-bs-toggle="tab" data-bs-target="#ivss-tab-pane" type="button" role="tab" aria-controls="ivss-tab-pane" aria-selected="false"><i class="fa-solid fa-id-card-clip"></i> Ivss</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link custom-tab" id="recreacion-tab" data-bs-toggle="tab" data-bs-target="#recreacion-tab-pane" type="button" role="tab" aria-controls="recreacion-tab-pane" aria-selected="false"><i class="fa-solid fa-person-falling"></i> Recreación</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent"> 
    
    <!--Formulario Salud -->  
    <div class="bg-white tab-pane fade show active" id="salud-tab-pane" role="tabpanel" aria-labelledby="salud-tab" tabindex="0">
      <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Presenta alguna enfermedad?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enfermedad" id="enf_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enfermedad" id="enf_fopcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Especifique</label>
                <input type="hidden" id="idGloriaSocial" name="idGloriaSocial" value="">
                <input type="hidden" id="salud" name="salud" value="">
                <input type="hidden" id="educacion" name="educacion" value="">
                <input type="hidden" id="vivienda" name="vivienda" value="">
                <input type="hidden" id="alimentacion" name="alimentacion" value="">
                <input type="hidden" id="ivss" name="ivss" value="">
                <input type="hidden" id="recreacion" name="recreacion" value="">
                <input type="text" class="form-control" id="especifique" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Diagnóstico médico</label>
                <input type="text" class="form-control" id="diagnostico" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Tratamiento</label>
                <input type="text" class="form-control" id="tratamiento" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Cumple con el tratamiento?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cumple" id="cum_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cumple" id="cum_fopcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Institución</label>
                <input type="text" class="form-control" id="institucion" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Se encuentra discapacitado físicamente?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="discapacitado" id="disc_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="discapacitado" id="disc_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Indique</label>
                <input type="text" class="form-control" id="indique" name="indique" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->  
    </div>
    <!-- Fin Salud-->  
    <!--Formulario Educación -->  
    <div class="bg-white tab-pane fade" id="educacion-tab-pane" role="tabpanel" aria-labelledby="educacion-tab" tabindex="0">  
    <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Grado de Instrucción</label>
                <input type="text" class="form-control" id="grado" aria-describedby="emailHelp">
            </div>
            </div>
            <div class="col">
            <div class="form-group">
           </div>
            </div>      
    </div><!-- Fin Row -->
    <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Estudia actualmente?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudia" id="estu_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="estudia" id="estu_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Indique</label>
                <input type="text" class="form-control" id="indiqueEducacion" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Pertenece a alguna misión?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mision" id="misi_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mision" id="misi_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Indique</label>
               <input type="text" class="form-control" id="cualMision" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
    </div> 
    <!-- Fin Educación-->
    <!-- Formulario Vivienda -->  
    <div class="bg-white tab-pane fade p-3" id="vivienda-tab-pane" role="tabpanel" aria-labelledby="vivienda-tab" tabindex="0">
      <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Posee vivienda propia?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="posee" id="pos_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="posee" id="pos_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Esta en buenas condiciones?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condiciones" id="cond_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condiciones" id="cond_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Especifique</label>
                <input type="text" class="form-control" id="especifiqueVivienda" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="tipo_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Casa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo" id="tipo_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">Apartamento</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Antiguedad</label>
                <input type="text" class="form-control" id="anyos" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->
    </div>
    <!-- Fin vivienda -->
    <!-- Formulario Alimentaciòn -->
    <div class="bg-white tab-pane fade p-3" id="alimentacion-tab-pane" role="tabpanel" aria-labelledby="alimentacion-tab" tabindex="0">
      <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Mantiene una alimentación balanceada?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="balanceada" id="bal_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="balanceada" id="bal_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Posee alguna dieta??</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dieta" id="diet_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="dieta" id="diet_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
        <div class="col">
            <div class="form-group">
            <label for="exampleInputEmail1">Lugar donde se alimenta:</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="lcasa" id="lcasa" value="1">
                        <label class="form-check-label" for="opcion1">Casa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="lfundacion" id="lfundacion" value="1">
                        <label class="form-check-label" for="opcion1">Fundación</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="lotro" id="lotro" value="1">
                        <label class="form-check-label" for="opcion1">Otro</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
              
            </div>
            </div>
        </div><!-- Fin Row -->
    </div>    
    <!-- Fin Alimentación -->
    <!-- Formulario Ivss -->
    <div class="bg-white tab-pane fade p-3" id="ivss-tab-pane" role="tabpanel" aria-labelledby="ivss-tab" tabindex="0">
      <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">¿Cotiza en el IVSS?</label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cotiza" id="cot_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cotiza" id="cot_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                
            </div>
            </div>
        </div><!-- Fin Row -->
        <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Semanas</label>
                <input type="text" class="form-control" id="semanas" aria-describedby="emailHelp">
            </div>
            </div>

            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Estado</label>
                <select name="ivss_estado" id="estadoIvss" class="form-control" >
                    <option value="1">Activo</option>
                    <option value="2">Cesante</option>
                    <option value="3">Pensionado</option>
                    <option value="4">No Registrado</option>
                </select>
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Empresa</label>
                <input type="text" class="form-control" id="empresa" aria-describedby="emailHelp">
            </div>
            </div>

            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Años de servicio</label>
                <input type="text" class="form-control" id="anyosIvss" aria-describedby="emailHelp">
            </div>
            </div>
        </div>
    </div>      
    <!-- Fin IVSS -->
     <!-- Formulrio Recreacion-->
    <div class="bg-white tab-pane fade p-3" id="recreacion-tab-pane" role="tabpanel" aria-labelledby="recreacion-tab" tabindex="0">
    <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Actividades recreativas que más disfruta: </label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="pasear" id="pasear" value="1">
                <label class="form-check-label" for="opcion1">Pasear </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="jugar" id="jugar" value="1">
                <label class="form-check-label" for="opcion2">Jugar </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="compartir" id="compartir" value="1">
                <label class="form-check-label" for="opcion2">Compartir en familia </label>
            </div>    
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="playa" id="playa" value="1">
                <label class="form-check-label" for="opcion1">Playa </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cine" id="cine" value="1">
                <label class="form-check-label" for="opcion2">Cine </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="rec_otro" id="rec_otro" value="1">
                <label class="form-check-label" for="opcion2">Otro  </label>
            </div>  
        </div>
    </div>
    </div>

    
    </div>
    <div class="row">
    <div class="col">
    <div class="form-group">
        <label for="exampleInputEmail1">Cualidades mas resaltantes:</label>
        <div class="d-flex align-items-center">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cantar" id="cantar" value="1">
                <label class="form-check-label" for="opcion1">Cantar </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="bailar" id="bailar" value="1">
                <label class="form-check-label" for="opcion2">Bailar </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="actuar" id="actuar" value="1">
                <label class="form-check-label" for="opcion2">Actuar </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="recitar" id="recitar" value="1">
                <label class="form-check-label" for="opcion2">Recitar </label>
            </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="escribir" id="escribir" value="1">
                <label class="form-check-label" for="opcion1">Escribir </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="pintar" id="pintar" value="1">
                <label class="form-check-label" for="opcion2">Pintar </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="cotro" id="cotro" value="1">
                <label class="form-check-label" for="opcion2">Otro  </label>
            </div>  
        </div>
    </div>
    </div>
    </div>

    <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Pertenece a algún grupo deportivo, cultural, religioso? </label>
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pertenece" id="grupo_opcion1" value="1">
                        <label class="form-check-label" for="opcion1">Si</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pertenece" id="grupo_opcion2" value="2">
                        <label class="form-check-label" for="opcion2">No</label>
                    </div>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Indique</label>
                <input type="text" class="form-control" id="indiqueRecreacion" aria-describedby="emailHelp">
            </div>
            </div>
        </div><!-- Fin Row -->    
    </div>
    <!-- Fin Recreacion -->
    
</div>    
</form>