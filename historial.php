<?php include("includes/header.php")  ?>
<?php 
      try{
        $sql9 = $conexion->prepare("SELECT m.*,u.*
                                    FROM usuario u, materia m
                                    where u.id={$_GET['idest']} and u.id=m.id_us  and u.visible='si'");       
        $sql9->execute();
        $fila9 = $sql9->fetch();
        
?>
        <!-- page content -->
    
        <div class="content" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Resgistro de sistema <small>Nro: <?php echo $_GET['idest'];  ?></small></h3>
              </div>            
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                  <h1> <i class="fa fa-archive"></i> Historial : <small><?php echo $fila9['nombre']." ".$fila9['paterno']." ".$fila9['materno'];?></small></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                      
                    <section class="content invoice">                     
                      
                      <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">                                                
                        <!-- /.col -->
                        <div class="content">
                          <div class="table-responsive">
                            <table class="table">                            
                                <thead>
                                  <td><b style="color:steelblue;"> Gestion </b></td>
                                  <td><b style="color:steelblue;"> Semestre  </b></td>
                                  <td><b style="color:steelblue;"> Materia  </b></td>
                                  <td><b style="color:steelblue;"> Nota  </b></td>
                                  <td><b style="color:steelblue;"> Fecha de inscripcion  </b></td>  
                                  
                                </thead>
                              <tbody>
                                    <?php 
                                    $sql9 = $conexion->prepare("SELECT m.*,u.*
                                                                FROM usuario u, materia m
                                                                where u.id={$_GET['idest']} and u.id=m.id_us  and u.visible='si'");       
                                    $sql9->execute();
                                    while($fila10 = $sql9->fetch())
                                    {
                                    ?>
                                        <tr>
                                        <th style="width:10%"><?php echo $fila10['gestion']; ?></th>
                                        <th style="width:10%"><?php if($fila10['semestre']==1){echo "<spam>Primero</spam>"; }
                                                   if($fila10['semestre']==2){echo "<spam>Segundo</spam>"; }?></th>
                                        <th style="width:10%"><?php echo $fila10['nom_materia']; ?></th>
                                        <th style="width:10%">
                                                  <?php
                                                    if($fila10['nota']==0){
                                                        echo "Abandono";
                                                    }
                                                    if($fila10['nota']<51 && $fila10['nota']>0){
                                                        echo "<spam style='color:red;'>{$fila10['nota']}</spam>";
                                                    }
                                                    if($fila10['nota']>50){
                                                        echo "<spam style='color:skyblue;'>{$fila10['nota']}</spam>";
                                                    }
                                                  ?>  
                                        </th>
                                        <th style="width:10%">
                                            <?php  echo $fila10['fecha_inscripcion']; ?>  
                                        </th>
                                        </tr>
                                    <?php 
                                    }
                                    ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->                        
                      </div>
                      <!-- /.row -->
                      </div>                                           
                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <a href="listar_inscritos.php" class="btn btn-success"><i class="fa fa-mail-reply"></i> Volver</a>                          
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php           
          }
          catch (PDOException $e) {
            print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
            die();
          }
        ?>
<?php include("includes/footer.php") ?>