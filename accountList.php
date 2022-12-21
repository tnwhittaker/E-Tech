<?php include 'header.php'; ?>
    <div class="container mt-4">
        <?php include 'message.php'; ?>
        <?php
            $num_per_page = 5;

            if (isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $start_from = ($page-1) * 5;
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Account List
                            <a href="adminRegisterUser.php" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>User's Name</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users WHERE type='vendor' LIMIT $start_from, $num_per_page";
                                    $users = mysqli_query($con, $query);

                                    if(mysqli_num_rows($users) > 0){
                                        foreach($users as $user){
                                            
                                ?>
                                <tr>
                                    <td><?= $user['first_name']; ?> <?= $user['last_name']; ?></td>
                                    <td><?= $user['dob']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['type']; ?></td>
                                    <td>  
                                        <a href="editUser.php?id=<?= $user['user_id']; ?>"
                                        class="btn btn-success btn-sm">Edit User</a>
                                        
                                        <form action="deleteUser.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete"
                                            value="<?= $user['user_id'];?>" 
                                            class="btn btn-danger btn-sm">Delete User</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                            }
                                                }else{
                                                    echo "<h5> No Users Found </h5>";
                                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $query = "SELECT * FROM users WHERE type='vendor'";
            $users = mysqli_query($con, $query);
            $total_records = mysqli_num_rows($users);
            $total_pages = ceil($total_records/$num_per_page);

            echo "<div class='pagination'>";
            for($i = 1; $i <= $total_pages; $i++){
                echo "<a href='accountList.php?page=" . $i . "'>" . $i . "</a>";
            }
            echo "</div>";
        ?>
    </div>
<?php include 'footer.php'; ?>

