<?php
include '../modal/reservationsModal.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $_GET['id'];
}

$reservation = new ResevationModal();
$resultat=$reservation->getReservationPrint($id);

require_once('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$retrait = "      ";
$h = 7;
$pdf->Cell(0, 10, 'Votre Reservation', 'TB', 1, 'C');
$pdf->Cell(0, 10, 'N: '.rand(100,1000), 0, 1, 'C');

// Saut de ligne
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);



$pdf->Write($h, "Je soussigne, Directeur du ONCF que : \n");
// Saut de ligne
$pdf->Ln(5);
$pdf->SetFont('', 'BI');
$pdf->Write($h, $retrait . "M : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'BI');
$pdf->Write($h, $resultat['user'] . "\n");
// Saut de ligne
$pdf->Ln(5);

$pdf->SetFont('', 'BI');

$pdf->Write($h, $retrait . "Date de reservation est : " . $resultat['date_reserve'] . "\n");
$pdf->Ln(5);
$pdf->Write($h, $retrait . "Voyage N  : " . $resultat['id_voyage']  . " \n");
$pdf->Ln(5);
$pdf->Write($h, $retrait . "Nombre des personnes : " . $resultat['cap_reservation'] .' Perssones'. " \n");
$pdf->Ln(5);
$pdf->Write($h, $retrait . "Total Prix : " . $resultat['cap_reservation']*$resultat['prix'].' DH'  . " \n");
$pdf->Ln(5);

$pdf->SetFont('', 'I');


$pdf->Write($h,$retrait. "je  souhaite A bon Voyage  M : " .$resultat['user']  . "  \n");

$pdf->Ln(5);
// Saut de ligne
$pdf->Ln(10);
$pdf->Cell(0, 5, 'Fait a Youssoufia :' . date("d-m-y h:i:s"), 0, 1, 'C');
// Saut de ligne
$pdf->Ln(10);
// Décalage de 50 mm à droite
$pdf->Cell(50);
$pdf->Cell(80, 8, "Le directeur du ONCF", 1, 1, 'C');

// Décalage de 50 mm à droite
$pdf->Cell(50);
$pdf->Cell(80, 5, "Mr ABDELAZIZ ELHATHOUT", 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
$pdf->Cell(50);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
$pdf->Cell(50);
$pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)

//Afficher le pdf
$pdf->Output('', '', true);





?>