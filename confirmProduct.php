<?php 
    include 'header.php';
    if (isset($_POST['submit']) || isset($_POST['edit_submit'])){
        $_SESSION['productname'] = trim(filter_input(INPUT_POST, 'productname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $_SESSION['productcode'] = trim(filter_input(INPUT_POST, 'productcode', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $_SESSION['producttype'] = ucfirst(trim(filter_input(INPUT_POST, 'producttype',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS)));

        $_SESSION['productdescription'] = trim(filter_input(INPUT_POST, 'productdescription',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $_SESSION['costprice'] = filter_input(INPUT_POST, 'cost-price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $_SESSION['salesprice'] = filter_input(INPUT_POST, 'sales-price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $_SESSION['quantity'] = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $_SESSION['vendor-name'] = filter_input(INPUT_POST, 'vendor-name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $productname = $_SESSION['productname'];
        $productcode = $_SESSION['productcode'];
        $producttype = $_SESSION['producttype'];
        $productdescription = $_SESSION['productdescription'];
        $costprice = $_SESSION['costprice'];
        $salesprice = $_SESSION['salesprice'];
        $quantity = $_SESSION['quantity'];
        $vendorname = $_SESSION['vendor-name'];
    }
?>
    <main>
        <form method="POST" action="validateProduct.php">
            <div class="content">
                <h2 class="welcome-header">Please Confirm The Information<br> Below Is Correct</h2>
                <div class="first-container">
                    <section class="section">
                        <input type="text" class="input" 
                        value="<?php print_r($productname);?>" name="pname"  required disabled>
                    </section>

                    <section class="section2">
                        <label for="pname" class="labels">Product Name</label>
                    </section>

                    <section class="section">
                        <input type="text" value="<?php print_r($productcode);?>" 
                        name="pcode" class="input" required disabled>

                        <select name="" class="input" required disabled> 
                            <option value="" disabled>Select a Product</option>
                            <optgroup value="" label="Accessories">
                                <option value="Phone Case" 
                                <?php if($producttype=="Phone Case"){echo 'selected';}?>>
                                    Phone Case
                                </option>
                                <option value="Screen Protector" 
                                <?php if($producttype=="Screen Protector"){echo 'selected';}?>>
                                    Screen Protector
                                </option>
                                <option value="Wireless Charger" 
                                <?php if($producttype=="Wireless Charger"){echo 'selected';}?>>
                                    Wireless Charger
                                </option>
                                <option value="Type-C Cable" 
                                <?php if($producttype=="Type-C Cable"){echo 'selected';}?>>
                                    Type-C Cable
                                </option>
                            </optgroup>
                            <optgroup value="" label="Electronics">
                                <option value="Laptop" 
                                <?php if($producttype=="Laptop"){echo 'selected';}?>>
                                    Laptop
                                </option>
                                <option value="Tablet" 
                                <?php if($producttype=="Tablet"){echo 'selected';}?>>
                                    Tablet
                                </option>
                                <option value="Printer" 
                                <?php if($producttype=="Printer"){echo 'selected';}?>>
                                    Printer
                                </option>
                                <option value="Smart Watch" 
                                <?php if($producttype=="Smart Watch"){echo 'selected';}?>>
                                    Smart Watch
                                </option>
                            </optgroup>
            
                            <optgroup value="" label="Peripheral">
                                <option value="Wireless Mouse"
                                <?php if($producttype=="Wireless Mouse"){echo 'selected';}?>>
                                    Wireless Mouse
                                </option>
                                <option value="Wireless Keyboard"
                                <?php if($producttype=="Wireless Keyboard"){echo 'selected';}?>>
                                    Wireless Keyboard
                                </option>
                                <option value="Webcam"
                                <?php if($producttype=="Webcam"){echo 'selected';}?>>
                                    Webcam
                                </option>
                            </optgroup>
                        </select>
                    </section>

                    <section class="section2">
                        <label for="pcode" class="labels">Product Code</label>
                    </section>
            
                    <section>
                        <textarea name="pdescription" rows="7" cols="62" class="txt-area" 
                        disabled><?php echo ltrim($productdescription);?></textarea>
                    </section>

                    <section class="section2">
                        <label for="pdescription" class="labels">Product Description</label>
                    </section>

                    <input type="number" name="cost-price" class="input" 
                    value="<?php print_r($costprice);?>" disabled required>
                    <label for="cost-price" class="labels">Cost Price</label>
            
                    <input type="number" name="sales-price" class="input" 
                    value="<?php print_r($salesprice);?>" disabled required>
                    <label for="sales-price" class="labels">Sales Price</label>

                    <input type="number" name="quantity" class="input" 
                    value="<?php print_r($quantity);?>" disabled required>
                    <label for="quantity" class="labels">Quantity</label>

                    <?php if(strcmp($_SESSION['user-type'], 'admin') == 0): ?>
                        <select name="vendor-name" class="input" disabled required>
                            <?php
                            $query = "SELECT * FROM users WHERE type = 'vendor'";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $rs){
                            ?>
                                <option value="<?php echo $rs['first_name'] . " " . $rs['last_name']; ?>"  
                                <?php if($vendorname== 
                                $rs['first_name'] . " " . $rs['last_name']){echo 'selected';}?>>
                                <?php echo $rs['first_name'] . " " . $rs['last_name']; ?></option>
                            <?php
                                }
                             } 
                             ?>
                        </select>
                    <?php endif; ?>
                </div>

                <?php if (isset($_POST['submit'])): ?>
                    <div class="btn-login">
                        <input type="submit" name="submit" value="SUBMIT" class="login">
                    </div>
                <?php else: ?>
                    <div class="btn-login">
                        <input type="submit" name="edit_submit" value="CONFIRM" class="login">
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
