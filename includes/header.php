<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>SEA</title>
    <!-- Bootstrap -->
    <link href="css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="css/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <?php 
    try {
      $conexion = new PDO('mysql:host=localhost;dbname=CEMA', "root", "123");
    } catch (PDOException $e) {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    try {
      $sql5 = $conexion->prepare("SELECT count(id)
                                    FROM usuario u
                                    where u.visible='si'");
      $sql5->execute();
      $fila5 = $sql5->fetch();
    } catch (PDOException $e) {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-graduation-cap"></i> <span>S.E.A.</span> </a>
            </div>
            <div class="clearfix"></div>
            <!-- menu perfil administrador -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/media.jpg" alt="foto" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>Administrador</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- Lista menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="escritorio.php">Escritorio</a></li>                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Estudiantes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="new_user.php">Adicionar</a></li>
                      <li><a href="listar_usuarios.php">Listar</a></li>                      
                    </ul>
                  </li>                                                     
                  <li><a><i class="fa fa-edit"></i> Inscripcion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="inscribir_est.php">Inscribir</a></li>                    
                      <li><a href="listar_inscritos.php">Materias </a></li>                    
                    </ul>
                  </li>                 
                  <li><a><i class="fa fa-building-o"></i> Notas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="notas.php">Calificar</a></li>                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Estadisticas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="estadisticas.php">Generar Grafico</a></li>                    
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bell-slash"></i>Gestion <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="finalizar.php">Finalizar</a></li>                    
                    </ul>
                  </li>
                </ul>
              </div>              
            </div>
            <!-- /lista menu -->
          </div>
        </div>
        <!-- encabezado del menu navegacion -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/birrete.png" alt="">Administrador
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">                    
                    <li><a href="Salida.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-users"></i>
                    <span class="badge bg-green"><?php echo $fila5['count(id)']; ?></span>                    
                  </a>                                                     
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /encabezado menu de navegacion -->
        <!-- Contenido -->
        <div class="right_col" role="main">