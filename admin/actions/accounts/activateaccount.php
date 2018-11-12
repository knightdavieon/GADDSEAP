<?php if (!empty($_POST)){
session_start();
include('../../../accessdb.php');
$id = $_POST['accountid'];
$deactivateuser = $conn->prepare("UPDATE accounts SET account_status = 'ACTIVE' WHERE account_id = :id");
						$deactivateuser->execute(array(
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
			                "activity" => "Activated the account with the account ID ". $id ,
			                "logtimedate" => $logdate
			            ));
						*/
						$_SESSION['accountsNotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> Account Activated!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button></div>";
							  echo "<script language='JavaScript'>
						window.location.href='../../accounts';
							</SCRIPT>";


}
?>
