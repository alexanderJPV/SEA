<?php include("includes/header.php");?> 
<?php 
     $res30 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota	
                                from usuario u, materia m
                                where u.id={$_GET['idest']} and u.id=m.id_us and m.nivel='{$_GET['nivel']}' and m.curso='{$_GET['curso']}' and u.visible='si' and m.visible='si'
      ");
    $res30->execute();  

    $nm[0]="no";
    $nm[1]="no";
    $nm[2]="no";
    $nm[3]="no";
    $cc=0;
    while($fila30 = $res30->fetch()){        
      $nm[$cc]=$fila30['nom_materia'];
      $nid[$cc]=$fila30['id_mat'];
      $nn[$cc]=$fila30['nota'];
        $cc++; 
    }    
?>
<div class="x_content">
    <form class="form-horizontal form-label-left" novalidate action="create_not.php" method="POST">                      
                      <span class="section">Introducir Datos de Inscripcion de: <?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno'];  ?></span>

                      <?php  
                            for ($i=0; $i <count($nm) ; $i++) { 
                                if($nm[$i]=="matematicas"){                                                                
                      ?>  
                            <input type="number" value="<?php echo $nid[$i]; ?>" name="id_matm" hidden>  
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Matematicas <span class="required">:</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input style="width: 10%;" type="number"  name="mat" value="<?php echo $nn[$i]; ?>" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>                                                                                                                                           
                       <?php
                         }
                       }                      
                       ?>         
                       <?php  
                            for ($i=0; $i <count($nm) ; $i++) {                                                                 
                                if($nm[$i]=="cn. naturales"){                            
                       ?>  
                                    <input type="number" value="<?php echo $nid[$i]; ?>" name="id_matc" hidden>  
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">CN. Naturales <span class="required">:</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input style="width: 10%;" type="number"  name="natu" value="<?php echo $nn[$i]; ?>" class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>                                                                                                                                           
                       <?php
                                  }
                            }
                       ?>    
                      
                      <?php  
                            for ($i=0; $i <count($nm) ; $i++) { 
                                if($nm[$i]=="lenguaje"){                            
                      ?>  
                            <input type="number" value="<?php echo $nid[$i]; ?>" name="id_matl" hidden>  
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Lenguaje <span class="required">:</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input style="width: 10%;" type="number"  name="len" value="<?php echo $nn[$i]; ?>" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>                                                                                                                                           
                       <?php
                         }
                       }
                       ?> 

                       <?php  
                            for ($i=0; $i <count($nm) ; $i++) { 
                                if($nm[$i]=="sociales"){                            
                      ?>  
                            <input type="number" value="<?php echo $nid[$i]; ?>" name="id_mats" hidden>  
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" >Sociales <span class="required">:</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input style="width: 10%;" type="number"  name="soci" value="<?php echo $nn[$i]; ?>" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>                                                                                                                                           
                       <?php
                         }
                       }
                       ?>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="notas.php" class="btn btn-primary">Cancelar</a>
                          <button id="send" type="submit" class="btn btn-success">Grabar</button>
                        </div>
                      </div>
                    </form>
            </div>
<?php include("includes/footer.php");?> 
