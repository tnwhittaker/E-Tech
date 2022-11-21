<?php
include 'header.php';
require 'dbconnect.php';

if(isset($_POST['delete'])){
    $product_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM products WHERE product_id='$product_id' ";
    $result = mysqli_query($con, $query);

    if($result){
        $_SESSION['message'] = "Product Deleted Successfully";
        header( "Location: productList.php" );
    }else{
        $_SESSION['message'] = "Product Not Deleted";
        header( "Location: productList.php" );
    }
}
