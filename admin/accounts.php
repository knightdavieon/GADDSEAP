<?php
include("sessionhandler.php");

if($_SESSION['account_type'] == "staff"){
	echo ("<script language='JavaScript'>

				window.location.href='../admin';
				</SCRIPT>");
}

include_once("../accessdb.php");
//include_once("scriptvalidation.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="../resources/images/png" sizes="16x16" href="../resources/images/GADDSEAPLOGOV2.png">
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
    .rem-side-pad{
        padding-right: 0;
        padding-left: 0
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
        <?php include("leftsidebar.php");?>
        <!-- End Left Sidebar  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Accounts</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item active">Accounts</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->

            <div>
                <?php if(isset($_SESSION['accountsNotifications'])){echo $_SESSION['accountsNotifications']; unset($_SESSION['accountsNotifications']);} ?>
            </div>
            <!-- Container fluid  -->
            <div class="container-fluid" style="margin:0; padding-left: 10px;">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-sm-4 " style="padding-right: 0;">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Account</h4>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="actions/accounts/addaccount.php">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Account Info</h3>
                                        <hr>

                                        <div class="row p-t-5">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="addAccountName" class="form-control" placeholder="Account Name" pattern=".{3,}"   required title="3 characters minimum" onkeypress="return restrictCharacters(this, event, alphanumeric);" REQUIRED>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <input type="password" name="addPassword" class="form-control form-control-danger" placeholder="Password" pattern=".{3,}"   required title="3 characters minimum"onkeypress="return restrictCharacters(this, event, alphanumeric);" REQUIRED>
                                                </div>
                                            </div>

                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <input type="password" name="addRepass"  class="form-control form-control-danger" pattern=".{3,}"   required title="3 characters minimum"placeholder="Re - Type Pass" onkeypress="return restrictCharacters(this, event, alphanumeric);" REQUIRED>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <small class="form-control-feedback"> Alpha Numerics Only</small>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <h3 class="card-title m-t-15">User Info</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="addFirstname"class="form-control" placeholder="First Name" pattern=".{3,}"   required title="3 characters minimum" onkeypress="return restrictCharacters(this, event, alphaOnly);" REQUIRED>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="addLastname" class="form-control" placeholder="Last Name" pattern=".{3,}"   required title="3 characters minimum" onkeypress="return restrictCharacters(this, event, alphaOnly);" REQUIRED>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="addContactNumber" class="form-control" placeholder="Contact Number" pattern=".{6,}"   required title="6 characters minimum" onkeypress="return restrictCharacters(this, event, phoneOnly);" REQUIRED>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="accounttype">
                                                        <option value="admin">Admin</option>
                                                        <option value="adminsec">Admin Sec.</option>
                                                        <option value="it">IT</option>
                                                        <option value="staff">Staff</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <small class="form-control-feedback"> Alpha Numerics Only</small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                                        <button type="reset" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" style="padding-right: 0;">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Account ID</th>
                                                <th>Account Name</th>
                                                <th>Account Type</th>
                                                <th>User First Name</th>
                                                <th>User Last Name</th>
                                                <th>User Contact#</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                                $selectaccounts = $conn->query("SELECT accounts.account_id, accounts.account_name, accounts.account_type, accounts.account_status, user_details.user_firstname, user_details.user_lastname, user_details.user_contact from accounts JOIN user_details ON accounts.account_id = user_details.account_id");
                                                $i='1';
                                                While($row = $selectaccounts->fetch(PDO::FETCH_ASSOC)){

                                            ?>
                                            <tr>
                                                <td><?php echo $row['account_id']; ?></td>
                                                <td><?php echo $row['account_name']; ?></td>
                                                <td><?php echo $row['account_type']; ?></td>
                                                <td><?php echo $row['user_firstname']; ?></td>
                                                <td><?php echo $row['user_lastname']; ?></td>
                                                <td><?php echo $row['user_contact']; ?></td>
                                                <td><?php echo $row['account_status']; ?></td>
                                                <td>

                                                    <?php if($_SESSION['account_type'] == "admin" || $_SESSION['account_type'] == "adminsec" || $_SESSION['account_type'] == "it" || $_SESSION['account_type'] == "SUPER ADMIN"){?>
                                                        <?php if($row['account_status'] != 'ACTIVE'){ ?>



                                                    <!-- Activate -->
                                                    <button class="btn btn-rounded btn-success"  href="#activateaccount<?php echo $i;?>" data-toggle="modal" data-target="#activateaccount<?php echo $i;?>"><i class="fa fa-check" aria-hidden="true"></i></button>

                                                     <!-- Delete -->
                                                    <button class="btn btn-rounded btn-danger"  href="#deleteaccount<?php echo $i;?>" data-toggle="modal" data-target="#deleteaccount<?php echo $i;?>"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                                        <?php }else{ ?>

                                                    <!-- Edit -->
                                                    <button class="btn btn-rounded btn-warning"  href="#editaccount<?php echo $i;?>" data-toggle="modal" data-target="#editaccount<?php echo $i;?>"><i class="fa fa-id-card" aria-hidden="true"></i></button>

                                                    <!-- deactivate -->
                                                    <button class="btn btn-rounded btn-black"  href="#deactivateaccount<?php echo $i;?>" data-toggle="modal" data-target="#deactivateaccount<?php echo $i;?>"><i class="fa fa-times" aria-hidden="true"></i></button>

                                                    <?php }

                                                        }else{ echo "N/\A";}
                                                    ?>


                                                </td>
                                            </tr>
                                            <?php include('actions/accounts/accountspop.php');
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
    <script src="../resources/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../resources/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../resources/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../resources/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="../resources/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../resources/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->

    <script src="../resources/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../resources/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="../resources/js/scripts.js"></script>
    <!-- scripit init-->


    <script src="../resources/js/lib/datatables/datatables.min.js"></script>
    <script src="../resources/js/lib/datatables/datatables-init.js"></script>

    <!-- form validation -->

    <script src="../resources/js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="../resources/js/lib/form-validation/jquery.validate-init.js"></script>
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
