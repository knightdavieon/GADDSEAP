<?php
//include("sessionhandler.php");
//include("../accessdb.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="This is a websystem that is created for the compliance of the requirements for the capstone project of the student clients">
  <meta name="author" content="John Dave Espinosa">
  <link rel="icon" type="../resources/images/png" sizes="16x16" href="../resources/images/GADDSEAPLOGOV2.png">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="#">

  <title>GADDSEAP</title>
  <!-- Bootstrap Core CSS -->
  <link href="../resources/admindesign/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../resources/admindesign/css/helper.css" rel="stylesheet">
  <link href="../resources/admindesign/css/style.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
  <!--[if lt IE 9]>
  <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  .color-green{
    color: #17B31F;
  }
  .form-row-padding{
    padding-top: 1vh;
    padding-bottom: 1vh;
  }


</style>
</head>

<body class="fix-header fix-sidebar">
  <!-- Preloader - style you can find in spinners.css -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
      <!-- header header  -->
      <div class="header">
        <?php include("navbar.php");?>
      </div>
      <!-- End header header -->
      <!-- Left Sidebar  -->
      <?php include("leftsidebar.php"); ?>
      <!-- End Left Sidebar  -->
      <!-- Page wrapper  -->
      <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
          <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
          <!-- End Bread crumb -->


          <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
              <div class="col-md-12">
                <div class="card p-30">
                  <div class="card-title">

                    <div class="row" style="text-align:center;">
                      <div class="col-md-4">
                        <hr />
                      </div>
                      <div class="col-md-4">
                        <h4>Student's Application Form</h4>
                      </div>
                      <div class="col-md-4">
                        <hr />
                      </div>
                    </div>

                  </div>
                  <div class="card-body">
                    <form class="" action="test.php" method="post">
                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="nameofstudent" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="contact" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="nameofstudent" placeholder="Address">
                        </div>
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="contact" placeholder="Contact #">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 form-row-padding">
                          <input class="form-control" type='text' name="school" placeholder="School">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="course" placeholder="Course">
                        </div>
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="year" placeholder="Year">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-info">
                              <input type="checkbox" name="checkbox" autocomplete="off"> Scholarship
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="btn-group btn-group-toggle col-md-12" data-toggle="buttons">
                          <label class="btn btn-info">
                            <input type="radio" name="options" id="option1" autocomplete="off" value="item1" > Active
                          </label>
                          <label class="btn btn-info">
                            <input type="radio" name="options" id="option2" autocomplete="off" value="item2"> Radio
                          </label>
                          <label class="btn btn-info">
                            <input type="radio" name="options" id="option3" autocomplete="off" value="item3"> Radio
                          </label>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>

                    </form>

                  </div>
                </div>
              </div>

            </div>
            <!-- End PAge Content -->
          </div>


          <!-- End Container fluid  -->
          <!-- footer -->
          <footer class="footer"> © 2018 All rights reserved.</footer>
          <!-- End footer -->
        </div>

        <!-- End Page wrapper  -->
      </div>
      <!-- End Wrapper -->
      <!-- All Jquery -->
      <script src="../resources/admindesign/js/lib/jquery/jquery.min.js"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="../resources/admindesign/js/lib/bootstrap/js/popper.min.js"></script>
      <script src="../resources/admindesign/js/lib/bootstrap/js/bootstrap.min.js"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="../resources/admindesign/js/jquery.slimscroll.js"></script>
      <!--Menu sidebar -->
      <script src="../resources/admindesign/js/sidebarmenu.js"></script>
      <!--stickey kit -->
      <script src="../resources/admindesign/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
      <!--Custom JavaScript -->
      <script src="../resources/admindesign/js/custom.min.js"></script>
      <script src="../resources/admindesign/js/lib/datatables/datatables.min.js"></script>
      <script src="../resources/admindesign/js/lib/datatables/datatables2-init.js"></script>




    </body>



    </html>
    <div class="modal "  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="logoutModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="logout.php" method="post">
            <div class="modal-header">
            </div>
            <div class="modal-body">

              <div style="text-align:center;"><font size="30px"><span class="fa fa-warning" style="color: red;"><h3>Are You Sure?</h3></span></font></div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Logout</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
