<?php
require('tfpdf/tfpdf.php');

class PDF extends tFPDF
{
    // Page header
    function Header()
    {

        $this->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
        $this->SetFont('DejaVu', '', 20);

        // Move to the right
        $this->Cell(80);

        // Header
        $this->Cell(50, 10, 'Rēķins Nr.', 1, 0, 'C');
        $this->Ln();
        $this->Cell(80);
        $this->Cell(50, 10, time(), 1, 0, 'C');

        // Line break
        $this->Ln(20);
    }

}

$mysql = new mysqli('localhost', 'root', '', 'etalons');

$serial = filter_var(trim($_POST['serial']), FILTER_SANITIZE_STRING);
$biljett = filter_var(trim($_POST['biljett']), FILTER_SANITIZE_STRING);
$qty = filter_var(trim($_POST['qty']), FILTER_SANITIZE_STRING);
$result = $mysql->query("SELECT `visibleName`, `price` FROM `tickettype` WHERE `name` = '$biljett'");
$biljettTyp = $result->fetch_assoc();
/*
$invoice = new InvoicePrinter('Letter', '$', 'et');
/* Header settings
$invoice->setColor("#007fff"); // pdf color scheme
$invoice->setType("Sale Invoice"); // Invoice Type
$invoice->setReference("INV-55033645"); // Reference
$invoice->setDate(date('M dS ,Y', time())); //Billing Date
$invoice->setTime(date('h:i:s A', time())); //Billing Time
$invoice->setFrom(array("SIA \"Sabiedrība\"", "Sabiedrība", "1, Tāda iela", "Pilsētas pilsēta, Pilsētas novads, LV-9999"));
$invoice->setTo(array("Pircējs Naudiņš", "fiz.persona, eTalona nr. $serial", "333, Šitā iela", "Pilsētas pilsēta, Pilsētas novads, LV-9999"));

$invoice->addItem("$biljett", "", "$qty", "21%", $biljettTyp['price'], 0, $biljettTyp['price'] * $qty);

$sum = $biljettTyp['price'] * $qty;

$invoice->addTotal("Total w/o VAT", $sum / 1.21);
$invoice->addTotal("VAT 21%", $sum - ($sum * 0.79));
$invoice->addTotal("Total", $sum, true);

$invoice->render('invoice.pdf', 'I');
 I => Display on browser, D => Force Download, F => local path save, S => return document as string */
//$mysql->close();
// Instantiate and use the FPDF class 
$pdf = new PDF();
$date = date('m/d/Y', time());
$time = date('h:i:s A', time());

//Add a new page
$pdf->AddPage();

// Set the font for the text
$pdf->SetFont('DejaVu', '', 10);

// Prints a cell with given text 
$pdf->Cell(0, 5, $date, 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(0, 5, $time, 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(60, 5, "SIA \"Sabiedrība\"");
$pdf->Ln();
$pdf->Cell(60, 5, "Sabiedrība");
$pdf->Ln();
$pdf->Cell(60, 5, "1, Tāda iela");
$pdf->Ln();
$pdf->Cell(60, 5, "Pilsētas pilsēta, Pilsētas novads, LV-9999");
$pdf->Ln(10);
$pdf->Cell(60, 5, $_COOKIE['user']);
$pdf->Ln();
$pdf->Cell(60, 5, "fiz.persona, eTalona nr. $serial");
$pdf->Ln();
$pdf->Cell(60, 5, "333, Šitā iela");
$pdf->Ln();
$pdf->Cell(60, 5, "Pilsētas pilsēta, Pilsētas novads, LV-9999");
$pdf->Ln(20);

$pdf->Cell(90, 10, 'Nosaukums', 1, 0, 'C');
$pdf->Cell(20, 10, 'Daudzums', 1, 0, 'C');
$pdf->Cell(40, 10, 'Cena', 1, 0, 'C');
$pdf->Cell(40, 10, 'Kopā', 1, 0, 'C');

$pdf->Ln();

$visibleN = $biljettTyp['visibleName'];
$pris = $biljettTyp['price'];
$total = $biljettTyp['price'] * $qty;

$pdf->Cell(90, 10, $visibleN, 1, 0);
$pdf->Cell(20, 10, $qty, 1, 0, 'C');
$pdf->Cell(40, 10, "\$$pris", 1, 0, 'C');
$pdf->Cell(40, 10, "\$$total", 1, 0, 'C');

$pdf->Ln(20);

$pdf->Cell(0, 5, "Kopā: \$$total", 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(0, 5, "Summa apmaksai: \$$total", 0, 0, 'R');
// return the generated output
$pdf->Output('I', 'invoice.pdf');
?>