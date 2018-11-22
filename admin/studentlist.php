<?php
include("sessionhandler.php");
include("../accessdb.php");

unset($_SESSION['selectedid']);

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
                    <h3 class="text-primary">Student List</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Student List</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->


            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-30">
                            <div class="card-title">
                              <div>
                                <?php if(isset($_SESSION['recordlistnotifications'])){echo $_SESSION['recordlistnotifications']; unset($_SESSION['recordlistnotifications']);} ?>
                              </div>
                                  <a class="btn btn-primary" href="form"><i class="fa fa-plus"></i> ADD</a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Brgy</td>
                                                <td>Municipality</td>
                                                <td>Province</td>
                                                <td>School</td>
                                                <td>Course</td>
                                                <td>Contact No</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                      $selectpersonal = $conn->query("SELECT * FROM personal_info");
                      $i='1';
                      While($rowpersonal = $selectpersonal->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>

                            <td><?php echo $rowpersonal['first_name'];?><?php echo " "?><?php echo $rowpersonal['mi']; ?><?php echo " "?><?php echo $rowpersonal['last_name'];?><?php echo " "?><?php  echo $rowpersonal['ex']; ?></td>
                            <td><?php echo $rowpersonal['address_brgy']; ?></td>
                            <td><?php echo $rowpersonal['address_mun']; ?></td>
                            <td><?php echo $rowpersonal['address_prov']; ?></td>
                            <td><?php echo $rowpersonal['school']; ?></td>
                            <td><?php echo $rowpersonal['course']; ?></td>
                            <td><?php echo $rowpersonal['contact_no']; ?>
                                <?php
                                 $selectedid = $rowpersonal['record_id'];
                                ?>
                            </td>
                             <td>   <!-- Delete -->
                            <button class="btn btn-rounded btn-danger"  href="#deleterecord<?php echo $i;?>" data-toggle="modal" data-target="#deleterecord<?php echo $i;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>


                            <!-- Edit -->
                            <form method="post" action="editform.php">
                              <input type="hidden" name="selectedid" value="<?php echo $selectedid;?>">
                              <button class="btn btn-rounded btn-primary" ><i class="fa fa-id-card" aria-hidden="true"></i></button>
                            </form></td>
                                            </tr>
                                                  <?php include('actions/records/recordpop.php');
                                            $i++;
                                             } ?>
                                        </tbody>
                                    </table>
                                </div>
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
