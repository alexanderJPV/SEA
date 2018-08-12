<?php include("includes/header.php");?> 
<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
      } catch (PDOException $e) {
          print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
      }
?>
<?php
    try{
      $sql = $conexion->prepare("SELECT * FROM usuario WHERE id=".$_GET['idest']);       
      $sql->execute();         
      if($fila = $sql->fetch())
      {  
    ?>
<div class="x_content">
    <form class="form-horizontal form-label-left" novalidate action="actualizar_est.php" method="POST">                                            
                      <span class="section">Modificar Datos de :  <?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno'];  ?>   </span>  

                      <input type="number" value="<?php echo $fila['id']; ?>" name="id" hidden> 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Nro. Rude <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['rude']; ?>" type="number" id="rude" name="rude" required="required" data-validate-length-range="5,20" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 349735343 ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['nombre']; ?>" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="name" placeholder="Ejemplo: Pedro Juan" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ap. Paterno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['paterno']; ?>" id="paterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="paterno" placeholder="Ejemplo: Perez" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Ap. Materno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['materno']; ?>" id="paterno" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="materno" placeholder="Ejemplo: Orosco" required="required" type="text">
                        </div>
                      </div>
                       
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Nro. Carnet <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['ci']; ?>" type="number" id="ci" name="ci" required="required" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 122233445">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha Nacimiento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  value="<?php echo $fila['fechnac']; ?>" id="fechnac" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="fechnac" placeholder="aaaa/mm/dd" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">                       
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero * </label>
                        <?php if($file['genero'] == 'M'){ echo " checked";  } ?>
                        <p>
                          M:
                          <input  type="radio" class="flat" name="genero" id="genderM" value="M" <?php if($fila['genero'] == 'M'){ echo " checked";  } ?> / > 
                          F:
                          <input type="radio" class="flat" name="genero" id="genderF" value="F" <?php if($fila['genero'] == 'F'){ echo " checked";  } ?> />
                        </p>
                      </div>
                   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Telefono/Celular <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['telefono']; ?>" type="tel" id="number" name="tel" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 77777777">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Lugar Nacimiento <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="dep" id="heard" class="form-control" required>
                            <option value="La Paz"    <?php if($fila['departamento']=='La Paz'){ echo "selected";} ?> >La paz</option>
                            <option value="Oruro"     <?php if($fila['departamento']=='Oruro'){ echo "selected";} ?>>Oruro</option>
                            <option value="Potosi"    <?php if($fila['departamento']=='Potosi'){ echo "selected";} ?>>Potosi</option>
                            <option value="Cochabamba"<?php if($fila['departamento']=='Cochabamba'){ echo "selected";} ?>>Cochabamba</option>
                            <option value="Sucre"     <?php if($fila['departamento']=='Sucre'){ echo "selected";} ?>>Sucre</option>
                            <option value="Tarija"    <?php if($fila['departamento']=='Tarija'){ echo "selected";} ?>>Tarija</option>
                            <option value="Santa Cruz"<?php if($fila['departamento']=='Santa Cruz'){ echo "selected";} ?>>Santa Cruz</option>
                            <option value="Beni"      <?php if($fila['departamento']=='Beni'){ echo "selected";} ?>>Beni</option>
                            <option value="Pando"     <?php if($fila['departamento']=='Pando'){ echo "selected";} ?>>Pando</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Provincia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['provincia']; ?>" id="provincia" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="provincia" placeholder="Ejemplo: Provincia Murillo" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Localidad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['localidad']; ?>" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="localidad" placeholder="Ejemplo: Nuestra señora de la paz" required="required" type="text">
                        </div>
                      </div>
                    
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oficialia">Oficialia <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="<?php echo $fila['oficialia']; ?>" id="oficialia" type="text" name="oficialia" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" placeholder="Opcional">
                          </div>
                      </div>
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="libro">Libro <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['libro']; ?>" type="number" id="libro" name="libro" required="required" data-validate-length-range="0,1000" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
 
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="partida">Partida <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['partida']; ?>" id="partida" class="form-control col-md-7 col-xs-12" data-validate-length-range="10" data-validate-words="1" name="partida" placeholder="Ejemplo: 12-A" required="required" type="text">
                        </div>
                      </div>
                        
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="folio">Folio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['folio']; ?>" type="text" id="folio" name="folio" required="required" data-validate-length-range="0,1000" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="domicilio">Domicilio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="<?php echo $fila['domicilio']; ?>" id="domicilio" class="form-control col-md-7 col-xs-12" data-validate-length-range="20" data-validate-words="1" name="domicilio" placeholder="Ejemplo: Alto Tejar c/9 #80" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Observaciones <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea  type="text" id="observaciones" name="observaciones" class="form-control col-md-7 col-xs-12"><?php echo $fila['observaciones']; ?></textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancelar</button>
                          <button id="send" type="submit" class="btn btn-success">Grabar</button>
                        </div>
                      </div>
                    </form>
            </div>
          <?php 
            }
          }
          catch (PDOException $e) {
            print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
            die();
          }
        ?>
<?php include("includes/footer.php"); ?>