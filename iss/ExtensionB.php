
<?php

// required headers
//include 'C:/xampp/htdocs/iss/index.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//echo jsaon_encode($products_arr);
$date = $_GET['date'];
echo json_encode($date);
