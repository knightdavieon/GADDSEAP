<?php
include_once("../../../accessdb.php");
session_start();

if (!empty($_POST)){

	///////personal////////////
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
	//start image upload $_FILES["fileToUpload"]

		$target_dir = "../../../resources/images/pictures/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$recordimage = basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				//echo "File is not an image.";
				$_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> File is not an image!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button></div>";
				//  echo "<script language='JavaScript'>
				//                        window.location.href='../accommodations';
				//                            </SCRIPT>";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, File alreay exist!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button></div>";
			//  echo "<script language='JavaScript'>
			//                        window.location.href='../accommodations';
			//                           </SCRIPT>";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 1000000000) {
			//echo "Sorry, your file is too large.";
			$_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, your file is too large!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button></div>";
			// echo "<script language='JavaScript'>
			// window.location.href='../../form';
			// </SCRIPT>";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, only JPG, JPEG, PNG & GIF are allowed!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button></div>";
			//  echo "<script language='JavaScript'>
			//                       window.location.href='../accommodations';
			//                           </SCRIPT>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
			$_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, your file was not uploaded!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button></div>";
			echo "<script language='JavaScript'>
			window.location.href='../../form';
			</SCRIPT>";
		} else {
			$temp = explode(".", $recordimage);
			$newfilename = $idcode . '.' . end($temp);
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
				// echo "The file ". $newfilename. " has been uploaded.";
				$insertpersonal = $conn->prepare("INSERT INTO personal_info(record_id, first_name, mi, last_name, ex, address_brgy, address_mun, address_prov, civil_status, school, birthdate, course, year, citizenship, contact_no, age, sex, religion, purpose, educational, record_date, image)
				VALUES(:record_id, :first_name, :mi, :last_name, :ex, :addressbrgy, :addressmun, :addressprov, :civil_status, :school, :birthdate, :course, :year, :citizenship, :contact_no, :age, :sex, :religion, :purpose, :educational, :record_date, :img)");
				$insertpersonal->execute(array(
					"record_id" => $idcode,
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
					"educational" => $educational,
					"record_date" => $record_date,
					"img" => $newfilename
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

				date_default_timezone_set('Asia/Manila');
        $logdate = date('l jS \of F Y h:i:s A');
        $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
        VALUES(:accid, :accname, :activity, :logtimedate)");
        $insertlog->execute(array(
          "accid" => $_SESSION['accountid'],
          "accname" => $_SESSION['accountname'],
          "activity" => "Added new student to the list with the IP " . $_SERVER['REMOTE_ADDR'],
          "logtimedate" => $logdate
        ));





				// date_default_timezone_set('Asia/Manila');
				// $logdate = date('l jS \of F Y h:i:s A');
				// $insertlog = $conn->prepare("INSERT INTO activity_log(account_id, account_name, activity, log_date_time)
				// VALUES(:accid, :accname, :activity, :logtimedate)");
				// $insertlog->execute(array(
				// "accid" => $_SESSION['accountid'],
				// "accname" => $_SESSION['accountname'],
				// "activity" => "Updated accommodation image of the accommodation with the accommodation ID ". $accommodationid ,
				// "logtimedate" => $logdate
				// ));

				$_SESSION['recordlistnotifications'] = "<div class='alert alert-primary' role='alert'><strong>Success!</strong> The record has been saved and file". basename( $_FILES["fileToUpload"]["name"])." has been uploaded<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button></div>";
				echo "<script language='JavaScript'>
				window.location.href='../../form';
				</SCRIPT>";
			} else {
				//echo "Sorry, there was an error uploading your file.";
				$_SESSION['recordlistnotifications'] = "<div class='alert alert-danger' role='alert'><strong>Error!</strong> Sorry, there was an error uploading your file!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button></div>";
				echo "<script language='JavaScript'>
				window.location.href='../../form';
				</SCRIPT>";
			}
		}




}

?>
