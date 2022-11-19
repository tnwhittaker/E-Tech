
<?php
include 'header.php';
   
    for ($i = 1; $i < 5; $i++){
        if (isset($_GET['product_name'.$i])){
            
            $_SESSION['product_name'] = $_GET['product_name'.$i];
            $_SESSION['sales_price'] = $_GET['sales_price'.$i];
            $_SESSION['image'] = $_GET['image'];
            $_SESSION['quantity'] = $_GET['quantity'];
            $_SESSION['prod-id'] = $_GET['prod-id'];
            break;
        }

    }
?>
<main id="img-carousel">
    <div style="display: flex; gap: 1rem;">
        <section class="panel1">
            <ul id="">    
                <li><img src="<?php echo $_SESSION['image'];?>" alt="" class="carousel-img"></li>               
            </ul>   
        </section>
        <section class="panel2">
            <div>
                <h2><?php echo $_SESSION['product_name'] ?></h2>
                <h4>Sales Price: <?php echo $_SESSION['sales_price'] ?></h4>
                <form action="checkout.php" method="GET">
                <?php
                    function dropdownMenu($quantity){
                        echo "<span>Quantity: </span>";
                        echo '<select class="product-quantity" name="user_quantity">';
                
                            for($b= 1; $b <= $quantity; $b++){
                                echo "<option value='$b'>$b</option>";
                            }
                        
                        echo '</select>'.'<br><br>';   
                        echo '<input type="submit" value="Place Order" class="login" name="place-order">';
                
                    }
                    if($_SESSION['quantity']>0 && $_SESSION['quantity']>1){
                        echo '<p>In stock</p>';
                        dropdownMenu($_SESSION['quantity']);
                
                    }elseif($_SESSION['quantity']==1){
                        echo '<p>Low in stock. Last one remaining</p>';
                        dropdownMenu($_SESSION['quantity']);
                    }else{
                        echo '<p>Out of stock</p>';
                    }
                
                ?>
                </form>
            </div>

            <div style="border-top: grey solid 3px; margin-top: 20px; padding-bottom: 2rem;">
                <h3>About the vendor</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero temporibus odit odio nam modi dolorum asperiores reiciendis commodi. 
                    Voluptatum totam eos amet praesentium adipisci, harum incidunt eum cumque maxime tempora?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero temporibus odit odio nam modi dolorum asperiores reiciendis commodi. 
                    Voluptatum totam eos amet praesentium adipisci, harum incidunt eum cumque maxime tempora?
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero temporibus odit odio nam modi dolorum asperiores reiciendis commodi. 
                    Voluptatum totam eos amet praesentium adipisci, harum incidunt eum cumque maxime tempora?
                </p>
            </div>
        </section>
    </div>
</main>
    
<?php include 'footer.php'; ?>

    