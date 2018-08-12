<?php include("includes/header.php")  ?>
<?php 
      try{
        $sql = $conexion->prepare("SELECT * FROM usuario WHERE id=".$_GET['idest']);       
        $sql->execute();         
        if($fila = $sql->fetch())
        {
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
                    <h2> <i class="fa fa-user"></i>    Estudiante </h2>                    
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-globe"></i> Datos Personales: <small><?php echo $fila['nombre']." ".$fila['paterno']." ".$fila['materno'];?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">                                                
                        <!-- /.col -->
                        
                        <div class="col-sm-12 invoice-col">
                          <b> - En documento - </b>
                          <br>
                          <br>
                          <b>Rude : </b> <?php echo $fila['rude'];?>
                          <br>
                          <b>Nombre : </b> <?php echo $fila['nombre'];?>
                          <br>
                          <b>Ap. Paterno : </b> <?php echo $fila['paterno'];?>
                          <br>
                          <b>Ap. Materno : </b> <?php echo $fila['materno'];?>
                          <br>
                          <b>Nro. Carnet : </b> <?php echo $fila['ci'];?>
                          <br>
                          <b>Fecha de Nacimiento : </b> <?php echo $fila['fechnac'];?>
                          <br>
                          <b>Genero : </b> <?php echo $fila['genero'];?>
                          <br>
                          <b>Telefono/Celular : </b> <?php echo $fila['telefono'];?>
                          <br>
                          <b>Lugar de Nacimiento : </b> <?php echo $fila['departamento'];?>
                          <br>
                          <b>Provincia : </b> <?php echo $fila['provincia'];?>
                          <br>
                          <b>Localidad : </b> <?php echo $fila['localidad'];?>
                          <br>
                          <b>Oficialia : </b> <?php echo $fila['oficialia'];?>
                          <br>
                          <b>Nro. Libro : </b> <?php echo $fila['libro'];?>
                          <br>
                          <b>Partida : </b> <?php echo $fila['partida'];?>
                          <br>
                          <b>Nro. Folio : </b> <?php echo $fila['folio'];?>
                          <br>
                          <b>Partida : </b> <?php echo $fila['partida'];?>
                          <br>
                          <b>Nro. Folio : </b> <?php echo $fila['folio'];?>
                          <br>
                          <b>Domicilio : </b> <?php echo $fila['domicilio'];?>
                          <br>
                          <b>Observaciones : </b> <?php echo $fila['observaciones'];?>
                          <br>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                                            
                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-12">
                          <a href="listar_usuarios.php" class="btn btn-success"><i class="fa fa-mail-reply"></i> Volver</a>                          
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
          }
          catch (PDOException $e) {
            print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
            die();
          }
        ?>
<?php include("includes/footer.php") ?>