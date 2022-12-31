<?php include 'header.php'; ?>
    <div class="container mt-4">
        <?php include 'message.php'; ?>
        <?php
            if (isset($_GET['product_clear'])){
                $_GET['product_query'] = '';
                header( "Location: productList.php" );
            }
            $num_per_page = 5;

            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $start_from = ($page-1)*5;
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product List
                            <a href="addProduct.php" class="btn btn-primary float-end">Add a Product</a>
                        </h4>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="product_searchbar">
                            <input type="text" name="product_query" value="<?php if(isset($_GET['product_query']))
                            {echo $_GET['product_query'];}else{echo '';}?>" class="search_item search_field">
                            <input type="submit" value="Search" name="product_search" class="search_item btn_search">
                            <input type="submit" value="Clear" name="product_clear" class="search_item btn_clear">
                        </div>
                    </form>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Type</th>
                                    <th>Sales Price</th>
                                    <th>Quantity</th>
                                    <?php if (strcmp($_SESSION['user-type'], "admin") == 0): ?>
                                    <th>Vendor</th>
                                    <?php endif; ?>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 0;
                                    if (isset($_GET['product_search'])){
                                        $search = $_GET['product_query'];
                                        if (strcmp($_SESSION['user-type'], "vendor") == 0){
                                            $userID = $_SESSION['user_id'];
                                            $query = "SELECT * FROM products WHERE
                                            CONCAT(product_name,product_code,product_type,
                                            product_description,cost_price,sales_price,quantity,vendor_id, vendor)
                                            LIKE'%$search%' AND vendor_id='$userID' LIMIT $start_from, $num_per_page";
                                        }else{
                                            $query = "SELECT * FROM products WHERE
                                            CONCAT(product_name,product_code,product_type,
                                            product_description,cost_price,sales_price,quantity,vendor_id, vendor)
                                            LIKE'%$search%' LIMIT $start_from, $num_per_page";
                                        }
                                        $result = mysqli_query($con, $query);
                                    }else{
                                        $userID = $_SESSION['user_id'];
                                        if (strcmp($_SESSION['user-type'], "vendor") == 0){
                                            $query = "SELECT * FROM products WHERE 
                                            vendor_id='$userID' LIMIT $start_from, $num_per_page";
                                        }else{
                                            $query = "SELECT * FROM products LIMIT $start_from, $num_per_page";
                                        }
                                        $result = mysqli_query($con, $query);
                                    }

                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $product){   
                                            $count += 1;
                                ?>
                                <tr>
                                    <td><?= $product['product_name']; ?></td>
                                    <td><?= $product['product_code']; ?></td>
                                    <td><?= $product['product_type']; ?></td>
                                    <td><?= $product['sales_price']; ?></td>
                                    <td><?= $product['quantity']; ?></td>
                                    <?php if (strcmp($_SESSION['user-type'], "admin") == 0): ?>
                                    <td><?= $product['vendor']; ?></td>
                                    <?php endif; ?>
                                    <td >
                                        <a href="editProduct.php?id=<?= $product['product_id']; ?>"
                                        class="btn btn-success btn-sm">Edit Product</a>
                                        
                                        <form action="deleteProduct.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete" value="<?= $product['product_id'];?>" 
                                            class="btn btn-danger btn-sm">Delete Product</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                            }
                                                }else{
                                                    echo "<h5> No Products Found </h5>";
                                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if (isset($_GET['product_search'])){
                $search = $_GET['product_query'];
                if (strcmp($_SESSION['user-type'], "vendor") == 0){
                    $userID = $_SESSION['user_id'];
                    $query = "SELECT * FROM products WHERE
                    CONCAT(product_name,product_code,product_type,
                    product_description,cost_price,sales_price,quantity,vendor_id, vendor)
                    LIKE'%$search%' AND vendor_id='$userID' LIMIT $start_from, $num_per_page";
                }else{
                    $query = "SELECT * FROM products WHERE
                    CONCAT(product_name,product_code,product_type,
                    product_description,cost_price,sales_price,quantity,vendor_id, vendor)
                    LIKE'%$search%' LIMIT $start_from, $num_per_page";
                }
                $result = mysqli_query($con, $query);
                $total_records = mysqli_num_rows($result);
                $total_pages = ceil($total_records/$num_per_page);

                echo "<div class='pagination'>";
                for($i = 1; $i <= $total_pages; $i++){
                    echo "<a href='productList.php?product_query=" . $search .
                    "&product_search=SEARCH&page=" . $i . "'>" . $i . "</a>";
                }
                echo "</div>";
            }else{
                $userID = $_SESSION['user_id'];
                if (strcmp($_SESSION['user-type'], "vendor") == 0){
                    $query = "SELECT * FROM products WHERE 
                    vendor_id='$userID'";
                }else{
                    $query = "SELECT * FROM products";
                }
                $result = mysqli_query($con, $query);
                $total_records = mysqli_num_rows($result);
                $total_pages = ceil($total_records/$num_per_page);

                echo "<div class='pagination'>";
                for($i = 1; $i <= $total_pages; $i++){
                    echo "<a href='productList.php?page=" . $i . "'>" . $i . "</a>";
                }
                echo "</div>";
            }
        ?>
    </div>
<?php include 'footer.php'; ?>
