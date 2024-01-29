<?php
session_start();
include('../config/dbcon.php');
include('../function/myfunction.php');

$returnArr = array();
$country = isset($_GET['country']) ? $_GET['country'] : '';
$requestfor = isset($_GET['requestFor']) ? $_GET['requestFor'] : '';


if($requestfor == 'fetchingCountryState'){
    $sql = "SELECT * FROM states WHERE country_id = '" . $con->real_escape_string($country) . "'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            $returnArr[$count]['id'] = $row['id'];
            $returnArr[$count]['name'] = $row['name'];
            $count++;
        }
    }
      echo json_encode($returnArr);
}