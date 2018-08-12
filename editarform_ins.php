<?php include("includes/header.php"); ?> 
<?php 
try {
  $sql = $conexion->prepare("SELECT m.*, u.*
                                            FROM  materia m, usuario u
                                            where u.id=m.id_us and m.visible='si' and m.id_us=" . $_GET['idest']);
  $sql->execute();
  $fila = $sql->fetch();

} catch (PDOException $e) {
  print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
  die();
}
?>
<?php 
                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.semestre
                                                         from usuario u, materia m
                                                         where u.id={$_GET['idest']} and u.id=m.id_us and m.nivel='{$_GET['nivel']}' and m.curso='{$_GET['curso']}' and u.visible='si' and m.visible='si'
                        ");
                        $res2->execute();
                        $vec = ["matematicas", "cn. naturales", "lenguaje", "sociales"];
                        $cp=0;
                        $cs=0;
                        while ($v = $res2->fetch()) {                          
                          if($v['semestre']==1){                            
                            $cp++;
                          }
                          if($v['semestre']==2){
                            $cs++;
                          }
                          if ($v['nom_materia'] == "matematicas") {                            
                            $vec[0] = "no";
                          }
                          if ($v['nom_materia'] == "cn. naturales") {
                              $vec[1] = "no";
                          }
                          if ($v['nom_materia'] == "lenguaje") {
                            $vec[2] = "no";
                          }
                          if ($v['nom_materia'] == "sociales") {
                            $vec[3] = "no";
                          }
                        }                                                                        
                        ?>
<div class="x_content">
    <form class="form-horizontal form-label-left" novalidate action="create_mat.php" method="POST">                      
                      <span class="section">Adicionar materia de estudiante: <?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></span>
                      <input type="number" value="<?php echo $fila['id']; ?>" name="id_us" hidden>
 
                      <div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12" for="ci">Gestion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="width: 30%;" value="<?php echo $fila['gestion']; ?>" type="number" id="gestion" name="gestion" required="required" data-validate-length-range="4,10" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Semestre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="semestre" id="heard" class="form-control" required>
                            <?php
                                if($cp<2){
                                  if($cs>0){?>
                                    <option value=2>Segundo</option>
                                <?php    
                                  }else{?>
                                    <option value=1>Primero</option>
                                    <option value=2>Segundo</option>
                                <?php    
                                  }
                                ?>                                                                   
                                <?php
                                }else{?>
                                    <option value=2>Segundo</option>
                                <?php  
                                }                          
                             ?>
                          
                        
                          </select>
                        </div>
                      </div>

                                                             
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Nivel <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="nivel" id="heard" class="form-control" required>
                            <option value="<?php echo $fila['nivel']; ?>"><?php echo $fila['nivel']; ?></option>
                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Curso <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select style="width: 30%;" name="curso" id="heard" class="form-control" required>
                            <option value="<?php echo $fila['curso']; ?>"><?php echo $fila['curso']; ?></option>
                          </select>
                        </div>
                      </div>
                       
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Materia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                                    
                            <select style="width: 30%;" name="nom_materia" id="heard" class="form-control" required>
                            <?php
                            for ($i = 0; $i < count($vec); $i++)
                            {
                                if($vec[$i]!="no" && $cs!=2){
                            ?>                                                                         
                                 <option value="<?php echo $vec[$i]; ?>"><?php echo strtoupper($vec[$i]); ?></option>
                            <?php
                                }
                              
                             } 
                            ?>
                            </select>
                        </div>
                      </div>
                                            
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Heard">Fecha y Hora <span class="required">*</span>
                        </label>

                        <div class='col-sm-4'>
                            <div style="width: 60%;" class='input-group date' id='myDatepicker'>
                                <input name="fecha" id="fecha" type='text' class="form-control">
                                    <span  class="input-group-addon">
                                    <span  class="glyphicon glyphicon-calendar"></span>
                                  </span>
                            </div>
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
<?php include("includes/footer.php"); ?>