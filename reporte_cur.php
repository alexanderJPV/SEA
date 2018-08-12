<?php include 'includes/plantilla_cur.php'; ?>
<?php
   /*  echo $_POST['nivel']."<br>";
    echo $_POST['curso']."<br>";
    echo $_POST['semestre']."<br>";
    echo $_POST['materia1']."<br>";
    echo $_POST['materia2']."<br>";  */
   try {
        $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }   
    if($_POST['materia1']=='ninguno' || $_POST['materia2']=='ninguno'){
        header("location:listar_inscritos.php"); 
    }
    if($_POST['semestre']==0){
        $sql = $conexion->prepare("SELECT distinct u.id, u.nombre,u.paterno, u.materno, u.observaciones
                                FROM usuario u,materia m 
                                where u.id=m.id_us and u.visible='si' and m.visible='si' and  m.nivel='{$_POST['nivel']}' and m.curso='{$_POST['curso']}'
                                and u.estado='habilitado' and  (m.nom_materia='{$_POST['materia1']}' or m.nom_materia='{$_POST['materia2']}')
                                order by u.paterno");    
         $sql->execute();                                 
    }else{
        $sql = $conexion->prepare("SELECT distinct u.id, u.nombre,u.paterno, u.materno, u.observaciones
                                FROM usuario u,materia m 
                                where u.id=m.id_us and u.visible='si' and m.visible='si' and  m.nivel='{$_POST['nivel']}' and m.curso='{$_POST['curso']}'
                                and u.estado='habilitado' and m.semestre={$_POST['semestre']} and  (m.nom_materia='{$_POST['materia1']}' or m.nom_materia='{$_POST['materia2']}')
                                order by u.paterno");    
        $sql->execute();                                 
    }
   

    $pdf = new PDF;       
    $pdf->AliasNbPages(); 
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,10,"APRENDISAJE ".strtoupper($_POST['nivel']),1,1,'C',1);
    $pdf->Cell(190,10,"CURSO - ".strtoupper($_POST['curso']),1,1,'C',1);
    $pdf->Cell(190,10,strtoupper($_POST['materia1'])." - ".strtoupper($_POST['materia2']),1,1,'C',1);
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(10,10,'Nro.',1,0,'C',1);
    $pdf->Cell(40,10,'APELLIDO PATERNO',1,0,'C',1);
    $pdf->Cell(40,10,'APELLIDO MATERNO',1,0,'C',1);
    $pdf->Cell(50,10,'NOMBRES',1,0,'C',1);
    $pdf->Cell(50,10,'OBSERVACIONES',1,1,'C',1);    
    
    $pdf->SetFont('Arial','',8);
    $co=1;
    while($fila = $sql->fetch()){
        $pdf->Cell(10,8,$co,1,0,'C');
        $pdf->Cell(40,8,strtoupper($fila['paterno']),1,0,'C');
        $pdf->Cell(40,8,strtoupper($fila['materno']),1,0,'C');
        $pdf->Cell(50,8,strtoupper($fila['nombre']),1,0,'C');        
        $pdf->Cell(50,8,strtoupper($fila['observaciones']),1,1,'C');        
        $co++;
    } 

    $pdf->Output();
?>

