<?php
    include 'header.php';
    require 'dbconnect.php';
    if(isset($_GET['id'])){
        $user_id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $_SESSION['user_id'] = $user_id;
            $user = mysqli_fetch_array($result);
?>
