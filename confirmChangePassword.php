<?php include 'header.php'; ?>
    <main>
        <form action="">
            <div class="content">
                <h2 class="welcome-header">Submission Status</h2>
                <div class="first-container">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }

                    if(isset($_POST['submit'])){
                        $newPassword = trim($_POST['new_password']);
                        if(strcmp($_SESSION['user-type'], 'vendor') == 0){
                            $oldPassword = trim($_POST['old_password']);
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT * FROM users WHERE user_id='$user_id'";
                            $user = mysqli_query($con, $query);

                            if(mysqli_num_rows($user) > 0){
                                foreach($user as $us){
                                    $user
                                }
                            }else{
                                echo "<p style='text-align: center;'>User does not exist.</p>";
                                header( "refresh:5;url=changePassword.php" );
                            }

                            if (!password_verify($oldPassword, ))
                        }
                        if(!preg_match($email_pattern, $email)){
                            echo "<p style='text-align: center;'>Invalid Email format entered.</p>";
        
                            header( "refresh:5;url=login.php" );
                        }else{
                            $query = "SELECT * FROM users WHERE email = '$email'";
                            $users = mysqli_query($con, $query);
                            if(mysqli_num_rows($users) > 0){
                                foreach ($users as $user){
                                        $hashed_password = $user['password']; 
                                        if(strcmp($user['email'], $email) == 0 &&
                                        password_verify($password, $hashed_password)){
                                            $_SESSION['user-logged-in'] = true;
                                            $_SESSION['username'] = $user['first_name'] . " " . $user['last_name'];
                                            $_SESSION['user-type'] = $user['type'];
                                            $_SESSION['user_id'] = $user['user_id'];
                                            echo "<p style='text-align: center;'>Your login was successful.
                                            You will now be redirected to the main page.</p>";
                    
                                            header( "refresh:5;url=index.php" );
                                        }
                                }
                            }else{
                                echo "<p style='text-align: center;'>Invalid email or password entered.</p>";
        
                                header( "refresh:5;url=login.php" );
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
