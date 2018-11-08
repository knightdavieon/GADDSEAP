<?php
include_once("../../accessdb.php");
session_start();

if (!empty($_POST)){

	$firstname = $_POST['firstname'];
	$mi = $_POST['mi'];
	$lastname = $_POST['lastname'];
	$suffix = $_POST['suffix'];
	$address = $_POST['address'];
	$civilstatus = $_POST['civilstatus'];
	$school = $_POST['school'];
	$birthdate = $_POST['birthdate'];
	$course = $_POST['course'];
	$year = $_POST['year'];
	$citizenship = $_POST['citizenship'];
	$contact = $_POST['contact'];
	$age = $_POST['age'];
	$sex = $_POST['sex'];
	$religion = $_POST['religion'];
	$scholarship = $_POST['scholarship'];
	$educational = $_POST['educational'];




	date_default_timezone_set('Asia/Manila');
	$date = date('mdY');
	$record_date = date('Y-m-d');
	
	function generateCode() {
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		Global $generatedId;
		Global $studentcode;
		$random_string_length = 6;
		$max = strlen($characters) - 1;
		for ($i = 0; $i < $random_string_length; $i++) {
			$studentcode .= $characters[mt_rand(0, $max)];
		}
	}

	generateCode();
	$idcode = $date . $studentcode;

	$insertpersonal = $conn->prepare("INSERT INTO personal_info(record_id, first_name, mi, last_name, ex, address, civil_status, school, birthdate, course, year, citizenship, contact_no, age, sex, religion, purpose, educational, record_date)
	    VALUES(:record_id, :first_name, :mi, :last_name, :ex, :address, :civil_status, :school, :birthdate, :course, :year, :citizenship, :contact_no, :age, :sex, :religion, :purpose, :educational, :record_date)");
		$insertpersonal->execute(array(
			"record_id" => $idcode,
		    "first_name" => $firstname,
		    "mi" => $mi,
		    "last_name" => $lastname,
		    "ex" => $suffix,
		    "address" => $address,
		    "civil_status" => $civilstatus,
		    "school" => $school,
		    "birthdate" => $birthdate,
		    "course" => $course,
		    "year" => $year,
		    "citizenship" => $citizenship,
		    "contact_no" => $contact,
		    "age" => $age,
		    "sex" => $sex,
		    "religion" => $religion,
		    "purpose" => $scholarship,
		    "educational" => $educational,
		    "record_date" => $record_date
		));

		echo "<script language='JavaScript'>
						window.location.href='../form';
							</SCRIPT>";


}

?>