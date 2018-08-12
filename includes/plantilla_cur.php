<?php
    require 'fpdf/fpdf.php';
    class PDF extends FPDF
    {
        function Header(){
            /* $this->Image('images/birrete.png',5,5,30); */
            $fecha=date('d, F, Y');
            $this->SetFont('Arial', '', 6);
            $this->Cell(50, 5, 'Sub Direccion  de Educacion Alternativa y Especial', 'C', 0, 0);
            $this->Cell(140, 5, $fecha, 0, 1,'R');        

            $this->Cell(130, 2, '          Direccion Departamental de Educacion', 'C', 1, 1);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(50);     
            $this->Ln(5);            
        }
        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
        }
    }
?>