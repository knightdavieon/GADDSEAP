<?php
require('html_table.php');

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$html='<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Zambales Coastal Cleanup Trash Data">
  <meta name="author" content="John Dave Espinosa">
  <link rel="icon" type="resources/admindesign/image/png" sizes="16x16" href="resources/images/GADDSEAPLOGOV2.png">
  <title>GADDSEAP</title>

  <link rel="stylesheet" href="../../../resources/bootstrap-4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../resources/Font-Awesome-v5/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../../../resources/customcss/navbar.css">
  <link rel="stylesheet" href="../../../resources/customcss/carouselcss.css">
  <link rel="stylesheet" href="../../../resources/customcss/schoollogo.css">
  <script src="../../../resources/dist/js/jquery-3.3.1.min.js"></script>
  <script src="../../../resources/dist/js/bootstrap.min.js"></script>
  <script src="../../../resources/dist/js/popper.min.js"></script>
</head>
<body>
<div class="container p-t p-b">
  <form class="" action=" " method="post">
    <div class="card card-width card-center">
      <div>
        
      </div>
      <div class="card-header card-background card-remove-border ">
        <div class="container-fluid">
          <div class="row">
            <img class="center" style="width: 40%; height: 40%;" src="resources/images/GADDSEAPLOGOV2.png">
          </div>
          <div class="row">
            <div class="col-md-4"><hr /></div><div class="col-md-4"<medium class="center headertextcolor"></medium></div><div class="col-md-4"><hr /></div>
          </div>
        </div>
      </div>
      <div class="card-body card-background ">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="fullname">Username</label>
            <input type="text" class="form-control text-center" id="fullname" name="accountname" placeholder="Username">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="email">Password</label>
            <input type="password" class="form-control text-center" id="email" name="accountpassword" placeholder="Password">
          </div>
        </div>
      </div>
      <div class="card-footer text-muted card-remove-border text-center">
        <button type="submit" class="btn btn-bknow" >Login</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
';

$pdf->WriteHTML($html);
$pdf->Output();
?>
