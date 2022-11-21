<?php 
    include 'header.php'; 
    require 'dbconnect.php';
?>
    <main>
        <form method="POST" action="changePassword.php">
            <div class="content">
                <h2 class="welcome-header">Select User</h2>
                <div class="first-container">
                    <section class="section">
                        <select name="vendoruser" class="input" required> 
                            <option value="" disabled selected>Select a Product</option>
                            <?php
                            $query = "SELECT * FROM users WHERE type = 'vendor'";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $rs){
                            ?>
                                <option value="<?php echo $rs['first_name'] . " " . $rs['last_name']; ?>">
                                <?php echo $rs['first_name'] . " " . $rs['last_name']; ?></option>
                            <?php
                                }
                             } 
                             ?>
                        </select>
                    </section>
                <div class="btn-login margin">
                    <input type="submit" name="next" value="NEXT" class="login">
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
