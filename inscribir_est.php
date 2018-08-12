<?php include("includes/header.php") ?>                           
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista <small>Estudiantes</small></h2>                                                         
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Lista des estudiantes habilitados para hacer una inscripcion
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Rude</th>                          
                          <th>Nombre</th> 
                          <th>Carnet</th>            
                          <th>F.Nacimiento</th>            
                          <th>Genero</th>                          
                          <th>Tel/cel</th>                          
                          <th>Departamento</th>  
                          <th>Provincia</th>                                   
                          <th>Localidad</th>           
                          <th>Inscribir o Retirar</th>                 
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        try{
                            $res = $conexion->prepare("select * FROM usuario");
                            $res->execute();
                            $var = 1;
                            while($fila = $res->fetch()){
                              if($fila['visible']=='si' && $fila['estado']=='habilitado'){
                        ?>  
                          <tr>
                            <td><?php echo $var++; ?></td>            
                            <td><?php echo $fila['rude']; ?></td>            
                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>                          
                            <td><?php echo $fila['ci'] ?></td>     
                            <td><?php echo $fila['fechnac'] ?></td>                                                      
                            <td><?php echo $fila['genero'] ?></td>                          
                            <td><?php echo $fila['telefono'] ?></td>
                            <td><?php echo $fila['departamento'] ?></td>     
                            <td><?php echo $fila['provincia'] ?></td>     
                            <td><?php echo $fila['localidad'] ?></td>     
                            <td>
                                <?php   
                                    $reseg = $conexion->prepare("select count(id_mat)
                                                                from usuario u, materia m
                                                                where u.id={$fila['id']} and u.id=m.id_us and m.visible='si'");
                                    $reseg->execute();
                                    $aux = $reseg->fetch();
                                    if($aux['count(id_mat)']==0){                                    
                                 ?>
                                      <a href="new_inscribcion.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-tasks"></i> Inscrito: tiene 0 materias </a>
                                      <a href="retirar_est.php?ideus=<?php echo urlencode($fila['id']); ?>" class="btn btn-dark btn-xs"><i class="fa fa-ban"></i> Retirar</a>
                                 <?php       
                                      }else{
                                        if($aux['count(id_mat)']>0 && $aux['count(id_mat)']<4){
                                        ?>
                                        <a href="new_inscribcion.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-warning btn-xs"><i class="fa fa-tasks"></i> Inscrito: tiene <?php echo$aux['count(id_mat)'];?> materias </a>
                                        <a href="retirar_est.php?idus=<?php echo urlencode($fila['id']); ?>" class="btn btn-dark btn-xs"><i class="fa fa-ban"></i> Retirar</a>  
                                          <?php
                                        }else{
                                          if($aux['count(id_mat)']>=0){
                                            ?>
                                         <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-tasks"></i> Inscrito: tiene <?php echo$aux['count(id_mat)'];?> materias </a>                                                                                                                         
                                         <a href="retirar_est.php?idus=<?php echo urlencode($fila['id']); ?>" class="btn btn-dark btn-xs"><i class="fa fa-ban"></i> Retirar</a>
                                            <?php
                                          }
                                        }
                                  ?>

                                        <?php                                          
                                      }                             
                                  
                                ?>      

                            </td>      
                          </tr>                                              
                      <?php
                              }
                            }
                        }catch(PDOException $e){
                          print "¡Error!: " . $e->getMessage() . "<br/>";
                          die();
                        }
                      ?>                                            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
              </div>  
          </div>
<?php include("includes/footer.php") ?>