<?php

namespace VimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class VimePDFController extends Controller
{
    /**
     * @Route("/generatePDF", name="vimePDF")
     */
    public function GeneratePDFAction()
    {
      $fechaActual = new \DateTime("now"); /** Fecha Actual */

      $pdf = $this->container->get("white_october.tcpdf")
      ->create('horizontal',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);



      $pdf->SetAuthor('Rosmel');
      $pdf->SetTitle('Informe de Visita');
      $pdf->SetKeywords('informe de visita, vime');
      $pdf->setPageOrientation("L");
      $pdf->SetPrintHeader(false);
      $pdf->SetMargins(20,22,18, true);
      $pdf->SetAutoPageBreak(FALSE, 0);
      $pdf->setCellPaddings(3,0,0,0);

      $pdf->AddPage();

      $pdf->SetFont('helvetica', 'B' ,20);
      $pdf->setJPEGQuality(100);
      $pdf->Image('imagen/logo.png',240, 25, 40,'R');
      $pdf->Cell(0, 5, 'Cadena de Tiendas:', 0,'L');
      $pdf->Ln();
      $pdf->Cell(0, 5, 'Nombre de la Tienda:', 0,'L');

      $pdf->Ln(15);

      $pdf->SetFont('helvetica', 'B', 13);

      $pdf->Cell(40,6,'Tipo de Visita',1,0,'L');
      $pdf->Cell(65,6,'Fecha',1,0,'L');
      $pdf->Cell(55,6,'Participantes',1,0,'L');
      $pdf->Cell(100,6,'Resultados Obtenidos',1,0,'L');

      $pdf->Ln();

      $pdf->setCellPaddings(3,2,0,0);
      $pdf->SetFont('helvetica', '', 13);
      $pdf->MultiCell(40,120,'Visita Fisica','LTRB','L',0,0);
      $pdf->MultiCell(65,120,$fechaActual->format('j \of F \of Y'),'LTRB','L',0,0);
      $participante = "Juan Perez";
      $pdf->SetFont('helvetica', 'I', 13);
      $gerencia     = "Gerente Marketing";
      $pdf->MultiCell(55,120,$participante. chr(10) .$gerencia,'LTRB','L',0,0);
      $pdf->SetFont('helvetica', 'B', 13);
      $checklist    = "Checklist Realizado:";
      $respuestas   = "Respuestas Obtenidas";
      $pdf->MultiCell(100,120,$checklist. "\n\n\n\n\n\n".$respuestas,'LTRB','L',0,0);


      /** Footer */
      $pdf->setCellPaddings(0,0,0,5);
      $pdf->SetFont('helvetica', 'B', 8);
      $pdf->SetY(-8);
      $pdf->Cell(0, 0, 'Fecha de Impresión:'.$fechaActual->format('d-m-Y'), 0, true, 'L');
      $pdf->SetY(-8);
      $pdf->Cell(0, 0, 'Hora de Impresión:'.$fechaActual->format('h:i:s A'), 0, true, 'C');
      $pdf->SetY(-8);
      $pdf->Cell(0, 0, 'Usuario de Impresión:', 0, true, 'R');


      $pdf->writeHTMLCell($ln = 1,$fill = 0,$reseth = true, $align = '',$autopadding = true);


      $pdf->Output("InformeVisita.pdf", 'I');

    }





    /**
     * @Route("/generatePDF2", name="vimePDF2")
     */
    public function GeneratePDF2Action()
    {
      $fechaActual = new \DateTime("now"); /** Fecha Actual */

      $pdf = $this->container->get("white_october.tcpdf")
      ->create('horizontal',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);

      $pdf->SetAuthor('Rosmel');
      $pdf->SetTitle('Informe de Visita');
      $pdf->SetKeywords('informe de visita, vime');
      $pdf->setPageOrientation("L");
      $pdf->SetPrintHeader(false);
      $pdf->SetMargins(20,15,18, true);
      $pdf->SetAutoPageBreak(FALSE, 0);
      $pdf->setCellPaddings(3,0,0,0);

      $pdf->AddPage();

      $pdf->SetFont('helvetica', 'B' ,29);
      $pdf->setJPEGQuality(100);
      $pdf->Image('imagen/logo.png',238, 19, 40,'R');
      $pdf->Cell(0, 5, 'Titulo de Tarea', 0,'L');
      $pdf->Ln();
      $pdf->Cell(0, 5, 'Prioridad', 0,'L');
      $pdf->Ln(17);

      $pdf->SetFont('helvetica', '', 13, '', true);
      $pdf->Cell(55,6,'Fecha y Hora de Entrega',1,0,'L');
      $pdf->Cell(203,6,$fechaActual->format('j \of F \of Y h:i:s A'),1,0,'L');
      $pdf->Ln();
      $pdf->Cell(55,6,'Responsables',1,0,'L');
      $pdf->Cell(203,6,'Juan Perez, Jaime Ospina, Miguel Hernández',1,0,'L');
      $pdf->Ln();
      $pdf->setCellPaddings(3,2,0,0);
      $descripcion = "Descripción Larga";
      $pdf->MultiCell(55,70,$descripcion,'LTRB','L',0,0);
      $pdf->MultiCell(203,70,'','LTRB','L',0,0);
      $pdf->Ln(72);

      $pdf->MultiCell(43,40,'Foto1','LTRB','L',0,0);
      $pdf->MultiCell(43,40,'Foto2','LTRB','L',0,0);
      $pdf->MultiCell(43,40,'Foto3','LTRB','L',0,0);
      $pdf->MultiCell(43,40,'Foto4','LTRB','L',0,0);
      $pdf->MultiCell(43,40,'Foto5','LTRB','L',0,0);
      $pdf->MultiCell(43,40,'Foto6','LTRB','L',0,0);

      /** Footer */
      $pdf->setCellPaddings(0,0,0,5);
      $pdf->SetFont('helvetica', 'B', 8, '', true);
      $pdf->SetY(-8);
      $pdf->Cell(0, 0, 'Fecha de Impresión:'.$fechaActual->format('d-m-Y'), 0, true, 'L');
      $pdf->SetY(-8);
      $pdf->Cell(0, 0, 'Hora de Impresión:'.$fechaActual->format('h:i:s A'), 0, true, 'C');
      $pdf->SetY(-8);
      $pdf->Cell(0, 0, 'Usuario de Impresión:', 0, true, 'R');

      $pdf->writeHTMLCell($ln = 1,$fill = 0,$reseth = true,$align = '',$autopadding = true);

      $pdf->Output("InformeVisita.pdf", 'I');

    }




}
