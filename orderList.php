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
                                    $query = "SELECT * FROM orders LIMIT $start_from, $num_per_page";
                                    $orders = mysqli_query($con, $query);
                                    $count = 0;

                                    if(mysqli_num_rows($orders) > 0){
                                        foreach($orders as $order){ 
                                            $id = $order['product_id'];
                                            $user_id = $order['order_id'];
                                            $product_query = "SELECT * FROM products 
                                            WHERE product_id='$id' LIMIT $start_from, $num_per_page";

                                            $product_info = mysqli_query($con, $product_query);

                                            $rows = [];
                                            while($row = mysqli_fetch_array($product_info)){
                                                $rows[] = $row;
                                            }
                                            
                                            if ($rows[0]['vendor_id'] != $_SESSION['user_id']){
                                                continue;
                                            }

                                            $count+= 1;

                                ?>
                                <tr>
                                    <td><?= $rows[0]['product_name']; ?></td>
                                    <td><?= $rows[0]['product_code']; ?></td>
                                    <td><?= $rows[0]['product_type']; ?></td>
                                    <td><?= $rows[0]['sales_price']; ?></td>
                                    <td><?= $order['customer_name']; ?></td>
                                    <td><?= $order['amount']; ?></td>
                                    <td><?= $order['total']; ?></td>
                                </tr>
                                <?php
                                            
                                        }
                                    }else{
                                        echo "<h5> No Orders Found </h5>";
                                    }

                                    if ($count == 0){
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
            $product_query = "SELECT * FROM orders";
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
