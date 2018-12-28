<?php
 include 'fpdf.php';
 include 'exfpdf.php';
 include 'easyTable.php';
 include '../../../accessdb.php';
 session_start();

 $pdf=new exFPDF();
 $pdf->AddPage();
 $pdf->SetFont('helvetica','',10);
 $dateToday=date("Y-m-d");
 $table1=new easyTable($pdf, 2);
 $table1->easyCell('', 'img:../../../resources/images/GADDSEAPLOGOV2.png, w30; align:L;');
 $table1->easyCell('Student Information Sheet', 'font-size:30; font-style:B; font-color:#00C6FF; align:L;');

 $table1->printRow();
 $table1->endTable(2);

 $table1=new easyTable($pdf, 2);
 $table1->rowStyle('font-size:15; font-style:B;');
 $table1->easyCell( 'All Record');
 $table1->rowStyle('font-size:7; font-style:B;');
 $table1->easyCell('Printed Date: ' .  $dateToday . '  Printed By: ' . $_SESSION['accountname'], 'align:R;');
 $table1->printRow();

 $table1->endTable(2);


//====================================================================

 $table=new easyTable($pdf, '{20, 35, 30, 30, 15, 10, 20, 20, 20}','align:C{LCRR};border:1; border-color:#a1a1a1; ');


 $table->rowStyle('align:{CCCR};valign:M;bgcolor:#000000; font-color:#ffffff; font-family:times; font-style:B;');
 $table->easyCell('Date');
 $table->easyCell('Full Name');
 $table->easyCell('Address');
 $table->easyCell('School');
 $table->easyCell('Course');
 $table->easyCell('Year');
 $table->easyCell('Contact #');
 $table->easyCell('Purpose');
 $table->easyCell('Educational');

 $table->printRow();

 $selectpersonal = $conn->query("SELECT * FROM personal_info");
 $i='1';
 While($rowpersonal = $selectpersonal->fetch(PDO::FETCH_ASSOC)){
   $bgcolor='';
   if($i%2)
   {
      $bgcolor='bgcolor:#ccf2ff;';
   }
   $table->rowStyle('valign:M;border:LR;paddingY:2;' . $bgcolor);
   $table->easyCell($rowpersonal['record_date']);
   $table->easyCell($rowpersonal['first_name']. " " .$rowpersonal['mi']." ".$rowpersonal['last_name'] . " " . $rowpersonal['ex']);
   $table->easyCell($rowpersonal['address_brgy']. " " .$rowpersonal['address_mun']." ".$rowpersonal['address_prov']);
   $table->easyCell($rowpersonal['school']);
   $table->easyCell($rowpersonal['course']);
   $table->easyCell($rowpersonal['year']);
   $table->easyCell($rowpersonal['contact_no']);
   $table->easyCell($rowpersonal['purpose']);
   $table->easyCell($rowpersonal['educational']);

   $table->printRow();

 }





$fileName = "allrecord-" . $dateToday . ".pdf";
 $pdf->Output($fileName, 'D');




?>
