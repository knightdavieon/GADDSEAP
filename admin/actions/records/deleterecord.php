<?php if (!empty($_POST)){
session_start();
include('../../../accessdb.php');
$id = $_POST['accountid'];
						$deletepersonal = $conn->prepare("DELETE FROM personal_info WHERE record_id = :id");
						$deletepersonal->execute(array(
						    "id" => $id
						));


						$deletefamily = $conn->prepare("DELETE FROM family_background WHERE record_id = :id");
						$deletefamily->execute(array(
						    "id" => $id
						));

						date_default_timezone_set('Asia/Manila');
						$logdate = date('l jS \of F Y h:i:s A');
						$insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
						VALUES(:accid, :accname, :activity, :logtimedate)");
						$insertlog->execute(array(
							"accid" => $_SESSION['accountid'],
							"accname" => $_SESSION['accountname'],
							"activity" => "Removed student from the list with the IP " . $_SERVER['REMOTE_ADDR'],
							"logtimedate" => $logdate
						));

						$_SESSION['recordlistnotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> Record Deleted!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button></div>";
							  echo "<script language='JavaScript'>
						window.location.href='../../studentlist';
							</SCRIPT>";


}
?>