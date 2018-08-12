<?php 
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
      } catch (PDOException $e) {
          print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
      }      
      /* echo $_GET['idins']; */
       try{
        $sql = $conexion->prepare("UPDATE materia SET visible='no' WHERE id_mat={$_GET['idins']}");       
        $sql->execute();
        $sql = $conexion->prepare("UPDATE materia SET nota=0 WHERE id_mat={$_GET['idins']}");       
        $sql->execute();         
        header("location:listar_inscritos.php");   
        }
      catch (PDOException $e) {
        print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
        die();
      } 
?>