<?php
function search_rec($_POST) {
    $by_name = $_POST['by_name'];
    $by_sex = $_POST['by_sex'];
    $by_group = $_POST['by_group'];
    $by_level = $_POST['by_level'];

    //Do real escaping here

    $query = "SELECT * FROM donar";
    $conditions = array();

    if(! empty($by_name)) {
      $conditions[] = "name='$by_name'";
    }
    if(! empty($by_sex)) {
      $conditions[] = "sex='$by_sex'";
    }
    if(! empty($by_group)) {
      $conditions[] = "blood_group='$by_group'";
    }
    if(! empty($by_level)) {
      $conditions[] = "e_level='$by_level'";
    }

    $sql = $query;
    if (count($conditions) > 0) {
      $sql .= " WHERE " . implode(' AND ', $conditions);
    }

    $result = mysql_query($sql);

    return $result;
}
 ?>
