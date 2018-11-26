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
	$addbrgy = $_POST['addBrgy'];
	$addmun = $_POST['addMun'];
	$addprov = $_POST['addProv'];
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



	$updatepersonal = $conn->prepare("UPDATE personal_info SET first_name = :first_name, mi = :mi, last_name = :last_name, ex = :ex, address_brgy = :addressbrgy, address_mun = :addressmun, address_prov = :addressprov, civil_status = :civil_status, school = :school, birthdate = :birthdate, course = :course, year = :year, citizenship = :citizenship, contact_no = :contact_no, age = :age, sex = :sex, religion = :religion, purpose = :purpose, educational = :educational WHERE record_id = :id");
		$updatepersonal->execute(array(
			"id"=>$id,
		    "first_name" => $firstname,
		    "mi" => $mi,
		    "last_name" => $lastname,
		    "ex" => $suffix,
				"addressbrgy" => $addbrgy,
				"addressmun" => $addmun,
				"addressprov" => $addprov,
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


	$updatefamily = $conn->prepare("UPDATE family_background SET father = :father, father_age = :father_age, father_occupation = :father_occupation, mother = :mother, mother_age = :mother_age, mother_occupation = :mother_occupation, siblings_1 = :siblings_1, 1_age = :1_age, 1_occupation = :1_occupation, siblings_2 = :siblings_2, 2_age = :2_age, 2_occupation = :2_occupation, siblings_3 = :siblings_3, 3_age = :3_age, 3_occupation = :3_occupation, spouse = :spouse, spouse_age = :spouse_age, spouse_occupation = :spouse_occupation WHERE record_id = :id");
		$updatefamily->execute(array(
			"id" => $id,
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


		date_default_timezone_set('Asia/Manila');
    $logdate = date('l jS \of F Y h:i:s A');
    $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
    VALUES(:accid, :accname, :activity, :logtimedate)");
    $insertlog->execute(array(
    "accid" => $_SESSION['accountid'],
    "accname" => $_SESSION['accountname'],
    "activity" => "Updated Record Of The Student with the ID ". $id ,
    "logtimedate" => $logdate
    ));

		$_SESSION['recordlistnotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> Record Updated!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
				</button></div>";
				echo "<script language='JavaScript'>
		window.location.href='../../studentlist';
			</SCRIPT>";

}

?>
