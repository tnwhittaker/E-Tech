<?php include 'header.php';?>
    <main>
        <form method="POST" action="registerInformation.php">
            <div class="content">
                <h2 class="welcome-header">Welcome, Please Fill Out The <br>Form Below</h2>
                <div class="first-container">
                    <section class="section">
                        <input type="text"  max= "15" name="fname" placeholder="First Name"
                        value="<?php echo (isset($_SESSION['firstname']))?$_SESSION['firstname']:'';?>"
                        class="input" required>
                        <input type="text" max= "15" name="lname" placeholder="Last Name"
                        value="<?php echo (isset($_SESSION['lastname']))?$_SESSION['lastname']:'';?>"
                        class="input" required>
                    </section>
                    <section class="section2">
                        <label for="fname" class="labels">First Name</label>
                        <label for="lname" class="labels">Last Name</label>
                    </section>
                    <section class="section">
                        <input type="email" name="email" placeholder="example@example.com"
                        value="<?php echo (isset($_SESSION['email']))?$_SESSION['email']:'';?>"
                        class="input" required>
                        <input type="date" max="2004-12-31" name="dob" placeholder="Date of Birth" 
                        value="<?php echo (isset($_SESSION['dob']))?$_SESSION['dob']:'';?>" class="input" required>
                    </section>
                    <section class="section2">
                        <label for="email" class="labels">Email</label>
                        <label for="dob" class="labels">Date of Birth</label>
                    </section>
                    <section class="section">
                        <input type="password" min="8" name="password" class="input"
                        value="<?php echo (isset($_SESSION['password']))?$_SESSION['password']:'';?>" required>
                        <input type="password" min="8" name="cpassword" class="input"
                        value="<?php echo (isset($_SESSION['confirmpassword']))?$_SESSION['confirmpassword']:'';?>"
                        required>
                    </section>
                    <section class="section2">
                        <label for="password" class="labels">Password</label>
                        <label for="cpassword" class="labels">Confirm Password</label>
                    </section>
                    <div class="btn-login">
                        <input type="submit" name="submit" value="SUBMIT" class="login">
                        <a href="LOG.php" class="help-links">Already have an account? Log In</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
