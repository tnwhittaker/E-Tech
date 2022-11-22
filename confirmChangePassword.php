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
                                    $storedPassword = $us['password'];
                                }
                            }else{
                                echo "<p style='text-align: center;'>User does not exist.</p>";
                                header( "refresh:5;url=changePassword.php" );
                            }

                            if (!password_verify($oldPassword, $storedPassword)){
                                echo "<p style='text-align: center;'>Invalid old password entered.</p>";
                                header( "refresh:5;url=changePassword.php" );
                            }elseif(password_verify($newPassword, $storedPassword)){
                                echo "<p style='text-align: center;'>Both passwords are the same.</p>";
                                header( "refresh:5;url=changePassword.php" );
                            }else{
                                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                                $query = "UPDATE users SET password='$hashedPassword' WHERE user_id='$user_id'";
                                $result = mysqli_query($con, $query);

                                if($result){
                                    echo "<p style='text-align: center;'>The password has 
                                    been successfully updated.</p>";
                                    header( "refresh:5;url=changePassword.php" );
                                }else{
                                    echo "<p style='text-align: center;'>The password 
                                    was not successfully updated.</p>";
                                    header( "refresh:5;url=changePassword.php" );
                                }
                            }
                        }else{
                            $userName = $_SESSION['update_user'];
                            $query = "SELECT * FROM users WHERE type = 'vendor'";
                            $result = mysqli_query($con, $query);

                            if(mysqli_num_rows($result) > 0){
                                foreach($result as $rs){
                                    if(strcmp($rs['first_name'] . " " . $rs['last_name'], $userName) == 0){
                                        $user_id = $rs['user_id'];
                                        $storedPassword = $rs['password'];
                                        break;
                                    }
                                }
                            }

                            if(password_verify($newPassword, $storedPassword)){
                                echo "<p style='text-align: center;'>Both passwords are the same.</p>";
                                header( "refresh:5;url=changePassword.php" );
                            }else{
                                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                                $query = "UPDATE users SET password='$hashedPassword' WHERE user_id='$user_id'";
                                $result = mysqli_query($con, $query);

                                if($result){
                                    echo "<p style='text-align: center;'>The password 
                                    has been successfully updated.</p>";
                                    header( "refresh:5;url=changePassword.php" );
                                }else{
                                    echo "<p style='text-align: center;'>The password 
                                    was not successfully updated.</p>";
                                    header( "refresh:5;url=changePassword.php" );
                                }
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
