<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
      } catch (PDOException $e) {
          print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
      }      
     /*  echo $_GET['idest'];*/
      try{
        $sql = $conexion->prepare("UPDATE usuario SET estado='habilitado' WHERE id={$_GET['idest']}");       
        $sql->execute();     
        header("location:listar_usuarios.php");   
        }
      catch (PDOException $e) {
        print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
        die();
      }
?>