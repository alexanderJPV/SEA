<?php
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=CEMA', "root", "123");
            } catch (PDOException $e) {
                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();
            }

            if($_POST['id_matm']){
                /* echo $_POST['id_matm'];
                echo $_POST['mat']. "<br>"; */
                $sql = $conexion->prepare("UPDATE materia SET nota='{$_POST['mat']}' WHERE id_mat={$_POST['id_matm']}");       
                $sql->execute();  
            }
            if($_POST['id_matc']){
               /*  echo $_POST['id_matc'];
                echo $_POST['natu'] . "<br>"; */
                $sql = $conexion->prepare("UPDATE materia SET nota='{$_POST['natu']}' WHERE id_mat={$_POST['id_matc']}");       
                $sql->execute();  
            }
            if($_POST['id_matl']){
             /*    echo $_POST['id_matl'];
                echo $_POST['len'] . "<br>"; */
                $sql = $conexion->prepare("UPDATE materia SET nota='{$_POST['len']}' WHERE id_mat={$_POST['id_matl']}");       
                $sql->execute();  
            }            
            if($_POST['id_mats']){
               /*  echo $_POST['id_mats'];
                echo $_POST['soci'] . "<br>"; */
                $sql = $conexion->prepare("UPDATE materia SET nota='{$_POST['soci']}' WHERE id_mat={$_POST['id_mats']}");       
                $sql->execute();  
            }
            header("location:notas.php"); 
                                  
                                    
?>