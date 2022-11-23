<?php include 'header.php'; ?>
    <div class="container mt-4">
        <?php
            include 'message.php';
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
                        <h4>Order List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Type</th>
                                    <th>Sales Price</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if (strcmp($_SESSION['user-type'], 'vendor') == 0){
                                        $vendor_id = $_SESSION['user_id'];
                                        $query = "SELECT * FROM orders 
                                        INNER JOIN products ON orders.product_id = products.product_id
                                        WHERE products.vendor_id = '$vendor_id'
                                        LIMIT $start_from, $num_per_page";
                                    }else{
                                        $query = "SELECT * FROM orders LIMIT $start_from, $num_per_page";
                                    }
                                    $orders = mysqli_query($con, $query);

                                    if(mysqli_num_rows($orders) > 0){
                                        foreach($orders as $order){
                                            $product_id = $order['product_id'];
                                            $product_info = "SELECT * FROM products WHERE product_id = '$product_id'";
                                            $product = mysqli_query($con, $product_info);
                                            if(mysqli_num_rows($product) > 0){
                                                foreach($product as $prod){
                                                    $productName = $prod['product_name'];
                                                    $productCode = $prod['product_code'];
                                                    $productType = $prod['product_type'];
                                                    $salesPrice = $prod['sales_price'];
                                                }
                                            }
                                ?>
                                <tr>
                                    <td><?= $productName; ?></td>
                                    <td><?= $productCode; ?></td>
                                    <td><?= $productType; ?></td>
                                    <td><?= $salesPrice; ?></td>
                                    <td><?= $order['customer_name']; ?></td>
                                    <td><?= $order['amount']; ?></td>
                                    <td><?= $order['total']; ?></td>
                                </tr>
                                <?php
                                        }
                                    }else{
                                        echo "<h5> No Orders Found </h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if (strcmp($_SESSION['user-type'], 'vendor') == 0){
                $vendor_id = $_SESSION['user_id'];
                $query = "SELECT * FROM orders 
                INNER JOIN products ON orders.product_id = products.product_id
                WHERE products.vendor_id = '$vendor_id'";
            }else{
                $query = "SELECT * FROM orders";
            }
            $orders = mysqli_query($con, $query);
            
            $total_records = mysqli_num_rows($orders);
            $total_pages = ceil($total_records/$num_per_page);

            echo "<div class='pagination'>";
            for($i = 1; $i <= $total_pages; $i++){
                echo "<a href='orderList.php?page=" . $i . "'>" . $i . "</a>";
            }
            echo "</div>";
        ?>
    </div>
<?php include 'footer.php'; ?>
