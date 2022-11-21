<?php include 'header.php'; ?>
    <main>
        <section class="products">
            <h2>Popular Products</h2>
            <div class="product-container procontainer">
                <?php
                    $query = "SELECT * FROM products LIMIT 5";
                    $products = mysqli_query($con, $query);

                    if(mysqli_num_rows($products) > 0){
                        foreach($products as $product){
                            $productID = $product['product_id'];
                            $query = "SELECT * FROM images WHERE product_id = '$productID' LIMIT 1";
                            $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $rs){
                                    $path = "./upload/" . $rs['image_name'];
                                }
                            }else{
                                $path = "./upload/default.jpeg";
                            }
                ?>
                    <div class="product--card">
                        <p class="product--type"><?= $product['product_type']; ?></p>
                        <img class="product--img" src="<?php echo $path; ?>" alt="product">
                        <p class="name"><?= $product['product_name']; ?><span class="product--code">
                        <?= $product['product_code']; ?></span></p>
                        <p class="product--cost">$<?= $product['cost_price']; ?></p>
                    </div>
                <?php
                        }
                    }
                ?>
            </div>
        </section>

        <section class="about">
            <h2>About Us</h2>
            <table class="about--table">
                <tr class="about--row">
                    <th class="about--header">Names</th>
                    <th class="about--header">ID Numbers</th>
                </tr>
                <tr class="about--row">
                    <td>Deanna Sawyers</td>
                    <td>1903439</td>
                </tr>
                <tr class="about--row">
                    <td>Keizia Burford</td>
                    <td>1903685</td>
                </tr>
                <tr class="about--row">
                    <td>Kevaughn Pryce</td>
                    <td>1901891</td>
                </tr>
                <tr class="about--row">
                    <td>Torrike Whittaker</td>
                    <td>1801536</td>
                </tr>
                <tr class="about--row">
                    <td>Oshane Fraser</td>
                    <td>1902520</td>
                </tr>
            </table>
        </section>

        <section class="contact">
            <h2>Contact Us</h2>
            <form class="contact-form" action="validateContact.php" method="POST">
                <label>Name</label>
                <input type = "text" 
                value="<?php echo (isset($_SESSION['contact_name']))?$_SESSION['contact_name']:'';?>" 
                name="contact_name" placeholder = "John Doe" required/>
            
                <label>Email</label>
                <input type="email"
                value="<?php echo (isset($_SESSION['contact_email']))?$_SESSION['contact_email']:'';?>" 
                name="contact_email" placeholder="example@email.com" required/>
                
                <label>Description</label>
                <textarea name="contact_description" 
                placeholder="Type your message here..." tabindex="5" 
                required><?php echo (isset($_SESSION['contact_description']))?
                $_SESSION['contact_description']:'';?></textarea>

                <button name="submit" type="submit" class="contact-submit" >Submit</button>
            </form>
        </section>
    </main>    
<?php include 'footer.php'; ?>

