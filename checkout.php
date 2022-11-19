<?php
include 'header.php';
   
    if(isset($_GET['place-order'])){
        $price = substr($_SESSION['sales_price'], 1);
        $total = (int)$_GET['user_quantity'] * (int)$price;
        $_SESSION['total'] = $total;
        $_SESSION['user_quantity'] = $_GET['user_quantity'];
        $_SESSION['price'] = $price;
    }

?>
<main id="img-carousel">
    <div style="display: flex; gap: 1rem;">
        <section class="panel1">
        <h2>Review of Order</h2> 
        <p>Name of Product: <?php echo $_SESSION['product_name'];?></p>
        <p>Price: <?php echo $_SESSION['sales_price'];?></p>
        <p>Quantity: <?php echo $_GET['user_quantity'];?></p>
        <p>Final Price: <?php echo $total;?></p>
             
        </section>
        <section class="panel2" >
            <div>
                <h2>Please fill out the form below</h2>
                <form action="purchase.php" method="GET">
                    <p>Contact Information</p>
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="" class="test"><br>
                    <label for="emailaddr">Email Address:</label>
                    <input type="email" name="emailaddr" id="" class="test">
                
                    <p>Address</p>
                    <label for="addr1">Address Line 1:</label>
                    <input type="text" name="addr1" id="" class="test"><br>
                    <label for="addr2">Address Line 2:</label>
                    <input type="text" name="addr2" id="" class="test"><br>
                    <label for="city">City:</label>
                    <input type="text" name="city" id="" class="test">
                    
                    <p>Payment Information</p>
                    <label for="cardnum">Card Number:</label>
                    <input type="number" name="cardnum" id="" class="test"><br>
                    <label for="exp">Expiration Date:</label>
                    <input type="month" name="exp" id="" class="test" min="2023-01"><br>
                
                    <label for="cvv">CVV:</label>
                    <input type="password" name="cvv" id="" class="test" maxlength="3"><br>
                    <input type="submit" name="confirm-order" value="Place Order" class="login">
                </form>
            </div>
        </section>
    </div>
</main>
<?php include 'footer.php'; ?>
