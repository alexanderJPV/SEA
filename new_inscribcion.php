<?php include("includes/header.php");?> 
<?php 
      try{
        $sql = $conexion->prepare("SELECT * FROM usuario WHERE id=".$_GET['idest']);       
        $sql->execute();         
        if($fila = $sql->fetch())
        {

        }
      }
          catch (PDOException $e) {
            print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
            die();
          }
        
?>
<div class="x_content">
    <form class="form-horizontal form-label-left" novalidate action="create_mat.php" method="POST">                      
                      <span class="section">Introducir Datos de Inscripcion de: <?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno'];  ?></span>
                      <input type="number" value="<?php echo $fila['id']; ?>" name="id_us" hidden>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Gestion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="width: 30%;" type="number" id="gestion" name="gestion" required="required" data-validate-length-range="4,10" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 2018 ">                          
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Semestre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="semestre" id="heard" class="form-control" required>
                            <option value=1>Primero</option>
                            <option value=2>Segundo</option>
                          </select>
                        </div>
                      </div>

                                                             
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Nivel <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="nivel" id="heard" class="form-control" required>
                            <option value="inicial">Inicial</option>
                            <option value="avanzado">Avanzado</option>
                            <option value="aplicados">Aplicados</option>
                            <option value="complementarios">Complementarios</option>
                            <option value="especializados">Especializados</option>                            
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Curso <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="curso" id="heard" class="form-control" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                        </div>
                      </div>
                       
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Materia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="nom_materia" id="heard" class="form-control" required>
                            <option value="matematicas">Matematica</option>
                            <option value="cn. naturales">CN. Naturales</option>
                            <option value="lenguaje">Lenguaje</option>
                            <option value="sociales">Sociales</option>
                          </select>
                        </div>
                      </div>  
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Fecha y Hora <span class="required">*</span>
                        </label>

                        <div class='col-sm-4'>
                            <div style="width: 60%;" class='input-group date' id='myDatepicker'>
                                <input  name="fecha" id="fecha" type='text' class="form-control">
                                    <span  class="input-group-addon">
                                    <span  class="glyphicon glyphicon-calendar"></span>
                                  </span>
                            </div>
                            </div>                            
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="listar_inscritos.php" class="btn btn-primary">Cancelar</a>
                          <button id="send" type="submit" class="btn btn-success">Grabar</button>
                        </div>
                      </div>
                    </form>
            </div>
<?php include("includes/footer.php"); ?>