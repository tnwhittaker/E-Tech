<?php 
    include 'header.php';
    if (isset($_POST['submit'])){
        $_SESSION['firstname'] = trim(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $_SESSION['lastname'] = trim(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $_SESSION['email'] = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $_SESSION['dob'] = trim(filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $_SESSION['password'] = trim($_POST['password']);
        $_SESSION['confirmpassword'] = trim($_POST['cpassword']);

        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $email = $_SESSION['email'];
        $dateofbirth = $_SESSION['dob'];
        $password = $_SESSION['password'];
        $confirmpassword = $_SESSION['confirmpassword'];
    }

    if (isset($_POST['edit_submit'])){
        $_SESSION['firstname'] = trim(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $_SESSION['lastname'] = trim(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $_SESSION['email'] = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $_SESSION['dob'] = trim(filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $email = $_SESSION['email'];
        $dateofbirth = $_SESSION['dob'];
    }
?>
    <main>
        <form method="POST" action="validateAdminRegisterUser.php">
            <div class="content">
                <h2 class="welcome-header">Welcome, Please Fill Out The <br>Form Below</h2>
                <div class="first-container">
                    <section class="section">
                        <input type="text" name="fname" class="input" 
                        value="<?php print_r($firstname);?>" required disabled>
                        <input type="text" name="lname" class="input" 
                        value="<?php print_r($lastname);?>" required disabled>
                    </section>
                    <section class="section2">
                        <label for="fname" class="labels">First Name</label>
                        <label for="lname" class="labels">Last Name</label>
                    </section>
                    <section class="section">
                        <input type="email" name="email" class="input" 
                        value="<?php print_r($email);?>" required disabled>
                        <input type="date" name="dob" class="input" 
                        value="<?php print_r($dateofbirth);?>" required disabled>
                    </section>
                    <section class="section2">
                        <label for="email" class="labels">Email</label>
                        <label for="dob" class="labels">Date of Birth</label>
                    </section>
                    <?php if (isset($_POST['submit'])): ?>
                    <section class="section">
                        <input type="password" name="password" class="input" 
                        value="<?php print_r($password);?>" required disabled>
                        <input type="password" name="cpassword" class="input" 
                        value="<?php print_r($confirmpassword);?>" required disabled>
                    </section>
                    <section class="section2">
                        <label for="password" class="labels">Password</label>
                        <label for="cpassword" class="labels">Confirm Password</label>
                    </section>
                    <?php endif; ?>
                    <div class="btn-login">
                    <?php if (isset($_POST['submit'])): ?>
                        <input type="submit" name="submit" value="SUBMIT" class="login">
                    <?php else: ?>
                        <div class="btn-login">
                            <input type="submit" name="edit_submit" value="CONFIRM" class="login">
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
