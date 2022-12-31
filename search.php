<?php include 'header.php'; ?>

    <?php
        if(isset($_GET['query'])){
            $value = $_GET['query'];
            $query = "SELECT * FROM products WHERE CONCAT(product_name, product_type, sales_price)
            LIKE '%$value%'";
            $result = mysqli_query($con,$query);
            $results_to_print = "";
            $i=1;
            if (mysqli_num_rows($result) > 0){ 
                foreach($result as $row){
                    $productID = $row['product_id'];
                    $query = "SELECT * FROM images WHERE product_id = '$productID' LIMIT 1";
                    $images = mysqli_query($con, $query);
                    if(mysqli_num_rows($images) > 0){
                        foreach($images as $img){
                            $path = "./upload/" . $img['image_name'];
                        }
                    }else{
                        $path = "./upload/default.jpeg";
                    }
                    $results = '
                            <div>
                            <form action="product_selection.php" method="GET">
                                <div class="prod-card">
                                <img src="'.$path.'" alt="Avatar" style="width:100%" name="image">
                                <input type="hidden" name="image" value="'. $path.'">
                                <input type="hidden" name="quantity" value="'.$row['quantity'].'">
                                <input type="hidden" name="prod-id" value="'.$row['product_id'].'">
                                <div class="image-container">
                                <h4><input type="input" class="product-title" style="border:none; font-weight: bold;" 
                                name="product_name'.$i.'" value="'.$row['product_name'].'"/></b></h4>
                                <h4><input type="input" class="product-title" 
                                style="border:none;" name="sales_price'.$i.'" value="$'.$row['sales_price'].'"/></h4>
                                
                                </div>
                                <a href="./product_selection.php" style="text-decoration: none;">
                                <input type="submit" style="margin-left: 0.8rem; margin-bottom:1rem;" 
                                name="submit" value="Go to Product" class="login"> </a>
                                </div>
                            </form>
                            </div>';   
                    $results_to_print.=$results;
                    $i++;
                }
           
                echo '<div class="parent">'.$results_to_print.'</div>';
            }else{
                echo "
                <div class='content'>
                    <div class='first-container'>
                    <p style='text-align: center;'>Oops, Product Not In Our Database.</p>
                    </div>
                </div>
                ";
            }
        }
    ?>
<?php include 'footer.php'; ?>
