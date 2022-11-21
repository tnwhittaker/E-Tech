<?php
include 'header.php';
   
    if (isset($_GET['submit'])){
        $productID = $_GET['prod-id'];
        $paths = array();
        $query = "SELECT * FROM images WHERE product_id = $productID";
        $images = mysqli_query($con, $query);
        if(mysqli_num_rows($images) > 0){
            foreach($images as $image){
                array_push($paths, './upload/'.$image['image_name']);
            }  
        }else{
            array_push($paths, './upload/default.jpeg');
        }
 
        $query = "SELECT * FROM products WHERE product_id='$productID'";
        $product = mysqli_query($con, $query);
        if(mysqli_num_rows($images) > 0){
            foreach($product as $prod){
                $_SESSION['product_name'] = $prod['product_name'];
                $_SESSION['sales_price'] = $prod['sales_price'];
                $_SESSION['quantity'] = $prod['quantity'];
            }
        }
    }
?>
<main>
    <div style="display: flex; gap: 1rem;">
        <section class="panel1">
            <img id=featured src="<?php echo $paths[0] ?>" alt="featured">

            <div id="slide-wrapper" >
                <img id="slideLeft" class="arrow" src="arrow-left.png" alt="arrow-left">

                <div id="slider">
                    <img class="thumbnail active" src="<?php echo $paths[0] ?>" alt="thumbnail">
                    <?php
                        for ($i = 1; $i < count($paths); $i++) {
                    ?>
                    <img class="thumbnail" src="<?php echo $paths[$i] ?>" alt="thumbnail">
                    <?php } ?>
                </div>
                <img id="slideRight" class="arrow" src="arrow-right.png" alt="arrow-right">
            </div>  
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

<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				
				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})
</script>
    
<?php include 'footer.php'; ?>
