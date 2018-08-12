<?php include("includes/header.php");?> 
<div class="x_content">
    <form class="form-horizontal form-label-left" novalidate action="create_user.php" method="POST">                      
                      <span class="section">Introducir Datos</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Nro. Rude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="rude" name="rude" required="required" data-validate-length-range="5,20" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 349735343 ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="Ejemplo: Pedro Juan" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ap. Paterno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="paterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="paterno" placeholder="Ejemplo: Perez" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ap. Materno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="paterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="materno" placeholder="Ejemplo: Orosco" required="required" type="text">
                        </div>
                      </div>
                       
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Nro. Carnet <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="ci" name="ci" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 122233445">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha Nacimiento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="fechnac" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="fechnac" placeholder="AAAA-MM-DD" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">                       
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero * </label>
                        <p>
                          M:
                          <input type="radio" class="flat" name="genero" id="genderM" value="M" checked="" required /> 
                          F:
                          <input type="radio" class="flat" name="genero" id="genderF" value="F" />
                        </p>
                      </div>
                   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Telefono/Celular <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="number" name="tel" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 77777777">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Lugar Nacimiento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="dep" id="heard" class="form-control" required>
                            <option value="La Paz">La paz</option>
                            <option value="Oruro">Oruro</option>
                            <option value="Potosi">Potosi</option>
                            <option value="Cochabamba">Cochabamba</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Tarija">Tarija</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Beni">Beni</option>
                            <option value="Pando">Pando</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Provincia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="provincia" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="provincia" placeholder="Ejemplo: Provincia Murillo" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Localidad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="localidad" placeholder="Ejemplo: Nuestra señora de la paz" required="required" type="text">
                        </div>
                      </div>
                    
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oficialia">Oficialia <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="oficialia" type="text" name="oficialia" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" placeholder="Ejemplo: Of-120">
                          </div>
                      </div>
                    

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="libro">Libro <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="libro" name="libro" required="required" data-validate-length-range="0,1000" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 11">
                        </div>
                      </div>
 
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="partida">Partida <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="partida" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" data-validate-words="1" name="partida" placeholder="Ejemplo: 12-A" required="required" type="text">
                        </div>
                      </div>
                        
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="folio">Folio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="folio" name="folio" required="required" data-validate-length-range="0,1000" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 1">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="domicilio">Domicilio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="domicilio" class="form-control col-md-7 col-xs-12" data-validate-length-range="20" data-validate-words="1" name="domicilio" placeholder="Ejemplo: Alto Tejar c/9 #80" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Observaciones <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea type="text" id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12" placeholder="Escriba aqui"></textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="listar_usuarios.php" class="btn btn-primary">Cancelar</a>
                          <button id="send" type="submit" class="btn btn-success">Grabar</button>
                        </div>
                      </div>
                    </form>
            </div>
<?php include("includes/footer.php"); ?>