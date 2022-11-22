<?php
include 'header.php';?>
<main>
<form action="">
    <div class="content">
        <h2 class="welcome-header">Order Status</h2>
        <div class="first-container">
     <?php
    if(isset($_POST['confirm-order'])){
       if(!is_numeric($_POST['cvv']) || strlen($_POST['cvv'])>3 || empty($_POST['cvv'])){
            echo "<p style='text-align: center;'>There is an error with the CVV number</p>";
            header( "refresh:5;url=checkout.php" );
       }elseif(!is_numeric($_POST['cardnum']) || strlen($_POST['cardnum'])>16 || empty($_POST['cardnum'])){
            echo "<p style='text-align: center;'>There is an error with the card number</p>";
            header( "refresh:5;url=checkout.php" );
       }elseif( strlen($_POST['addr1'])>25){
            echo "<p style='text-align: center;'>There is an error with the address 1 line</p>";
            header( "refresh:5;url=checkout.php" );
       }elseif( strlen($_POST['addr2'])>25){
            echo "<p style='text-align: center;'>There is an error with the address 2 line</p>";
            header( "refresh:5;url=checkout.php" );
       }elseif( strlen($_POST['city'])>20){
            echo "<p style='text-align: center;'>There is an error with the city line</p>";
            header( "refresh:5;url=checkout.php" );
       }elseif(!filter_var($_POST['emailaddr'], FILTER_VALIDATE_EMAIL) || strlen($_POST['emailaddr'])>35){
            echo "<p style='text-align: center;'>There is an error with the email address</p>";
            header( "refresh:5;url=checkout.php" );
       }else{
            $new_quantity = (int)$_SESSION['quantity'] - (int)$_SESSION['user_quantity'];

            $update_query = "UPDATE products SET quantity = $new_quantity WHERE product_id =".$_SESSION['prod-id'];
            mysqli_query($con, $update_query);

            $insert_query = "INSERT INTO orders (product_id, customer_name, amount, total) VALUES
            ('".$_SESSION['prod-id']."','".$_POST['name']."','"
            .$_SESSION['user_quantity']."','".$_SESSION['total']."')";

            mysqli_query($con, $insert_query);
            echo "<p style='text-align: center;'>Name of Recipient: ".$_POST['name']."<br>
            Product Name: ".$_SESSION['product_name']."<br>
            Shipping Address Line 1: ".$_POST['addr1']."<br>
            Shipping Address Line 2: ".$_POST['addr2']."<br>
            City: ".$_POST['city']."<br>
            Cost: $".$_SESSION['price']."<br>
            Quantity: ".$_SESSION['user_quantity']."<br>
            Total: $".$_SESSION['total']."</p>";

          }
    }
?>
        </div>
</div>

</form>
</main>
<?php include 'footer.php'; ?>
