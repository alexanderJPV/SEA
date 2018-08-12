<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
  /*   echo $_POST['id_us']."<br>";
    echo $_POST['gestion']."<br>";
    echo $_POST['semestre']."<br>";
    echo $_POST['nivel']."<br>";
    echo $_POST['curso']."<br>";
    echo $_POST['nom_materia']."<br>";
    echo $_POST['fecha'];
 */
 
    try {
        $sql = $conexion->prepare("INSERT INTO `materia` (`id_us`, `gestion`, `nivel`, `curso`, `nom_materia`, `fecha_inscripcion`, `nota`, `visible`, `semestre`)
                                                          VALUES ('".$_POST['id_us']."', '".$_POST['gestion']."',
                                                           '".$_POST['nivel']."', '".$_POST['curso']."', 
                                                           '".$_POST['nom_materia']."', '".$_POST['fecha']."', '0', 'si','".$_POST['semestre']."');");      
        $sql->execute();
        header("location:listar_inscritos.php");  
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    } 
?>