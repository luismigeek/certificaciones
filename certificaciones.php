<?php

require('fpdf/fpdf.php');

class PDF extends FPDF{

    function Header(){
        $this->Image('fpdf/ministerio.png',10,6,30);
        $this->SetFont('Helvetica','B',18);

        $this->Cell(60);
        $this->Cell(100,10,'CABILDO INDIGENA RETIRO DE LOS INDIOS',0,0,'C');
        $this->Ln(10);

        $this->Cell(60);
        $this->Cell(100,10,utf8_decode('DEL PUEBLO ZENÚ DE CERETÉ-CORDOBA'),0,0,'C');
        $this->Cell(15);
        $this->Ln(30);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }
}



// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$pdf->Cell(0,10, utf8_decode('La suscrita capitana del cabildo indigena del Retiro de los Indios, Municipio de Cereté, En uso de '));
$pdf->Ln(5);
$pdf->Cell(0,10,'sus facultades legales que le otorga la ley 89 de 1890 ARTICULO 3° DE NOV. DE 1890  ');
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('Y de acuerdo con la Constitución Política de Colombia.'));
$pdf->Ln(30);

$pdf->SetFont('Helvetica','',12);
$pdf->Cell(70);
$pdf->Cell(0,10,'HACE CONSTAR QUE:');
$pdf->Ln(20);

$pdf->Cell(0,10,utf8_decode($_GET['name'].' '.$_GET['ape']. ' identificado con C.C. '.$_GET['cc']. ' de '.$_GET['exp']. ', '));
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('presentó ante la asamblea general el proyecto de: '.$_GET['pro']. '. el cual cuenta '));
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('con nuestro aval y apoyo. Viene siendo desarrollado y evaluado, teniendo en cuenta su plan'));
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('de actividades. La anterior certificación se expide a solicitud del interesado para ser'));
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('anexada como avances y ser presentada ante el ICETEX, para renovación en el '));
$pdf->Ln(5);
$pdf->Cell(0,10,utf8_decode('fondo ALVARO ULCUÉ CHOCUÉ.'));
$pdf->Output();

 

