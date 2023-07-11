<?php
    $pdf->SetFont('times', 'B', 35);
    $pdf->Cell(0, 20, 'BODY CARE', 0, 1, 'C');

    $pdf->SetFont('times', '', 10);
    $pdf->SetX(10);
    $pdf->Cell(0, 5, 'Adresse : Andavamamba, Antanarivo');
    $pdf->SetX(160);
    $pdf->Cell(0, 5, 'Email : body_care@gmail.com');
    $pdf->Line(10, 40, 200, 40);
    $pdf->Ln(10);

    $pdf->SetFont('times', 'B', 15);
    $pdf->Cell(0, 20, 'FACTURE PROFORMA', 0, 1, 'C');

    // Informations de la facture
    $pdf->SetFont('times', '', 12);
    $pdf->SetY(60);
    $pdf->Cell(0, 5, 'Date : 15/07/2023', 0, 1);
    $pdf->Cell(0, 10, 'Facture n : ', 0, 1);
    $pdf->Cell(0, 10, 'Objectif : ' . $regime['nom_objectif'] , 0, 1);
    $pdf->Ln(5);

    $pdf->SetFont('times', '', 12);
    $pdf->SetY(60);
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'Nom : '. $user['nom'], 0, 1, 'L');
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'Prenom : '. $user['prenom'], 0, 1, 'L');
    $pdf->SetX(140);
    $pdf->Cell(0, 7, 'E-mail : '. $user['email'], 0, 1, 'L');
    $pdf->Ln(5);

    $pdf->SetFont('times', 'B', 15);
    $pdf->Cell(0, 20, 'DETAILS REGIME', 0, 1, 'C');
    $pdf->Ln(5);

// Header row
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(45, 10, 'Regime', 1, 0, 'C');
$pdf->Cell(45, 10, 'Duree(sem)', 1, 0, 'C');
$pdf->Cell(45, 10, 'Poids', 1, 0, 'C');
$pdf->Cell(45, 10, 'Plat', 1, 1, 'C');

$pdf->SetFont('times', '', 10);
foreach ($regime_detail as $child) {
    // Individual product row
    $pdf->Cell(45, 10, $regime["nom_regime"], 1, 0, 'C');
    $pdf->Cell(45, 10, $regime["durree_regime"], 1, 0, 'C');
    $pdf->Cell(45, 10, $regime['min_poids'] . " a " . $regime['max_poids'] . " kg ", 1, 0, 'C');
    $pdf->Cell(45, 10, $child['nom_plat'], 1, 1, 'C');
}
    $pdf->SetX(100);
    $pdf->Cell(45, 10, "Total HT", 1, 0, 'C');
    $pdf->Cell(45, 10, "Ar " . number_format($ht_amount, 2, ',', ' '), 1, 1, 'R');

    $pdf->SetX(100);
    $pdf->Cell(45, 10, "TVA", 1, 0, 'C');
    $pdf->Cell(45, 10, "Ar " . number_format($tva, 2, ',', ' '), 1, 1, 'R');

    $pdf->SetX(100);
    $pdf->Cell(45, 10, "Total TTC", 1, 0, 'C');
    $pdf->SetFont('times', 'B', 12);
    $pdf->Cell(45, 10, "Ar " . number_format($ttc_amount, 2, ',', ' '), 1, 1, 'R');
    $pdf->SetFont('times', '', 10);


// Écrire le contenu HTML dans le PDF avec le CSS
$pdf->writeHTML($html, true, false, true, false, '');

// Afficher la conversion du nombre en lettres
$pdf->Ln(5);

$pdf->Cell(0, 5, 'Arrêter la présente facture proforma à la somme de : ' , 0, 1);
$pdf->SetFont('times', 'B', 13);
$pdf->Cell(0, 5, $ttc_amount . '  Ariary TTC' , 0, 1);
$pdf->Ln(10);

$pdf->SetFont('times', '', 10);
$pdf->Cell(0, 10, 'NB: Obligatoire, choisir un des sports pour accompanger le regime : ' , 0, 1);

foreach($sports as $sport){
    $pdf->SetX(80);
    $pdf->Cell(0, 0, ' - ' . $sport['nom_sport'], 0, 1, 'L');
}

?>
