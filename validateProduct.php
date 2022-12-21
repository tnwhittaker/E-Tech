<?php include 'header.php'; ?>
    <main>
        <form method="POST" >
            <div class="content">
                <h2 class="welcome-header">Submission Status</h2>
                <div class="first-container">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }
                    require 'dbconnect.php';

                    $productname = $_SESSION['productname'];
                    $pname = str_replace(" ","",$productname);

                    $productcode = $_SESSION['productcode'];
                    $pcode = str_replace(" ","",$productcode);

                    $producttype = $_SESSION['producttype'];

                    $productdescription = $_SESSION['productdescription'];

                    $costprice = $_SESSION['costprice'];

                    $salesprice = $_SESSION['salesprice'];

                    $quantity = $_SESSION['quantity'];

                    if(isset($_POST['submit'])){
                        if ($producttype === 'None'){
                            echo "<p style='text-align:center;'>No product type was selected.</p>";
                            header( "refresh:5;url=addProduct.php" );
                        }elseif(!ctype_alnum($pname)){
                            echo "<p style='text-align:center;'>The product name must only letters and numbers</p>";
                            header( "refresh:5;url=addProduct.php" );
                        }elseif(empty($pname)){
                            echo "<p style='text-align:center;'>Enter a product name.</p>";
                            header( "refresh:5;url=addProduct.php" );
                        }elseif(!ctype_alnum($pcode)){
                            echo "<p>The product code must only letters and numbers</p>";
                            header( "refresh:5;url=addProduct.php" );
                        }elseif(empty($pcode)){
                            echo "<p style='text-align:center;'>Enter a product code.</p>";
                            header( "refresh:5;url=addProduct.php" );
                        }elseif(empty($productdescription)){
                            echo "<p style='text-align:center;'>Enter a product description.</p>";
                            header( "refresh:5;url=addProduct.php" );
                        }elseif ($costprice == 0){
                            echo "<p style='text-align:center;'>The cost price has to be greater than zero.</p>";
                            header( "refresh:5;url=addProduct.php" );
        
                        }elseif ($salesprice == 0){
                            echo "<p style='text-align:center;'>The sales price has to be greater than zero.</p>";
                            header( "refresh:5;url=addProduct.php" );

                        }elseif ($quantity == 0){
                            echo "<p style='text-align:center;'>The quantity has to be greater than zero.</p>";
                            header( "refresh:5;url=addProduct.php" );

                        }else{  
                            $name = mysqli_real_escape_string($con, $productname);
                            $code = mysqli_real_escape_string($con, $productcode);
                            $type = mysqli_real_escape_string($con, $producttype);
                            $description = mysqli_real_escape_string($con, $productdescription);
                            $cost = mysqli_real_escape_string($con, $costprice);
                            $sales = mysqli_real_escape_string($con, $salesprice);
                            $quan = mysqli_real_escape_string($con, $quantity);

                            if (strcmp($_SESSION['user-type'], 'vendor') == 0) {
                                $vendorID = $_SESSION['user_id'];
                                $vendorName = $_SESSION['username'];
                            }else{
                                $vendorName = $_SESSION['vendor-name'];
                                $query = "SELECT * FROM users";
                                $result = mysqli_query($con, $query);
                                if (mysqli_num_rows($result) > 0){
                                    foreach($result as $rs){
                                        if(strcmp($vendorName, $rs['first_name']. " " . $rs['last_name']) == 0){
                                            $vendorID = $rs['user_id'];
                                        }
                                    }
                                }
                            }

                            $query = "INSERT INTO products (product_name,product_code,product_type,
                            product_description,cost_price,sales_price,quantity, vendor_id, vendor) 
                            VALUES ('$name','$code','$type','$description','$cost'
                            ,'$sales','$quan', '$vendorID', '$vendorName')";

                            $result = mysqli_query($con, $query);
                            if($result){
                                $_SESSION['message'] = "Product Registered Successfully";
                                
                                unset($_SESSION['productname']);
                                unset($_SESSION['productcode']);
                                unset($_SESSION['producttype']);
                                unset($_SESSION['productdescription']);
                                unset($_SESSION['costprice']);
                                unset($_SESSION['salesprice']);
                                unset($_SESSION['quantity']);
                                unset($_SESSION['vendor-id']);

                                header( "Location: productList.php" );
                                
                            }else{
                                $_SESSION['message'] = "Product Not Registered";
                                header( "Location: productList.php" );
                                
                            }
                        }
                    }

                    if (isset($_POST['edit_submit'])){
                        if ($producttype === 'None'){
                            echo "<p style='text-align:center;'>No product type was selected.</p>";
                            header( "refresh:5;url=editProduct.php" );
                        }elseif(!ctype_alnum($pname)){
                            echo "<p style='text-align:center;'>The product name must only letters and numbers</p>";
                            header( "refresh:5;url=editProduct.php" );
                        }elseif(empty($pname)){
                            echo "<p style='text-align:center;'>Enter a product name.</p>";
                            header( "refresh:5;url=editProduct.php" );
                        }elseif(!ctype_alnum($pcode)){
                            echo "<p>The product code must only letters and numbers</p>";
                            header( "refresh:5;url=editProduct.php" );
                        }elseif(empty($pcode)){
                            echo "<p style='text-align:center;'>Enter a product code.</p>";
                            header( "refresh:5;url=editProduct.php" );
                        }elseif(empty($productdescription)){
                            echo "<p style='text-align:center;'>Enter a product description.</p>";
                            header( "refresh:5;url=editProduct.php" );
                        }elseif ($costprice == 0){
                            echo "<p style='text-align:center;'>The cost price has to be greater than zero.</p>";
                            header( "refresh:5;url=editProduct.php" );
        
                        }elseif ($salesprice == 0){
                            echo "<p style='text-align:center;'>The sales price has to be greater than zero.</p>";
                            header( "refresh:5;url=editProduct.php" );

                        }elseif ($quantity == 0){
                            echo "<p style='text-align:center;'>The quantity has to be greater than zero.</p>";
                            header( "refresh:5;url=editProduct.php" );

                        }else{  
                            $id = mysqli_real_escape_string($con, $_SESSION['product_id']);
                            $name = mysqli_real_escape_string($con, $productname);
                            $code = mysqli_real_escape_string($con, $productcode);
                            $type = mysqli_real_escape_string($con, $producttype);
                            $description = mysqli_real_escape_string($con, $productdescription);
                            $cost = mysqli_real_escape_string($con, $costprice);
                            $sales = mysqli_real_escape_string($con, $salesprice);
                            $quan = mysqli_real_escape_string($con, $quantity);

                            $query = "UPDATE products SET product_name='$name',
                            product_code='$code',product_type='$type',
                            product_description='$description',
                            cost_price='$cost',sales_price='$sales',
                            quantity='$quan' WHERE product_id='$id'";

                            $result = mysqli_query($con, $query);
                            if($result){
                                $_SESSION['message'] = "Product Updated Successfully";
                                unset($_SESSION['productname']);
                                unset($_SESSION['productcode']);
                                unset($_SESSION['producttype']);
                                unset($_SESSION['productdescription']);
                                unset($_SESSION['costprice']);
                                unset($_SESSION['salesprice']);
                                unset($_SESSION['quantity']);
                                header( "Location: productList.php" );
                                
                            }else{
                                $_SESSION['message'] = "Product Not Updated";
                                header( "Location: productList.php" );
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>

