<?php

// $con = mysqli_connect("localhost","root","","wsdi_db");

// if(!$con){
//     die('Connection Failed'. mysqli_connect_error());
// }

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-06.cleardb.net"];
$cleardb_username = $cleardb_url["bbcd188782a295"];
$cleardb_password = $cleardb_url["33ab9f63"];
$cleardb_db = substr($cleardb_url["heroku_a690e11a02cd9fc"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>