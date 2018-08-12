<?php include("includes/header.php") ?>
<h3>Lista para asignar Notas</h3>
<div class="row">         
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>NIVELES</h2>            
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">                            
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo A: <?php ?></h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th>
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='inicial' and m.curso='A' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                             <td>                                                              
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                        ");
                                                                        $res2->execute();                                                                                                                                               
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>
                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }
                                                                        ?>     
                                                            </td>
                                                            <td>                                                              
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                        ");
                                                                        $res2->execute();                                                                                                                                               
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>
                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                            }                                                                                                                                                    
                                                                        }
                                                                        ?>     
                                                            </td>                                                      
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=inicial&curso=A" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                               
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>

                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo B</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>                                                             
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th>
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='inicial' and m.curso='B' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>
                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }   
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>
                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }   
                                                                        ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=inicial&curso=B" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                         
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo C</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>                                                             
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th>    
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='inicial' and m.curso='C' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>
                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }   
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>
                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }   
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=inicial&curso=c" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo D</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>                                                             
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='inicial' and m.curso='D' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=inicial&curso=D" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                         
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>                                                                         
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>AVANZADOS : Paralelos habilitados A-B-C-D</a>
                                          </h2> 
                                          <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo A: <?php ?></h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>                                                            
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='avanzado' and m.curso='A' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=avanzado&curso=A" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                  
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>

                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo B</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='avanzado' and m.curso='B' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=avanzado&curso=B" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                              
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo C</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='avanzado' and m.curso='C' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=avanzado&curso=C" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                            
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo D</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='avanzado' and m.curso='D' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }      
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }      
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=avanzado&curso=D" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>                                                                         
                             
                                                                   
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>APLICADOS : Paralelos habilitados A-B-C-D</a>
                                          </h2>     
                                          <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo A: <?php ?></h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='aplicados' and m.curso='A' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=aplicados&curso=A" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                       
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>

                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo B</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='aplicados' and m.curso='B' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=aplicados&curso=B" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                           
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo C</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='aplicados' and m.curso='C' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=aplicados&curso=C" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                          
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo D</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='aplicados' and m.curso='D' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=aplicados&curso=D" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                              
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>                                                  
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>COMPLEMENTARIOS : Paralelos habilitados A-B-C-D</a>
                                          </h2>      
                                          <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo A: <?php ?></h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='complementarios' and m.curso='A' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }     
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=complementarios&curso=A" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                 
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>

                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo B</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='complementarios' and m.curso='B' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=complementarios&curso=B" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                 
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo C</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='complementarios' and m.curso='C' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                     ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                     ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=complementarios&curso=C" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                               
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo D</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='complementarios' and m.curso='D' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=complementarios&curso=D" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                  
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div> 
                                                  
                          </div>
                        </div>
                      </li>
                      <li>
                      <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>ESPECIALIZADOS : Paralelos habilitados A-B-C-D</a>
                                          </h2>    
                                          <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo A: <?php ?></h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='especializados' and m.curso='A' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>  
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=especializados&curso=A" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                 
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>

                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo B</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='especializados' and m.curso='B' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=especializados&curso=B" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                               
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo C</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='especializados' and m.curso='C' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                        
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td> 
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=especializados&curso=C" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                           
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>
                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo D</h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>                     
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="table-responsive">
                                                    <table class="table table-striped jambo_table bulk_action">
                                                        <thead>
                                                        <tr class="headings">                            
                                                            <th class="column-title">Nro</th>
                                                            <th class="column-title">Nombre</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Notas Primer Semestre</th>
                                                            <th class="column-title">Notas Segundo Semestre</th> 
                                                            <th class="column-title">Operaciones</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                         <?php
                                                         $res1 = $conexion->prepare("select  DISTINCTROW  m.id_us,m.nivel,m.curso, u.*
                                                                                     from materia m, usuario u
                                                                                     where  u.id=m.id_us and m.nivel='especializados' and m.curso='D' and u.visible='si' and m.visible='si'                                                                                                                     
                                                             ");
                                                         $res1->execute();
                                                         $c=1;
                                                         while($fila = $res1->fetch()){
                                                            if($fila['visible']=='si'){

                                                         ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno']; ?></td>
                                                            
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                                                                                                
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==1){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td>                                                                
                                                                    <?php
                                                                        $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.id_mat, m.nota, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                        $res2->execute();                                                                                                                                                
                                                                        while($fila1 = $res2->fetch()){
                                                                            if($fila1['semestre']==2){?>                                                                                
                                                                                <div style="display: inline-block; width: 90px;"> <label> <?php echo $fila1['nom_materia']; ?></label> </div>
                                                                                <?php if($fila1['nota']<51){ ?>
                                                                                <input style="background-color: #CA1C27; width: 40px;" type="number" name="id_mat" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php }else{?>
                                                                                <input style="background-color: skyblue; width: 40px
                                                                                ;" type="number" name="<?php echo $fila1['nom_materia']; ?>" value="<?php echo $fila1['nota']; ?>" disabled>
                                                                                <?php } 
                                                                               
                                                                             }                                                                                                                                                     
                                                                        }    
                                                                    ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                            </td>
                                                            <td> 
                                                                    <a href="new_not.php?idest=<?php echo urlencode($fila['id']);?>&nivel=especializados&curso=D" class="btn btn-success btn-xs"><i class="fa-database"></i> Calificar </a>                                                  
                                                            </td>                                                                                                              
                                                        </tr>    
                                                        <?php
                                                            }
                                                        }                                                                
                                                        ?>                                                  
                                                        </tbody>
                                                    </table>
                                                    </div>													
                                                </div>
                                             </div>                         
                          </div>
                        </div>
                     </li>    
                    </ul>
                  </div>
                </div>
              </div>
            </div>
</div>


<?php include("includes/footer.php") ?>