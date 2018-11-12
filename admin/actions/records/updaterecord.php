<?php
include_once("../../../accessdb.php");
session_start();

if (!empty($_POST)){

///////personal////////////
	$id = $_POST['record_id'];
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



	$updatepersonal = $conn->prepare("UPDATE personal_info SET first_name = :first_name, mi = :mi, last_name = :last_name, ex = :ex, address = :address, civil_status = :civil_status, school = :school, birthdate = :birthdate, course = :course, year = :year, citizenship = :citizenship, contact_no = :contact_no, age = :age, sex = :sex, religion = :religion, purpose = :purpose, educational = :educational WHERE record_id = :id");
		$updatepersonal->execute(array(
			"id"=>$id,
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
		    "educational" => $educational
		  
		));


		

		echo "<script language='JavaScript'>
						window.location.href='../studentlist';
							</SCRIPT>";

}

?>