<?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");
            
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    //Alta registros 

    try{
     /*  
        echo $_POST['rude']."<br>";
        echo $_POST['name']."<br>";
        echo $_POST['paterno']."<br>";
        echo $_POST['materno']."<br>";
        echo $_POST['ci']."<br>";
        echo $_POST['fechnac']."<br>";
        echo $_POST['genero']."<br>";
        echo $_POST['tel']."<br>";
        echo $_POST['dep']."<br>";
        echo $_POST['provincia']."<br>";
        echo $_POST['localidad']."<br>";
        echo $_POST['oficialia']."<br>";        
        echo $_POST['libro']."<br>";
        echo $_POST['partida']."<br>";
        echo $_POST['folio']."<br>";
        echo $_POST['domicilio']."<br>";
        echo $_POST['observaciones']."<br>";  */
        $sql = $conexion->prepare("INSERT INTO usuario(`rude`, `nombre`, `paterno`, `materno`, `ci`, `fechnac`, `genero`, `telefono`, `departamento`,`provincia`, `localidad`, `oficialia`, `libro`, `partida`, `folio`, `domicilio`, `observaciones`, `visible`,`estado`)
                                           VALUES('".$_POST['rude']."','".$_POST['name']."', '".$_POST['paterno']."', '".$_POST['materno']."', '".$_POST['ci']."', '".$_POST['fechnac']."', '".$_POST['genero']."', '".$_POST['tel']."', '".$_POST['dep']."','Los Andes','".$_POST['localidad']."', '".$_POST['oficialia']."', '".$_POST['libro']."', '".$_POST['partida']."', '".$_POST['folio']."', '".$_POST['domicilio']."', '".$_POST['observaciones']."','si','habilitado')");       
        $sql->execute();
        header("location:listar_usuarios.php"); 
     }
    catch (PDOException $e) {
        print "¡Error al guardar!: " . $e->getMessage() . "<br/>";
    die();
    }

?>
