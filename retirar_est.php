<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
      } catch (PDOException $e) {
          print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
      }      
       /* echo $_GET['idus'];  */
      try{
        $sql = $conexion->prepare("UPDATE usuario SET estado='retirado' WHERE id={$_GET['idus']}");
        $sql->execute();         
        $sql = $conexion->prepare("UPDATE materia SET visible='no' WHERE id_us={$_GET['idus']}");
        $sql->execute();      
        header("location:inscribir_est.php");   
        }
      catch (PDOException $e) {
        print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
        die();
      }
?>