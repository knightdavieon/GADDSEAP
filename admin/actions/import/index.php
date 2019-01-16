    <?php
    include("../../../accessdb.php");
    require_once('vendor/php-excel-reader/excel_reader2.php');
    require_once('vendor/SpreadsheetReader.php');

    if (isset($_POST["import"]))
    {


      $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

      if(in_array($_FILES["file"]["type"],$allowedFileType)){

            $targetPath = 'files/'.$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());

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

            for($i=0;$i<$sheetCount;$i++)
            {

                $Reader->ChangeSheet($i);

                foreach ($Reader as $Row)
                {

                    $familyname = "";
                    if(isset($Row[1])) {
                        $familyname = $Row[1];
                    }

                      $firstname = "";
                    if(isset($Row[2])) {
                        $firstname = $Row[2];
                    }
                      $mi = "";
                    if(isset($Row[3])) {
                        $mi = $Row[3];
                    }
                      $school = "";
                    if(isset($Row[4])) {
                        $school = $Row[4];
                    }
                     $course = "";
                    if(isset($Row[5])) {
                        $course = $Row[5];
                    }

                     $address = "";
                    if(isset($Row[6])) {
                        $address = $Row[6];
                    }//explode address
                    $exploded[0] = " ";
                    $exploded[1] = " ";
                    $exploded[2] = " ";
                    $exploded = explode(",",$address);


                     $contactnumber = "";
                    if(isset($Row[7])) {
                        $contactnumber = $Row[7];
                    }

                    date_default_timezone_set('Asia/Manila');
                  	$date = date('mdY');
                  	$record_date = date('Y-m-d');



                  	generateCode();
                  	$idcode = $date . $studentcode;

                    if (!empty($familyname) || !empty($school)) {
                      $insertpersonal = $conn->prepare("INSERT INTO personal_info(record_id, first_name, mi, last_name, address_brgy, address_mun, address_prov,  school, course, contact_no)
              				VALUES(:record_id, :first_name, :mi, :last_name, :addressbrgy, :addressmun, :addressprov, :school, :course,  :contact_no)");
              				$insertpersonal->execute(array(
              					"record_id" => $idcode,
              					"first_name" => ucwords($firstname),
              					"mi" => ucwords($mi),
              					"last_name" => ucwords($familyname),
              					"addressbrgy" => ucwords($exploded[0]),
              					"addressmun" => ucwords($exploded[1]),
              					"addressprov" => ucwords($exploded[2]),
              					"school" => ucwords($school),
              					"course" => $course,
              					"contact_no" => $contactnumber,
              				));


                    }
                 }

             }
             echo "<script language='JavaScript'>
             window.location.href='../../';
             </SCRIPT>";
      }
      else
      {
            $type = "error";
            $message = "Invalid File Type. Upload Excel File.";
      }
    }
    ?>
