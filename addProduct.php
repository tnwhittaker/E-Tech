<?php include 'header.php'; ?>
    <main>
        <form method="POST" action="confirmProduct.php">
            <div class="content">
                <h2 class="welcome-header">Welcome, Please Fill Out The <br>Form Below</h2>
                <div class="first-container">
                    <section class="section">
                        <input type="text" placeholder="Product Name" minlength="4" 
                        value="<?php echo (isset($_SESSION['productname']))?$_SESSION['productname']:'';?>" 
                        name="productname" class="input" required>
                    </section>

                    <section class="section2">
                        <label for="productname" class="labels">Product Name</label>
                    </section>

                    <section class="section">
                        <input type="text" placeholder="Product Code" minlength="4" 
                        value="<?php echo (isset($_SESSION['productcode']))?$_SESSION['productcode']:'';?>"
                        name="productcode" class="input" required>

                        <select name="producttype" class="input" required> 
                            <option value="" disabled selected>Select a Product</option>
                            <optgroup value="" label="Accessories">
                                <option value="Phone Case"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Phone Case' ? ' selected="selected"' : '';?>>
                                    Phone Case
                                </option>
                                <option value="Screen Protector"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Screen Protector' ? ' selected="selected"' : '';?>
                                >
                                    Screen Protector
                                </option>
                                <option value="Wireless Charger"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Wireless Charger' ? ' selected="selected"' : '';?>
                                >
                                    Wireless Charger
                                </option>
                                <option value="Type-C Cable"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Type-C Cable' ? ' selected="selected"' : '';?>
                                >
                                    Type-C Cable
                                </option>
                            </optgroup>
                            <optgroup value="" label="Electronics">
                                <option value="Laptop"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Laptop' ? ' selected="selected"' : '';?>
                                >
                                    Laptop
                                </option>
                                <option value="Tablet"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Tablet' ? ' selected="selected"' : '';?>
                                >
                                    Tablet
                                </option>
                                <option value="Printer"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Printer' ? ' selected="selected"' : '';?>
                                >
                                    Printer
                                </option>
                                <option value="Smart Watch"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Smart Watch' ? ' selected="selected"' : '';?>
                                >
                                    Smart Watch
                                </option>
                            </optgroup>
            
                            <optgroup value="" label="Peripheral">
                                <option value="Wireless Mouse"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Wireless Mouse' ? ' selected="selected"' : '';?>
                                >
                                    Wireless Mouse
                                </option>
                                <option value="Wireless Keyboard"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Wireless Keyboard' ? ' selected="selected"' : '';?>
                                >
                                    Wireless Keyboard
                                </option>
                                <option value="Webcam"
                                <?=isset($_SESSION['producttype'])&&$_SESSION['producttype'] == 
                                'Webcam' ? ' selected="selected"' : '';?>
                                >
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
                        class="txt-area"><?php echo (isset($_SESSION['productdescription']))?
                        $_SESSION['productdescription']:'';?></textarea>
                    </section>

                    <section class="section2">
                        <label for="productdescription" class="labels">Product Description</label>
                    </section>

                    <input type="number" min="0.00" step="0.01" 
                    name="cost-price" class="input" placeholder="Cost Price" 
                    value="<?php echo (isset($_SESSION['costprice']))?$_SESSION['costprice']:'';?>"required>
                    <label for="cost-price" class="labels">Cost Price</label>
            
                    <input type="number" min="0.00" step="0.01"
                     name="sales-price" class="input" placeholder="Sales Price"
                     value="<?php echo (isset($_SESSION['salesprice']))?$_SESSION['salesprice']:'';?>" required>
                    <label for="sales-price" class="labels">Sales Price</label>

                    <input type="number" min="0" step="1"
                     name="quantity" class="input" placeholder="Quantity In Stock"
                     value="<?php echo (isset($_SESSION['quantity']))?$_SESSION['quantity']:'';?>" required>
                    <label for="quantity" class="labels">Quantity</label>
            
                </div>
            
                <div class="btn-login">
                    <input type="submit" name="submit" value="SUBMIT" class="login">
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
