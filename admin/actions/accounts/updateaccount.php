<?php if (!empty($_POST)){
session_start();

	if (isset($_POST['chckbox'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$contactNo = $_POST['contact'];
		$accounttype = $_POST['acctype'];
		$id = $_POST['id'];
		include('../../../accessdb.php');
			if($password == $repassword){


						$insertaccount = $conn->prepare("UPDATE accounts SET account_password = :acpas, account_type = :acctype WHERE account_id = :id");
						$insertaccount->execute(array(
						    "acpas" => md5($password),
						    "acctype" => $accounttype,
						    "id" => $id

						));

						$insertuser = $conn->prepare("UPDATE user_details SET user_firstname = :userfname, user_lastname = :userlname, user_contact = :usercont WHERE account_id = :id");
						$insertuser->execute(array(
						    "userfname" => $firstname,
						    "userlname" => $lastname,
						    "usercont" => $contactNo,
						    "id" => $id
						));
						/*
						date_default_timezone_set('Asia/Manila');
			            $logdate = date('l jS \of F Y h:i:s A');
			            $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
			            VALUES(:accid, :accname, :activity, :logtimedate)");
			            $insertlog->execute(array(
			                "accid" => $_SESSION['accountid'],
			                "accname" => $_SESSION['accountname'],
			                "activity" => "Updated account informations of the account with the account ID ". $id ,
			                "logtimedate" => $logdate
			            ));
						*/
							$_SESSION['accountsNotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> Account Updated!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button></div>";


		echo "<script language='JavaScript'>
						window.location.href='../../accounts';
							</SCRIPT>";
			}else{
				$_SESSION['accountsNotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Password doesnt match!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button></div>";


		echo "<script language='JavaScript'>
						window.location.href='../../accounts';
							</SCRIPT>";
			}

	}else{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contactNo = $_POST['contact'];
		$accounttype = $_POST['acctype'];
		$id = $_POST['id'];
		include('../../accessdb.php');

						$insertaccount = $conn->prepare("UPDATE accounts SET account_type = :acctype WHERE account_id = :id");
						$insertaccount->execute(array(
						    "acctype" => $accounttype,
						    "id" => $id

						));


						$insertuser = $conn->prepare("UPDATE user_details SET user_firstname = :userfname, user_lastname = :userlname, user_contact = :usercont WHERE account_id = :id");
						$insertuser->execute(array(
						    "userfname" => $firstname,
						    "userlname" => $lastname,
						    "usercont" => $contactNo,
						    "id" => $id
						));

						/*
						date_default_timezone_set('Asia/Manila');
			            $logdate = date('l jS \of F Y h:i:s A');
			            $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
			            VALUES(:accid, :accname, :activity, :logtimedate)");
			            $insertlog->execute(array(
			                "accid" => $_SESSION['accountid'],
			                "accname" => $_SESSION['accountname'],
			                "activity" => "Updated account informations of the account with the account ID ". $id ,
			                "logtimedate" => $logdate
			            ));
						*/
						$_SESSION['accountsNotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> Account Updated!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  </button></div>";


		echo "<script language='JavaScript'>
						window.location.href='../../accounts';
							</SCRIPT>";


	}
}
?>
