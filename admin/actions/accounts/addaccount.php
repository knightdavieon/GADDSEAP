<?php
include_once("../../../accessdb.php");
session_start();
if (!empty($_POST)){
	$accountName = $_POST['addAccountName'];
	$accountPass = $_POST['addPassword'];
	$accountRePass = $_POST['addRepass'];
	$firstName = $_POST['addFirstname'];
	$lastName = $_POST['addLastname'];
	$contactNumber = $_POST['addContactNumber'];
	$acctype = $_POST['accounttype'];

	date_default_timezone_set('Asia/Manila');
	$date = date('mdY');

	function generateCode() {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		Global $generatedId;
		Global $usercode;
		$random_string_length = 6;
		$max = strlen($characters) - 1;
		for ($i = 0; $i < $random_string_length; $i++) {
			$usercode .= $characters[mt_rand(0, $max)];
		}
	}
	generateCode();
	$upcode = $date . $usercode;

	$getaccountname = $conn->prepare("select count(*) from accounts where account_name like :accountname");
	$getaccountname->execute(array(':accountname' => $accountName));
	$number_of_rows = $getaccountname->fetchColumn();

	if($number_of_rows != 0){
		$_SESSION['accountsNotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Account name already exist!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
  echo "<script language='JavaScript'>
						window.location.href='../accounts';
							</SCRIPT>";
	}else{

		if($accountPass == $accountRePass){
		$insertaccount = $conn->prepare("INSERT INTO accounts(account_id, account_name, account_password, account_type, account_status)
	    VALUES(:accid, :accname, :accpass, :acctype, :accstat)");
		$insertaccount->execute(array(
		    "accid" => $upcode,
		    "acctype" => $acctype,
		    "accname" => $accountName,
		    "accpass" => md5($accountPass),
		    "accstat" => "INACTIVE"
		));
		$insertuser = $conn->prepare("INSERT INTO user_details(account_id, user_firstname, user_lastname, user_contact)
	    VALUES(:accidd, :userfname, :userlname, :usercont)");
		$insertuser->execute(array(
			"accidd" => $upcode,
		    "userfname" => $firstName,
		    "userlname" => $lastName,
		    "usercont" => $contactNumber

		));
		/*
		date_default_timezone_set('Asia/Manila');
            $logdate = date('l jS \of F Y h:i:s A');
            $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
            VALUES(:accid, :accname, :activity, :logtimedate)");
            $insertlog->execute(array(
                "accid" => $_SESSION['accountid'],
                "accname" => $_SESSION['accountname'],
                "activity" => "Added a new account for " . $firstName ." ". $lastName,
                "logtimedate" => $logdate
            ));
		*/
		$_SESSION['accountsNotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> New account created!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";


		echo "<script language='JavaScript'>
						window.location.href='../accounts';
							</SCRIPT>";
	}else{
		$_SESSION['accountsNotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Password doesnt match!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";

	}

	echo "<script language='JavaScript'>
						window.location.href='../../accounts';
							</SCRIPT>";


}
}

?>
