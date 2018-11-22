<?php
include_once("../../../accessdb.php");
session_start();

$target_dir = "../../../resources/images/pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$recordimage = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
    $_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> File is not an image!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></div>";
    //  echo "<script language='JavaScript'>
    //                        window.location.href='../accommodations';
    //                            </SCRIPT>";
    $uploadOk = 0;
  }
}
// Check if file already exists

// if (file_exists($target_file)) {
//   //echo "Sorry, file already exists.";
//   $_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, File alreay exist!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//   <span aria-hidden='true'>&times;</span>
//   </button></div>";
//   //  echo "<script language='JavaScript'>
//   //                        window.location.href='../accommodations';
//   //                           </SCRIPT>";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000000) {
  //echo "Sorry, your file is too large.";
  $_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, your file is too large!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></div>";
  // echo "<script language='JavaScript'>
  // window.location.href='../../form';
  // </SCRIPT>";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, only JPG, JPEG, PNG & GIF are allowed!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></div>";
  //  echo "<script language='JavaScript'>
  //                       window.location.href='../accommodations';
  //                           </SCRIPT>";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //echo "Sorry, your file was not uploaded.";
  $_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, your file was not uploaded!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
  </button></div>";
  echo "<script language='JavaScript'>
  window.location.href='../../studentlist';
  </SCRIPT>";
} else {
  $id = $_POST['idtoupdateimage'];
  $temp = explode(".", $recordimage);
  $newfilename = $id . '.' . end($temp);
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
    // echo "The file ". $newfilename. " has been uploaded.";
    $updatepersonal = $conn->prepare("UPDATE personal_info SET image = :img WHERE record_id = :id");
  		$updatepersonal->execute(array(
  			"id"=>$id,
        "img" => $newfilename
  		));




    // date_default_timezone_set('Asia/Manila');
    // $logdate = date('l jS \of F Y h:i:s A');
    // $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
    // VALUES(:accid, :accname, :activity, :logtimedate)");
    // $insertlog->execute(array(
    // "accid" => $_SESSION['accountid'],
    // "accname" => $_SESSION['accountname'],
    // "activity" => "Updated accommodation image of the accommodation with the accommodation ID ". $accommodationid ,
    // "logtimedate" => $logdate
    // ));

    $_SESSION['recordlistnotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> Image Updated. file". basename( $_FILES["fileToUpload"]["name"])." has been uploaded<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></div>";
    echo "<script language='JavaScript'>
    window.location.href='../../studentlist';
    </SCRIPT>";
  } else {
    //echo "Sorry, there was an error uploading your file.";
    $_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, there was an error uploading your file!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button></div>";
    echo "<script language='JavaScript'>
    window.location.href='../../studentlist';
    </SCRIPT>";
  }
}
 ?>
