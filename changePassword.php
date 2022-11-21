<?php include 'header.php';?>
    <main>
        <form method="POST" action="confirmChangePassword.php">
            <div class="content">
                <h2 class="welcome-header">Change Password</h2>
                <div class="first-container">
                    <?php if(strcmp($_SESSION['user-type'], 'vendor') == 0): ?>
                    <section class="section">
                        <input type="password" min="8" name="old_password" class="input" required>
                    <?php endif; ?>

                        <input type="password" min="8" name="new_password" class="input" required>
                    </section>
                    <section class="section2">
                        <?php if(strcmp($_SESSION['user-type'], 'vendor') == 0): ?>
                        <label for="old_password" class="labels">Old Password</label>
                        <?php endif; ?>

                        <label for="new_cpassword" class="labels">New Password</label>
                    </section>
                    <div class="btn-login">
                        <input type="submit" name="submit" value="SUBMIT" class="login">
                    </div>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
