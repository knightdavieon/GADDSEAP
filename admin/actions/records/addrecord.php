<?php
include_once("../../../accessdb.php");
session_start();

if (!empty($_POST)){

///////personal////////////
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

////////////family///////////////

	$father = $_POST['father'];
	$father_age = $_POST['father_age'];
	$father_occupation = $_POST['father_occupation'];
	$mother = $_POST['mother'];
	$mother_age = $_POST['mother_age'];
	$mother_occupation = $_POST['mother_occupation'];

	$siblings_1 = $_POST['siblings_1'];
	$age1 = $_POST['1_age'];
	$occupation1 = $_POST['1_occupation'];

	$siblings_2 = $_POST['siblings_2'];
	$age2 = $_POST['2_age'];
	$occupation2 = $_POST['2_occupation'];

	$siblings_3 = $_POST['siblings_3'];
	$age3 = $_POST['3_age'];
	$occupation3 = $_POST['3_occupation'];

	$spouse = $_POST['spouse'];
	$spouse_age = $_POST['spouse_age'];
	$spouse_occupation = $_POST['spouse_occupation'];


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


		$insertfamily = $conn->prepare("INSERT INTO family_background(record_id, father, father_age, father_occupation, mother, mother_age, mother_occupation, siblings_1, 1_age, 1_occupation, siblings_2, 2_age, 2_occupation, siblings_3, 3_age, 3_occupation, spouse, spouse_age, spouse_occupation)
	    VALUES(:record_id, :father, :father_age, :father_occupation, :mother, :mother_age, :mother_occupation, :siblings_1, :1_age, :1_occupation, :siblings_2, :2_age, :2_occupation, :siblings_3, :3_age, :3_occupation, :spouse, :spouse_age, :spouse_occupation)");
		$insertfamily->execute(array(
			"record_id" => $idcode,
		    "father" => $father,
		    "father_age" => $father_age,
		    "father_occupation" => $father_occupation,
		    "mother" => $mother,
		    "mother_age" => $mother_age,
		    "mother_occupation" => $mother_occupation,
		    "siblings_1" => $siblings_1,
		    "1_age" => $age1,
		    "1_occupation" => $occupation1,
		    "siblings_2" => $siblings_2,
		    "2_age" => $age2,
		    "2_occupation" => $occupation2,
		    "siblings_3" => $siblings_3,
		    "3_age" => $age3,
		    "3_occupation" => $occupation3,
		    "spouse" => $spouse,
		    "spouse_age" => $spouse_age,
		    "spouse_occupation" => $spouse_occupation
		));






		echo "<script language='JavaScript'>
						window.location.href='../form';
							</SCRIPT>";


}

?>