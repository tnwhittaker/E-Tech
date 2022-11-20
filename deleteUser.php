<?php
include 'header.php';
require 'dbconnect.php';

if(isset($_POST['delete'])){
    $user_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM users WHERE user_id='$user_id' ";
    $result = mysqli_query($con, $query);

    if($result){
        $_SESSION['message'] = "User Deleted Successfully";
        header( "Location: accountList.php" );
    }else{
        $_SESSION['message'] = "User Not Deleted";
        header( "Location: accountList.php" );
    }
}
