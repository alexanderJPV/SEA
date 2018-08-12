<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");
      } catch (PDOException $e) {
          print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
      }
      /* echo $_GET['idins']; */
       try{
      $sql = $conexion->prepare("UPDATE materia SET visible='no'");
        $sql->execute();
        header("location:inscribir_est.php");
        }
      catch (PDOException $e) {
        print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
        die();
      }
?>