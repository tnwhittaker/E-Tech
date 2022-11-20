<?php
    include 'header.php';
    require 'dbconnect.php';
    if(isset($_GET['id']) || isset($_SESSION['user_id'])){
        if(isset($_GET['id'])){
            $user_id = mysqli_real_escape_string($con, $_GET['id']);
        }else{
            $user_id = mysqli_real_escape_string($con, $_SESSION['user_id']);
        }
        $query = "SELECT * FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $_SESSION['user_id'] = $user_id;
            $user = mysqli_fetch_array($result);
?>
    <main>
        <form method="POST" action="confirmAdminRegisterUser.php">
            <div class="content">
                <h2 class="welcome-header">Welcome, Please Fill Out The <br>Form Below</h2>
                <div class="first-container">
                    <section class="section">
                        <input type="text"  max= "15" name="fname" placeholder="First Name"
                        value="<?=$user['first_name'];?>"
                        class="input" required>
                        <input type="text" max= "15" name="lname" placeholder="Last Name"
                        value="<?=$user['last_name'];?>"
                        class="input" required>
                    </section>
                    <section class="section2">
                        <label for="fname" class="labels">First Name</label>
                        <label for="lname" class="labels">Last Name</label>
                    </section>
                    <section class="section">
                        <input type="email" name="email" placeholder="example@example.com"
                        value="<?=$user['email'];?>"
                        class="input" required>
                        <input type="date" max="2004-12-31" name="dob" placeholder="Date of Birth" 
                        value="<?=$user['dob'];?>" class="input" required>
                    </section>
                    <section class="section2">
                        <label for="email" class="labels">Email</label>
                        <label for="dob" class="labels">Date of Birth</label>
                    </section>                   
                    <div class="btn-login">
                        <input type="submit" name="edit_submit" value="SUBMIT" class="login">
                    </div>
                </div>
            </div>
        </form>
        <?php
                }else{
                    echo "<h4>User Doesn't Exist</h4>";
                }
            }
        ?>
    </main>
<?php include 'footer.php'; ?>
