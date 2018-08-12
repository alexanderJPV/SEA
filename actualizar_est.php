<?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");
            
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    /* echo $_POST['id']."<br>";
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
    echo $_POST['observaciones']."<br>"; */
    try{
        $sql = $conexion->prepare("UPDATE usuario SET rude='".$_POST['rude']."',
                                    nombre='".$_POST['name']."',
                                    paterno='".$_POST['paterno']."',
                                    materno='".$_POST['materno']."',
                                    ci='".$_POST['ci']."',
                                    fechnac='".$_POST['fechnac']."',
                                    genero='".$_POST['genero']."',
                                    telefono='".$_POST['tel']."',
                                    departamento='".$_POST['dep']."',
                                    provincia='".$_POST['provincia']."',
                                    localidad='".$_POST['localidad']."',
                                    oficialia='".$_POST['oficialia']."',
                                    libro='".$_POST['libro']."',
                                    partida='".$_POST['partida']."',
                                    folio='".$_POST['folio']."',
                                    domicilio='".$_POST['domicilio']."',
                                    observaciones='".$_POST['observaciones']."'
                                    WHERE id={$_POST['id']}");       
        $sql->execute();         
        header("location:listar_usuarios.php");   
    }
    catch (PDOException $e) {
         print "¡Error al Actualizar!: " . $e->getMessage() . "<br/>";
         die();
    }


?>