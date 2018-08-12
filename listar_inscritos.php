<?php include("includes/header.php") ?>      
            
<h3>Lista de inscritos: Nivel, Paralelo y Materias</h3>
<div class="row">         
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>NIVELES</h2>                         
                    <a href="reporte_ins.php" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Niveles</a>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                    <ul class="list-unstyled timeline widget">
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a>INICIAL : Paralelos habilitados A-B-C-D</a>
                                          </h2>

                                             <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Paralelo A: <?php  ?></h2>
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>                                                            
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado' && $fila['estado'] == 'habilitado') {
                                                                $pas = true;

                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>        
                                                                <ol class="list-group">
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                                </ol> 
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=inicial&curso=A" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 
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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="inicial" name="nivel" hidden>  
                                                    <input type="text" value="A" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>                                                       
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas=true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=inicial&curso=B" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="inicial" name="nivel" hidden>  
                                                    <input type="text" value="B" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas=true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=inicial&curso=C" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="inicial" name="nivel" hidden>  
                                                    <input type="text" value="C" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas=true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='inicial' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=inicial&curso=D" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="inicial" name="nivel" hidden>  
                                                    <input type="text" value="D" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                    <h2>Paralelo A: <?php  ?></h2>
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas=true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=avanzado&curso=A" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                  <!-- reporte por cursos -->
                                                  <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="avanzado" name="nivel" hidden>  
                                                    <input type="text" value="A" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas = true;
                                                            ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=avanzado&curso=B" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="avanzado" name="nivel" hidden>  
                                                    <input type="text" value="B" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=avanzado&curso=C" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="avanzado" name="nivel" hidden>  
                                                    <input type="text" value="C" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas1 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas1 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='avanzado' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=avanzado&curso=D" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas1 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="avanzado" name="nivel" hidden>  
                                                    <input type="text" value="D" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                    <h2>Paralelo A: <?php  ?></h2>
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas1 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas1 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=aplicados&curso=A" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas1 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="aplicados" name="nivel" hidden>  
                                                    <input type="text" value="A" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas1 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas1 = true;

                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=aplicados&curso=B" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas1 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="aplicados" name="nivel" hidden>  
                                                    <input type="text" value="B" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas1 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas1 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=aplicados&curso=C" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas1 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="aplicados" name="nivel" hidden>  
                                                    <input type="text" value="C" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas1 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas1 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='aplicados' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=aplicados&curso=D" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas1 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="aplicados" name="nivel" hidden>  
                                                    <input type="text" value="D" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                    <h2>Paralelo A: <?php  ?></h2>
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas2 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas2 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=complementarios&curso=A" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas2 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="complementarios" name="nivel" hidden>  
                                                    <input type="text" value="A" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas2 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas2 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=complementarios&curso=B" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas2 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="complementarios" name="nivel" hidden>  
                                                    <input type="text" value="B" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas2 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas2 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=complementarios&curso=C" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas2 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="complementarios" name="nivel" hidden>  
                                                    <input type="text" value="C" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas2 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas2 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='complementarios' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=complementarios&curso=D" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas2 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="complementarios" name="nivel" hidden>  
                                                    <input type="text" value="D" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                    <h2>Paralelo A: <?php  ?></h2>
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas3 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas3 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='A' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=especializados&curso=A" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                 <!-- reporte por cursos -->
                                                 <?php if ($pas3 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="especializados" name="nivel" hidden>  
                                                    <input type="text" value="A" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas3 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas3 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='B' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=especializados&curso=B" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas3 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="especializados" name="nivel" hidden>  
                                                    <input type="text" value="B" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas3 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas3 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='C' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=especializados&curso=C" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas3 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="especializados" name="nivel" hidden>  
                                                    <input type="text" value="C" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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
                                                            <th class="column-title">Genero</th>
                                                            <th class="column-title">Nivel</th>
                                                            <th class="column-title">Paralelo</th>                                                                                                                                                                                 
                                                            <th class="column-title">Materias|Semestre|Gestion</th>
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
                                                        $c = 1;
                                                        $pas3 = false;
                                                        while ($fila = $res1->fetch()) {
                                                            if ($fila['visible'] == 'si' && $fila['estado'] == 'habilitado') {
                                                                $pas3 = true;
                                                                ?>   
                                                         <!-- <i class="success fa fa-long-arrow-up"></i> -->
                                                        <tr class="even pointer">                          
                                                            <td><?php echo $c++; ?></td>
                                                            <td><?php echo $fila['nombre'] . " " . $fila['paterno'] . " " . $fila['materno']; ?></td>
                                                            <td><?php echo $fila['genero']; ?></td>
                                                            <td><?php echo $fila['nivel']; ?></td>                                                          
                                                            <td><?php echo $fila['curso']; ?></td>                                                          
                                                            <td>                                                                
                                                                    <?php
                                                                    $res2 = $conexion->prepare("select DISTINCT  m.nom_materia, m.gestion, m.semestre
                                                                                                    from usuario u, materia m
                                                                                                    where u.id={$fila['id_us']} and u.id=m.id_us and m.nivel='especializados' and m.curso='D' and u.visible='si' and m.visible='si'
                                                                            ");
                                                                    $res2->execute();
                                                                    while ($fila1 = $res2->fetch()) { ?>
                                                                            <i style="display: block; color:steelblue;"><?php if ($fila1['semestre'] == 1) {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:purple;'> Primero del {$fila1['gestion']}</spam>";
                                                                                                                        } else {
                                                                                                                            echo $fila1['nom_materia'] . "   |" . " <spam style='color:orange;'> Segundo del {$fila1['gestion']}</spam>";
                                                                                                                        } ?></i>                                                                    
                                                                        <?php 
                                                                    }
                                                                    ?>                                                                                                                                                                                                                                                                                                                                             
                                                            </td> 
                                                            <td> 
                                                                    <a href="editarform_ins.php?idest=<?php echo urlencode($fila['id']); ?>&nivel=especializados&curso=D" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Adicionar Materia </a> 
                                                                    <a href="retirar_mat.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-danger btn-xs"> <i class="fa fa-minus"></i> Retirar Materia</a> 
                                                                    <a href="detalle_ins.php?idest=<?php echo urlencode($fila['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>Detalle</a> 

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
                                                <!-- reporte por cursos -->
                                                <?php if ($pas3 == true) { ?>
                                                <form class="form-horizontal" novalidate action="reporte_cur.php" method="POST">
                                                    <input type="text" value="especializados" name="nivel" hidden>  
                                                    <input type="text" value="D" name="curso" hidden>  

                                                    <div class="col-md-3 col-sm-12">                                                        
                                                        <label>Semestre</label>
                                                        <select  style="width: 30%;" name="semestre" required>
                                                            <option value=0>Todo</option>
                                                            <option value=1>Primero</option>                                                            
                                                            <option value=2>Segundo</option>
                                                          </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">                                                                                                                  
                                                        <label>Materias 1</label>
                                                        <select style="width: 30%;" name="materia1">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3 col-sm-12">  
                                                        <label>Materias 2</label>                                                      
                                                        <select style="width: 30%;" name="materia2">
                                                            <option value="ninguno">Ninguno</option>
                                                            <option value="matematicas">Matematica</option>
                                                            <option value="cn. naturales">Cn. Naturales</option>
                                                            <option value="lenguaje">Lenguaje</option>
                                                            <option value="sociales">Sociales</option>
                                                        </select>                                                                                                                                                                        
                                                    </div>
                                                    <button  id="send" type="submit" class="btn btn-default"><i class="fa fa-print"></i> Reporte Cursos</button>
                                                   
                                                </form>    
                                                <?php 
                                                } ?>
                                                <!-- fin reporte po cursos -->
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