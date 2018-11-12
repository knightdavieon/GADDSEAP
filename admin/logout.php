<?php
SESSION_START();
include("../accessdb.php");

if(!empty($_SESSION['accountname']) || !empty($_SESSION['accountid'])){
	/*
	date_default_timezone_set('Asia/Manila');
            $logdate = date('l jS \of F Y h:i:s A');
            $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
            VALUES(:accid, :accname, :activity, :logtimedate)");
            $insertlog->execute(array(
                "accid" => $_SESSION['accountid'],
                "accname" => $_SESSION['accountname'],
                "activity" => "Logged Out Using IP " . $_SERVER['REMOTE_ADDR'],
                "logtimedate" => $logdate
            ));*/
	session_unset();
	session_destroy();
	echo ("<script language='JavaScript'>
				
				window.location.href='../';
				</SCRIPT>");

}else{
	echo ("<script language='JavaScript'>
				window.alert('Please Log In')
				window.location.href='../';
				</SCRIPT>");

}

?>