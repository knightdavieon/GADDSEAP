<?php
SESSION_START();
//window.alert('Please Log In')
if(empty($_SESSION['accountid']) || empty($_SESSION['accountname'])){
	echo ("<script language='JavaScript'>

				window.location.href='../g4dds34p';
				</SCRIPT>");
}
?>
