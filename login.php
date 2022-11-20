<?php include 'header.php'; ?>
    <main>
        <form method="POST" action="validateLogin.php" >
            <div class="content">
                <h2 class="welcome-header">Welcome, Login Here</h2>
                <div class="first-container">
                    <input type="email" name="email" class="input" placeholder="example@example.com" required>
                    <label for="email" class="labels">Email Address</label>
            
                    <input type="password" name="password" class="input" required>
                    <label for="password" class="labels">Password</label>
                    <div class="container">
                        <div>
                            <input type="submit" name="submit" value="Login" class="login">
                            <a href="registerInfo.php" class="help-links">New here? Sign Up</a>
                        </div>
                        <div>
                            <a href="#" class="help-links">Forgot my password</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
