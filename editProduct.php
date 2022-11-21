<?php
    include 'header.php';
    require 'dbconnect.php';
    if(isset($_GET['id'])){
        $product_id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM products WHERE product_id='$product_id'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $_SESSION['product_id'] = $product_id;
            $product = mysqli_fetch_array($result);
?>
<main>                     
    <form method="POST" action="confirmProduct.php">
        <div class="content">
            <h2 class="welcome-header">Welcome, Please Update The Product <br>Using The Form Below</h2>
            <div class="first-container">
                <section class="section">
                    <input type="text" placeholder="Product Name" minlength="4" 
                    value="<?=$product['product_name'];?>" 
                    name="productname" class="input" required>
                </section>

                <section class="section2">
                    <label for="productname" class="labels">Product Name</label>
                </section>

                <section class="section">
                    <input type="text" placeholder="Product Code" minlength="4" 
                    value="<?=$product['product_code'];?>"
                    name="productcode" class="input" required>

                    <select name="producttype" class="input" required> 
                        <option value="" disabled selected>Select a Product</option>
                        <optgroup value="" label="Accessories">
                            <option value="Phone Case"
                            <?php if($product['product_type']=="Phone Case"){echo 'selected';}?>>
                                Phone Case
                            </option>
                            <option value="Screen Protector"
                            <?php if($product['product_type']=="Screen Protector"){echo 'selected';}?>>
                                Screen Protector
                            </option>
                            <option value="Wireless Charger"
                            <?php if($product['product_type']=="Wireless Charger"){echo 'selected';}?>>
                                Wireless Charger
                            </option>
                            <option value="Type-C Cable"
                            <?php if($product['product_type']=="Type-C Cable"){echo 'selected';}?>>
                                Type-C Cable
                            </option>
                        </optgroup>
                        <optgroup value="" label="Electronics">
                            <option value="Laptop"
                            <?php if($product['product_type']=="Laptop"){echo 'selected';}?>>
                                Laptop
                            </option>
                            <option value="Tablet"
                            <?php if($product['product_type']=="Tablet"){echo 'selected';}?>>
                                Tablet
                            </option>
                            <option value="Printer"
                            <?php if($product['product_type']=="Printer"){echo 'selected';}?>>
                                Printer
                            </option>
                            <option value="Smart Watch"
                            <?php if($product['product_type']=="Smart Watch"){echo 'selected';}?>>
                                Smart Watch
                            </option>
                        </optgroup>
        
                        <optgroup value="" label="Peripheral">
                            <option value="Wireless Mouse"
                            <?php if($product['product_type']=="Wireless Mouse"){echo 'selected';}?>>
                                Wireless Mouse
                            </option>
                            <option value="Wireless Keyboard"
                            <?php if($product['product_type']=="Wireless Keyboard"){echo 'selected';}?>>
                                Wireless Keyboard
                            </option>
                            <option value="Webcam"
                            <?php if($product['product_type']=="Webcam"){echo 'selected';}?>>
                                Webcam
                            </option>
                        </optgroup>
                    </select>
                </section>

                <section class="section2">
                    <label for="productcode" class="labels">Product Code</label>
                </section>
        
                <section>
                    <textarea name="productdescription" placeholder="Product Description"
                    minlength="15" rows="7" cols="62" 
                    class="txt-area"><?php echo $product['product_description'];?></textarea>
                </section>

                <section class="section2">
                    <label for="productdescription" class="labels">Product Description</label>
                </section>

                <input type="number" min="0.00" step="0.01" 
                name="cost-price" class="input" placeholder="Cost Price" 
                value="<?=$product['cost_price'];?>"required>
                <label for="cost-price" class="labels">Cost Price</label>
        
                <input type="number" min="0.00" step="0.01"
                name="sales-price" class="input" placeholder="Sales Price"
                value="<?=$product['sales_price'];?>" required>
                <label for="sales-price" class="labels">Sales Price</label>

                <input type="number" min="0" step="1"
                name="quantity" class="input" placeholder="Quantity In Stock"
                value="<?=$product['quantity'];?>" required>
                <label for="quantity" class="labels">Quantity</label>
        
            </div>
        
            <div class="btn-login">
                <input type="submit" name="edit_submit" value="UPDATE" class="login">
            </div>
        </div>
    </form>

    <?php
                }else{
                    echo "<h4>Product Doesn't Exist</h4>";
                }
            }
    ?>
</main>
<?php include 'footer.php'; ?>
