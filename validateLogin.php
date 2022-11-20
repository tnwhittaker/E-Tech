<?php include 'header.php'; ?>
    <main>
        <form action="">
            <div class="content">
                <h2 class="welcome-header">Login Status</h2>
                <div class="first-container">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }

                    if(isset($_POST['submit'])){
                        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
                        $email_pattern = "/^([a-z0-9\._\+\-]{3,30})@([a-z0-9\-]{2,30})((\.([a-z]{2,20})){1,3})$/";

                        $password = trim($_POST['password']);
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
