<?php
// Include the necessary libraries
require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');

// Use the FPDI library to load the existing PDF template
use setasign\Fpdi\Fpdi;

$event_id = $_GET['event_id'];
include('connection/conn.php');

// Initialize FPDI and load the existing PDF template
$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile('pdfTemplate/teamplate.pdf');



// Import the first page of the template PDF
$tplId = $pdf->importPage(1);

// Use the template page as the background
$pdf->useTemplate($tplId, 0, 0, 210, 297); // 210 x 297 for A4 size

// Define cell widths and alignment
$cellWidths = array(40, 30, 30, 30, 30);
$totalWidth = array_sum($cellWidths);
$pageWidth = 210; // Width of A4 page in mm

// Calculate starting X position to center the table
$startX = ($pageWidth - $totalWidth) / 2;

// Set font for the dynamic content
$pdf->SetFont('Arial', '', 12);

// Set position to start writing the table header and data
$pdf->SetXY($startX, 130); // X and Y coordinates for starting point of the table

// Table header with background color
$pdf->SetFillColor(200, 220, 255); // Light blue background for header
$pdf->Cell($cellWidths[0], 10, 'Team Name', 1, 0, 'C', true);
$pdf->Cell($cellWidths[1], 10, 'Gold', 1, 0, 'C', true);
$pdf->Cell($cellWidths[2], 10, 'Silver', 1, 0, 'C', true);
$pdf->Cell($cellWidths[3], 10, 'Bronze', 1, 0, 'C', true);
$pdf->Cell($cellWidths[4], 10, 'Total Medals', 1, 0, 'C', true);
$pdf->Ln();

// Reset Y position for data rows
$rowY = 140; // Initial Y position for data rows
$pdf->SetXY($startX, $rowY); // Set position for data rows

// Query to fetch teams from the tally table
$selectTeams = "SELECT * FROM tally WHERE event_id = $event_id";
$queryTeams = mysqli_query($conn, $selectTeams);

// Loop through the teams and print the table rows
while ($getTeam = mysqli_fetch_assoc($queryTeams)) {
    $team_name = $getTeam['team_name'];
    $gold = $getTeam['GOLD'];
    $silver = $getTeam['SILVER'];
    $bronze = $getTeam['BRONZE'];
    $totalMedals = $gold + $silver + $bronze;

    // Print the row data with centered text
    $pdf->Cell($cellWidths[0], 10, $team_name, 1, 0, 'C');
    $pdf->Cell($cellWidths[1], 10, $gold, 1, 0, 'C');
    $pdf->Cell($cellWidths[2], 10, $silver, 1, 0, 'C');
    $pdf->Cell($cellWidths[3], 10, $bronze, 1, 0, 'C');
    $pdf->Cell($cellWidths[4], 10, $totalMedals, 1, 0, 'C');
    $pdf->Ln();

    // Move to the next row position
    $rowY += 10; // Height of each row
    $pdf->SetXY($startX, $rowY); // Update Y position for next row
}

// Output the PDF to the browser
$pdf->Output('I', 'medal_report.pdf');
?>
