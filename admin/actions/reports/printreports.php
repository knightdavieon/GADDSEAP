<?php
 session_start();
 $dateToday=date("Y-m-d");

  require('actions/mc_table.php');
	$pdf=new PDF_MC_Table();
	$pdf->AddPage('L');
  include("../../../acccessdb.php");
 if($type == "all"){

 		//echo $from . " . " . $to;
 		$query = $mysqli->query("SELECT * FROM reservations WHERE reservation_date >= '$from' AND reservation_date <= '$to'");

		$pdf->SetFont('Arial','B',25);
		$pdf->Cell(275,25,'Reservation Report',0,0,'C');
		$pdf->Image("../resources/img/newlogo.png",25,8,60,25);
		$pdf->Ln(10);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',12);
		$tDate=date("n\/j\/Y");
		$pdf->Cell(275, 10,'as of '. $tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',6);
		$pdf->Cell(15,5,'',0,0,'C');
		$pdf->Cell(30,5,'Code',1,0,'C');
		$pdf->Cell(40,5,'Date',1,0,'C');
		$pdf->Cell(40,5,'Guest ID',1,0,'C');
		$pdf->Cell(40,5,'Check In',1,0,'C');
		$pdf->Cell(40,5,'Check Out',1,0,'C');
		$pdf->Cell(40,5,'Status',1,0,'C');


		$pdf->ln();

		$pdf->SetFont('Arial','',6);

		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$pdf->Cell(15,5,'',0,0,'C');
			$pdf->Cell(30,5,$row['reservation_id'],1,0,'C');
			$pdf->Cell(40,5,$row['reservation_date'],1,0,'C');
			$pdf->Cell(40,5,$row['guest_id'],1,0,'C');
			$pdf->Cell(40,5,$row['reservation_checkin'],1,0,'C');
			$pdf->Cell(40,5,$row['reservation_checkout'],1,0,'C');
			$pdf->Cell(40,5,$row['reservation_status'],1,0,'C');


			$pdf->ln();

		}

		$pdf->Ln();
		$pdf->SetFont('Arial','',12);
		$i = 0;
		$selecttimesheethours = $mysqli->query("SELECT COUNT(*) as totalreservations FROM reservations WHERE reservation_date >= '$from' AND reservation_date <= '$to'");
		$rowget = mysqli_fetch_array($selecttimesheethours);

		$pdf->Cell(260,10,'Total Reservations: '.$rowget['totalreservations'],0,0,'R');
		$pdf->Ln(5);
		$pdf->Cell(198,10,'Printed By:   '.$_SESSION['accountid']." ".$_SESSION['accountname'],0,0,'L');
		$pdf->Ln(5);
		$pdf->Cell(198,10,'Date Printed:   '.$dateToday,0,0,'L');

		$pdf->Ln(5);
		$pdf->Cell(270,10,'Manager:____________________________   ',0,0,'R');
		$pdf->Ln(8);
		$pdf->Cell(260,5,'(Signature over printed name)',0,0,'R');
		$fileName = 'Reservations-' . $dateToday . '.pdf';
		$pdf->Output($fileName, 'D');



}
/



?>
