<?php
use Konekt\PdfInvoice\InvoicePrinter;

$mysql = new mysqli('localhost', 'root', '', 'etalons');
$serial = filter_var(trim($_POST['serial']), FILTER_SANITIZE_STRING);
$biljett = filter_var(trim($_POST['biljett']), FILTER_SANITIZE_STRING);
$qty = filter_var(trim($_POST['qty']), FILTER_SANITIZE_STRING);

$result = $mysql->query("SELECT `name`, `visibleName`, `price` FROM `tickettype` WHERE `name` = '$biljett'");
$biljettTyp = $result->fetch_assoc();

$invoice = new InvoicePrinter('Letter', '$', 'et');
/* Header settings */
$invoice->setColor("#007fff"); // pdf color scheme
$invoice->setType("Sale Invoice"); // Invoice Type
$invoice->setReference("INV-55033645"); // Reference
$invoice->setDate(date('M dS ,Y', time())); //Billing Date
$invoice->setTime(date('h:i:s A', time())); //Billing Time
$invoice->setFrom(array("SIA \"Sabiedriba\"", "Sabiedriba", "1, Tāda iela", "Pilsētas pilsēta, Pilsētas novads, LV-9999"));
$invoice->setTo(array("Pircējs Naudiņš", "fiz.persona, eTalona nr. $serial", "333, Šitā iela", "Pilsētas pilsēta, Pilsētas novads, LV-9999"));

$invoice->addItem("$biljett", "", "$qty", "21%", $biljettTyp['price'], 0, $biljettTyp['price'] * $qty);

$sum = $biljettTyp['price'] * $qty;

$invoice->addTotal("Total w/o VAT", $sum / 1.21);
$invoice->addTotal("VAT 21%", $sum - ($sum * 0.79));
$invoice->addTotal("Total", $sum, true);

$invoice->render('invoice.pdf', 'I');
/* I => Display on browser, D => Force Download, F => local path save, S => return document as string */
$mysql->close();
?>