<?php include 'includes/plantilla_reporte_ins.php'; ?>
<?php
try {
    $conexion = new PDO('mysql:host=localhost;dbname=CEMA',"root", "123");       
  } catch (PDOException $e) {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
  } 
  /* Total Final */
  $sql = $conexion->prepare("select count(distinctrow m.id_us) as n,m.nivel, m.curso
                                from materia m, usuario u
                                where u.id=m.id_us and u.visible='si'
                                group by m.nivel, m.curso
                                order by m.nivel desc");    
    $sql->execute();             
    $co=0;
    while($fila = $sql->fetch()){
        $vnom[$co]=$fila['nivel'];
        $vcur[$co]=$fila['curso'];        
        $vn[$co]=0;
        $vv[$co]=0;
        $vnr[$co]=0;
        $vvr[$co]=0;
        $co++;
    }
  /* inscritos VARONES*/
    $sql1 = $conexion->prepare("select count(distinctrow m.id_us) as n,m.nivel, m.curso
                                from materia m, usuario u
                                where u.id=m.id_us and  m.visible='si' and u.visible='si' and u.genero='M' and u.estado='habilitado'
                                group by m.nivel, m.curso
                                order by m.nivel desc");    
    $sql1->execute();             
    $co=0;
    while($fila1 = $sql1->fetch()){
        $vnom1[$co]=$fila1['nivel'];
        $vcur1[$co]=$fila1['curso'];
        $vn1[$co]=$fila1['n'];
        $co++;
    }
    for ($i=0; $i <count($vnom) ; $i++) { 
        for ($j=0; $j <count($vnom1) ; $j++) { 
            if($vnom[$i]==$vnom1[$j] && $vcur[$i]==$vcur1[$j]){
                $vv[$i]=$vn1[$j];
            }
        }   
    }

/* Inscritos Total*/
     $sql2 = $conexion->prepare("select count(distinctrow m.id_us) as n,m.nivel, m.curso
	                            from materia m, usuario u
	                            where u.id=m.id_us and  m.visible='si' and u.visible='si' and u.estado='habilitado'
	                            group by m.nivel, m.curso
	                            order by m.nivel desc");    
    $sql2->execute();             
    $co=0;
    while($fila2 = $sql2->fetch()){
        $vnom2[$co]=$fila2['nivel'];
        $vcur2[$co]=$fila2['curso'];
        $vn2[$co]=$fila2['n'];      
        $co++;
    }    
    for ($i=0; $i <count($vnom) ; $i++) { 
        for ($j=0; $j <count($vnom2) ; $j++) { 
            if($vnom[$i]==$vnom2[$j] && $vcur[$i]==$vcur2[$j]){
                $vn[$i]=$vn2[$j];
            }
        }   
    }    
    /* retirado hombres*/ 
    $sql3 = $conexion->prepare("select count(distinctrow m.id_us) as n,m.nivel, m.curso
                                from materia m, usuario u
                                where u.id=m.id_us and u.visible='si' and u.genero='M' and u.estado='retirado'
                                group by m.nivel, m.curso
                                order by m.nivel desc");    
    $sql3->execute();             
    $co=0;
    while($fila3 = $sql3->fetch()){
        $vnom3[$co]=$fila3['nivel'];
        $vcur3[$co]=$fila3['curso'];
        $vnr3[$co]=$fila3['n'];      
        $co++;
    }    
    for ($i=0; $i <count($vnom) ; $i++) { 
        for ($j=0; $j <count($vnom3) ; $j++) { 
            if($vnom[$i]==$vnom3[$j] && $vcur[$i]==$vcur3[$j]){
                $vvr[$i]=$vnr3[$j];
            }
        }   
    }    
    /* retirados Total*/ 
    $sql4 = $conexion->prepare("select count(distinctrow m.id_us) as n,m.nivel, m.curso
                                from materia m, usuario u
                                where u.id=m.id_us and u.visible='si' and u.estado='retirado'
                                group by m.nivel, m.curso
                                order by m.nivel desc");    
    $sql4->execute();             
    $co=0;
    while($fila4 = $sql4->fetch()){
        $vnom4[$co]=$fila4['nivel'];
        $vcur4[$co]=$fila4['curso'];
        $vnr4[$co]=$fila4['n'];      
        $co++;
    }    
    for ($i=0; $i <count($vnom) ; $i++) { 
        for ($j=0; $j <count($vnom4) ; $j++) { 
            if($vnom[$i]==$vnom4[$j] && $vcur[$i]==$vcur4[$j]){
                $vnr[$i]=$vnr4[$j];
            }
        }   
    }
    $pdf = new PDF;       
    $pdf->AliasNbPages(); 
    $pdf->AddPage();
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(10,10,'Nro.',1,0,'C',1);
    $pdf->Cell(30,10,'Nivel',1,0,'C',1);
    $pdf->Cell(10,10,'Paralelo',1,0,'C',1);
    $pdf->Cell(40,5,'Inscritos',1,0,'C',1);
    $pdf->Cell(15,10,'Total',1,0,'C',1);
    $pdf->Cell(40,5,'Retirados',1,0,'C',1);
    $pdf->Cell(15,10,'Total',1,0,'C',1);
    $pdf->Cell(0,5,'',0,1,1);
    $pdf->Cell(50,5,'',0,0);
    $pdf->Cell(20,5,'Hombres',1,0,'C',1);
    $pdf->Cell(20,5,'Mujeres',1,0,'C',1);
    $pdf->Cell(15,5,'',0,0);
    $pdf->Cell(20,5,'Hombres',1,0,'C',1);
    $pdf->Cell(20,5,'Mujeres',1,1,'C',1);
    /* $pdf->Cell(20,6,'Retirados Mujeres',1,0,'C',1);
    $pdf->Cell(20,6,'Retirados Varones',1,0,'C',1);
    $pdf->Cell(10,6,'Total',1,1,'C',1); */
    $pdf->SetFont('Arial','',10);
    $sumv=0;
    $sumvr=0;
    $summ=0;
    $summr=0;
    $sumt=0;
    $sumtr=0;
    $c=1;    
    for ($i=0; $i <count($vnom) ; $i++){
        //nivel
        $pdf->Cell(10,6,$c,1,0,'C');
        //nivel
        $pdf->Cell(30,6,$vnom[$i],1,0,'C');
        //Paralelos
        $pdf->Cell(10,6,$vcur[$i],1,0,'C');
        //fila hombres
        $pdf->Cell(20,6,$vv[$i],1,0,'C');
        $sumv+=$vv[$i];
        //fila mujeres
        $pdf->Cell(20,6,$vn[$i]-$vv[$i],1,0,'C');
        $summ+=$vn[$i]-$vv[$i];
        //total
        $pdf->Cell(15,6,$vn[$i],1,0,'C');
        $sumt+=$vn[$i];
        //hombres retirados
        $pdf->Cell(20,6,$vvr[$i],1,0,'C');
        $sumvr+=$vvr[$i];
        //mujeres retirados
        $pdf->Cell(20,6,$vnr[$i]-$vvr[$i],1,0,'C');
        $summr+=$vnr[$i]-$vvr[$i];
        //total retirados
        $pdf->Cell(15,6,$vnr[$i],1,1,'C');
        $sumtr+=$vnr[$i];
       /*  $pdf->Cell(20,6,0,1,0,'C');
        $pdf->Cell(20,6,0,1,0,'C');
        $pdf->Cell(10,6,0,1,1,'C'); */
        $c++;
    }
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(40,6,'Total',1,0,'C',1);
    $pdf->Cell(10,6,$c-1,1,0,'C',1);
    $pdf->Cell(20,6,$sumv,1,0,'C',1);
    $pdf->Cell(20,6,$summ,1,0,'C',1);
    $pdf->Cell(15,6,$sumt,1,0,'C',1);
    /* Total retirados */
    $pdf->Cell(20,6,$sumvr,1,0,'C',1);
    $pdf->Cell(20,6,$summr,1,0,'C',1);
    $pdf->Cell(15,6,$sumtr,1,1,'C',1); 
    
    $pdf->Output(); 
?>
