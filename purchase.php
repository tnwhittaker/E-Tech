<?php
include 'header.php';
   
    if(isset($_GET['confirm-order'])){
       if(!is_numeric($_GET['cvv']) || strlen($_GET['cvv'])>3 || empty($_GET['cvv'])){
            echo "There is an error with the CVV number";
       }elseif(!is_numeric($_GET['cardnum']) || strlen($_GET['cardnum'])>16 || empty($_GET['cardnum'])){
            echo "There is an error with the card number";
       }elseif( strlen($_GET['addr1'])>25){
            echo "There is an error with the address 1 line";
       }elseif( strlen($_GET['addr2'])>25){
            echo "There is an error with the address 2 line";
       }elseif( strlen($_GET['city'])>20){
            echo "There is an error with the city line";
       }elseif(!filter_var($_GET['emailaddr'], FILTER_VALIDATE_EMAIL) || strlen($_GET['emailaddr'])>35){
            echo "There is an error with the email address";
       }else{
            $new_quantity = (int)$_SESSION['quantity'] - (int)$_SESSION['user_quantity'];

            $update_query = "UPDATE products SET quantity = $new_quantity WHERE product_id =".$_SESSION['prod-id'];
            mysqli_query($con, $update_query);

            $insert_query = "INSERT INTO orders (product_id, customer_name, amount, total) VALUES
            ('".$_SESSION['prod-id']."','".$_GET['name']."','".$_SESSION['user_quantity']."','".$_SESSION['price']."')";

            mysqli_query($con, $insert_query);
            //REDIRECT TO MAIN PAGE
            //SHOW A BREAKDOWN OF ORDER
            echo "SUCCESS";
       }
    }
