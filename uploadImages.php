<?php 
    include 'header.php'; 
    require 'dbconnect.php';
    include 'message.php';

    if (isset($_POST['next'])){
        $productName = $_POST['vendorproduct'];

        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM products WHERE vendor_id = '$user_id'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            foreach($result as $rs){
                if (strcmp($rs['product_name'], $productName) == 0){
                    $_SESSION['productID'] = $rs['product_id'];
                    break;
                }
            }
        }
    }
    
    if (isset($_POST['upload'])){
        $imageCount = count($_FILES['image']['name']);
        $productID = $_SESSION['productID'];
        for ($i = 0; $i < $imageCount; $i++){
            $imageName = $_FILES['image']['name'][$i];
            $imageTempName = $_FILES['image']['tmp_name'][$i];
            $targetPath = "./upload/" . $imageName;

            if (move_uploaded_file($imageTempName, $targetPath)){
                $query = "INSERT INTO images(product_id, image_name) VALUES('$productID', '$imageName')";
                $result = mysqli_query($con, $query);
            }
        }

        if ($result){
            $_SESSION['message'] = "Successfully uploaded.";
        }else{
            $_SESSION['message'] = "Unsuccessfully uploaded. Try again later.";
        }
        header( "Location:uploadImages.php" );
    }
?>
    <main>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="content">
                <h2 class="welcome-header">Image Upload</h2>
                <div class="first-container">
                    <section class="section">
                    <?php if (!isset($_POST['next'])): ?>
                        <select name="vendorproduct" class="input" required> 
                            <option value="" disabled selected>Select a Product</option>
                            <?php
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT * FROM products WHERE vendor_id = '$user_id'";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $rs){
                            ?>
                                <option value="<?php echo $rs['product_name']; ?>">
                                <?php echo $rs['product_name']; ?></option>
                            <?php
                                }
                             } 
                             ?>
                        </select>
                        <?php else: ?>
                            <label for="image[]">Photos for <?= $productName?></label>
                            <input type="file" name="image[]" multiple> <br />
                        <?php endif; ?>
                    </section>
                <div class="btn-login margin">
                    <?php if (!isset($_POST['next'])): ?>
                    <input type="submit" name="next" value="NEXT" class="login">
                    <?php else: ?>
                    <input type="submit" name="upload" value="UPLOAD" class="login">
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
