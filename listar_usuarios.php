<?php include("includes/header.php") ?>                           
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista <small>Estudiantes</small></h2>                                       
                  <div class="clearfix"></div>
                          <a  href="new_user.php" class="btn btn-success">Adicionar</a>              
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Todos los datos presentes son de uso exclusivo del sistema
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
                          <th>Estado</th>           
                          <th>Operaciones</th>                 
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        try{
                            $res = $conexion->prepare("select * FROM usuario");
                            $res->execute();
                            $var = 1;
                            while($fila = $res->fetch()){
                              if($fila['visible']=='si'){
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
                              <?php if($fila['estado']=="retirado") {echo "<spam style='color: red '>{$fila['estado']}</spam>"; }else{echo $fila['estado'];} ?>
                            </td>     
                            <td>
                                <?php
                                    if($fila['estado']=="retirado"){?>
                                      <a href="habilitar.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-default btn-xs"> Habilitar</a>                                      
                                <?php }
                                 ?>
                                <a href="historial.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-default btn-xs"><i class="fa fa-archive"></i> Historial </a>
                                <a href="detalle_est.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detalle </a>
                                <a href="editarform_est.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                <a href="eliminar_est.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar </a>
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
          
<?php include("includes/footer.php") ?>