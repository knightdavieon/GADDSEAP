<?php
include("sessionhandler.php");
include("../accessdb.php");

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
  <link rel="stylesheet" type="text/css" href="../resources/css/jquery.datetimepicker.css"/>
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
  .btn-secondary:not(:disabled):not(.disabled).active{
    border-color: #0070EA;
    color:white;
    background-color: #007BFF;
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
            <h3 class="text-primary">Student Application Form</h3> </div>
            <div class="col-md-7 align-self-center">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Student Application Form</li>
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
                    <div>
                      <?php if(isset($_SESSION['recordlistnotifications'])){echo $_SESSION['recordlistnotifications']; unset($_SESSION['recordlistnotifications']);} ?>
                    </div>

                    <div class="row" style="text-align:center;">
                      <div class="col-md-4">
                        <hr />
                      </div>
                      <div class="col-md-4">
                        <h4>Personal Information</h4>
                      </div>
                      <div class="col-md-4">
                        <hr />
                      </div>
                    </div>

                  </div>
                  <div class="card-body">
                    <form action="actions/records/addrecord.php" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="card" style="width: 16rem;">
                            <img class="card-img-top" src="../resources/images/ImageLogo.png" alt="Card image cap" id="blah" >
                            <div class="card-body">
                              <input type="file" name="fileToUpload" class="form-control form-control-danger" id="imgInp" required title="select image" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7">

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5 form-row-padding">
                          <input required class="form-control" type='text' name="firstname" placeholder="First Name">
                        </div>
                        <div class="col-md-1 form-row-padding">
                          <input class="form-control" type='text' name="mi" placeholder="M.I." maxlength="1">
                        </div>
                        <div class="col-md-5 form-row-padding">
                          <input required class="form-control" type='text' name="lastname" placeholder="Last Name">
                        </div>
                        <div class="col-md-1 form-row-padding">
                          <input class="form-control" type='text' name="suffix" placeholder="Ex." maxlength="2">
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type='text' name="addBrgy" placeholder="Brgy">
                        </div>
                        <div class="col-md-2 form-row-padding">
                          <input class="form-control" type='text' name="addMun" placeholder="Municipality">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type='text' name="addProv" placeholder="Province">
                        </div>
                        <div class="col-md-4 form-row-padding">
                          <select class="form-control" name="civilstatus">
                            <option value=" ">--  Select Civil Status --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="itscomplicated">Its Complicated</option>
                            <option value="searching">Searching</option>
                            <option value="sawi">Sawi</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8 form-row-padding">
                          <input class="form-control" type='text' name="school" placeholder="School">
                        </div>
                        <div class="col-md-4 form-row-padding">

                          <input autocomplete="off" class="form-control" type='text' name="birthdate" id="datetimepicker1" placeholder="Birthdate">


                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type='text' name="course" placeholder="Course">
                        </div>
                        <div class="col-md-2 form-row-padding">
                          <input class="form-control" type='text' name="year" placeholder="Year">
                        </div>
                        <div class="col-md-4 form-row-padding">
                          <input class="form-control" type='text' name="citizenship" placeholder="Citizenship" value="Filipino">
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4 form-row-padding">
                          <input class="form-control" type='text' name="contact" placeholder="Contact No">
                        </div>
                        <div class="col-md-2 form-row-padding">
                          <input class="form-control" type='text' name="age" placeholder="Age">
                        </div>
                        <div class="col-md-2 form-row-padding">
                          <select class="form-control" name="sex">
                            <option value=" ">-- Sex --</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                          </select>
                        </div>
                        <div class="col-md-4 form-row-padding">
                          <input class="form-control" type='text' name="religion" placeholder="Religion">
                        </div>

                      </div>

                      <br>
                      <div class="row" style="text-align:center;">
                        <div class="col-md-4">
                          <hr />
                        </div>
                        <div class="col-md-4">
                          <h4>Family Background</h4>
                        </div>
                        <div class="col-md-4">
                          <hr />
                        </div>
                      </div>
                      <br>


                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type="text" name="father" placeholder="Name of Father">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="father_age" placeholder="Age">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="father_occupation" placeholder="Occupation">
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type="text" name="mother" placeholder="Name of Mother">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="mother_age" placeholder="Age">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="mother_occupation" placeholder="Occupation">
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type="text" name="siblings_1" placeholder="Name of Siblings">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="1_age" placeholder="Age">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="1_occupation" placeholder="Occupation">
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type="text" name="siblings_2" placeholder="Name of Siblings">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="2_age" placeholder="Age">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="2_occupation" placeholder="Occupation">
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type="text" name="siblings_3" placeholder="Name of Siblings">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="3_age" placeholder="Age">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="3_occupation" placeholder="Occupation">
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6 form-row-padding">
                          <input class="form-control" type="text" name="spouse" placeholder="Name of Spouse (if any)">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="spouse_age" placeholder="Age">
                        </div>
                        <div class="col-md-3 form-row-padding">
                          <input class="form-control" type="text" name="spouse_occupation" placeholder="Occupation">
                        </div>
                      </div>


                      <div class="row">

                        <div class="col-md-6 form-row-padding">
                          <label for="">Purpose</label>
                          <input type="hidden" name="scholarship" value="">
                          <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                              <input type="checkbox" name="scholarship" autocomplete="off" value="Scholarship"> Scholarship
                            </label>
                          </div>
                        </div>
                        <div class="col-md-6 form-row-padding">
                          <label for="">Educational</label>
                          <input type="hidden" name="educational" value="">
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="educational" class="custom-control-input" value="Project">
                            <label class="custom-control-label" for="customRadio1">Project</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="educational" class="custom-control-input" value="Seminars">
                            <label class="custom-control-label" for="customRadio2">Seminars</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="educational" class="custom-control-input" value="Board Exam">
                            <label class="custom-control-label" for="customRadio3">Board Exam</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="educational" class="custom-control-input" value="Books">
                            <label class="custom-control-label" for="customRadio4">Books</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio5" name="educational" class="custom-control-input" value="Others">
                            <label class="custom-control-label" for="customRadio5">Others</label>
                          </div>
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
      <script src="../resources/js/jquery.datetimepicker.full.js"></script>

      <script>
      $('#datetimepicker1').datetimepicker({
        lang:'en',
        timepicker:false,
        format:'d/m/Y',
        formatDate:'Y/m/d'

      });

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp").change(function(){
        readURL(this);
      });
      </script>




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
