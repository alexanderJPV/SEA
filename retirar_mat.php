<?php include("includes/header.php")  ?>
<?php 
      try{
        $sql9 = $conexion->prepare("SELECT m.*,u.*
                                    FROM usuario u, materia m
                                    where u.id={$_GET['idest']} and u.id=m.id_us  and u.visible='si' and m.visible='si'");       
        $sql9->execute();                 
        while($fila9 = $sql9->fetch()){
            $aux=$fila9['nivel'];
            $aux1=$fila9['curso'];
            if($fila9['nom_materia']=='matematicas'){
                 $vec[0]=$fila9['nom_materia'];
                $vec1[0]=$fila9['gestion'];
                $vec2[0]=$fila9['nivel'];
                $vec3[0]=$fila9['curso'];
                $vec4[0]=$fila9['fecha_inscripcion'];
                $vec5[0]=$fila9['semestre'];
                $vec6[0]=$fila9['id_mat'];
            }
            if($fila9['nom_materia']=='cn. naturales'){                    
                $vec[1]=$fila9['nom_materia'];
               $vec1[1]=$fila9['gestion'];
               $vec2[1]=$fila9['nivel'];
               $vec3[1]=$fila9['curso'];
               $vec4[1]=$fila9['fecha_inscripcion'];
               $vec5[1]=$fila9['semestre'];
               $vec6[1]=$fila9['id_mat'];
           }
           if($fila9['nom_materia']=='lenguaje'){                    
                 $vec[2]=$fila9['nom_materia'];
                $vec1[2]=$fila9['gestion'];
                $vec2[2]=$fila9['nivel'];
                $vec3[2]=$fila9['curso'];
                $vec4[2]=$fila9['fecha_inscripcion'];
                $vec5[2]=$fila9['semestre'];
                $vec6[2]=$fila9['id_mat'];
            }
            if($fila9['nom_materia']=='sociales'){                    
                $vec[3]=$fila9['nom_materia'];
               $vec1[3]=$fila9['gestion'];
               $vec2[3]=$fila9['nivel'];
               $vec3[3]=$fila9['curso'];
               $vec4[3]=$fila9['fecha_inscripcion'];
               $vec5[3]=$fila9['semestre'];
               $vec6[3]=$fila9['id_mat'];
           }
            $nom=$fila9['nombre']." ".$fila9['paterno']." ".$fila9['materno'];        
        }              
        
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
                    <h2> <i class="fa fa-user"></i>    Estudiante : <?php echo $aux." - ".$aux1; ?> </h2>   
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                <small><?php echo $nom;?></small>
                         </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">                                                
                        <!-- /.col -->
                        <div class="content">
                          <div class="table-responsive">
                            <table class="table">
                                <thead>
                                  <td><b style="color:steelblue;"> Materia </b></td>
                                  <td><b style="color:steelblue;"> Semestre|Gestion </b></td>                                  
                                  <td><b style="color:steelblue;"> Fecha y Hora </b></td>
                                  <td><b style="color:steelblue;"> Operaciones </b></td>
                                </thead>
                              <tbody>
                                <tr>
                                  <?php                                  
                                   if($vec[0]=='matematicas'){
                                  ?>  
                                        <th style="width:50%">Matematicas :</th>
                                        <td> <?php if($vec5[0]==1){echo "<spam>Primero de </spam>"." ".$vec1[0]; }
                                                   if($vec5[0]==2){echo "<spam>Segundo de </spam>"." ".$vec1[0]; }?> </td>                                        
                                        <td> <?php echo $vec4[0];?></td>
                                        <td> <a href="eliminar_ins.php?idins=<?php echo urlencode($vec6[0]);?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash" ></i> Retirar</a></td>
                                  <?php
                                  }
                                  ?>
                                </tr>
                                <tr>
                                <?php if($vec[1]=='cn. naturales'){

                                ?>  
                                    <th style="width:50%">CN. Naturales :</th>
                                    <td> <?php if($vec5[1]==1){echo "<spam>Primero de </spam>"." ".$vec1[1]; }
                                                if($vec5[1]==2){echo "<spam>Segundo de </spam>"." ".$vec1[1]; }?> </td>                                                                               
                                    <td> <?php echo $vec4[1];?></td>
                                    <td> <a href="eliminar_ins.php?idins=<?php echo urlencode($vec6[1]);?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash" ></i> Retirar</a></td>
                                    <?php
                                    }
                                    ?>                                                                  
                                </tr>
                                <tr>
                                  <?php if($vec[2]=='lenguaje'){
                                ?>  
                                    <th style="width:50%">Lenguaje :</th>
                                    <td> <?php if($vec5[2]==1){echo "<spam>Primero de </spam>"." ".$vec1[2]; }
                                               if($vec5[2]==2){echo "<spam>Segundo de </spam>"." ".$vec1[2]; }?> </td>                                                                       
                                    <td> <?php echo $vec4[2];?></td>
                                    <td> <a href="eliminar_ins.php?idins=<?php echo urlencode($vec6[2]);?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash" ></i> Retirar</a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                <?php if($vec[3]=='sociales'){

                                    ?>  
                                        <th style="width:50%">Sociales :</th>
                                        <td> <?php if($vec5[3]==1){echo "<spam>Primero de </spam>"." ".$vec1[3]; }
                                                   if($vec5[3]==2){echo "<spam>Segundo de </spam>"." ".$vec1[3]; }?> </td>                                       
                                        <td> <?php echo $vec4[3];?></td>
                                        <td> <a href="eliminar_ins.php?idins=<?php echo urlencode($vec6[3]);?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash" ></i> Retirar</a></td>
                                        <?php
                                        }
                                        ?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->                        
                      </div>
                      <!-- /.row -->
                                            
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
            $vec=null; 
            $vec1=null;
            $vec2=null;
            $vec3=null;
          }
          catch (PDOException $e) {
            print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
            die();
          }
        ?>
<?php include("includes/footer.php") ?>