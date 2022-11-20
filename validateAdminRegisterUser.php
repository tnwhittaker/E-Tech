<?php include 'header.php';?>
    <main>
        <form action="">
            <div class="content">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }

                    if(isset($_POST['submit'])){
                        $first_name = $_SESSION['firstname'];
                        $last_name = $_SESSION['lastname'];
                        $name_pattern = "/^[a-zA-Z]{2,15}$/";

                        $dob = $_SESSION['dob'];

                        $email = strtolower($_SESSION['email']);
                        $email_pattern = "/^([a-z0-9\._\+\-]{3,30})@([a-z0-9\-]{2,30})((\.([a-z]{2,20})){1,3})$/";

                        $password = $_SESSION['password'];
                        $password_confirm = $_SESSION['confirmpassword'];

                        $isUser = false;

                        $query = "SELECT * FROM users WHERE email = '$email'";
                        $users = mysqli_query($con, $query);
                        if(mysqli_num_rows($users) > 0){
                            $isUser = true;
                        }

                        if(!preg_match($name_pattern, $first_name)){
                            echo "<h2 class='welcome-header'>Error</h2>";
                            echo "<div class='first-container'>";
                            echo "<p style='text-align: center;'>Invalid First Name entered.</p>";
        
                            header( "refresh:5;url=adminRegisterUser.php" );
                        }elseif(!preg_match($name_pattern, $last_name)){
                            echo "<h2 class='welcome-header'>Error</h2>";
                            echo "<div class='first-container'>";
                            echo "<p style='text-align: center;'>Invalid Last Name entered.</p>";
        
                            header( "refresh:5;url=adminRegisterUser.php" );
                        }elseif(!preg_match($email_pattern, $email)){
                            echo "<h2 class='welcome-header'>Error</h2>";
                            echo "<div class='first-container'>";
                            echo "<p style='text-align: center;'>Invalid Email Address entered.</p>";
        
                            header( "refresh:5;url=adminRegisterUser.php" );
                        }elseif($isUser){
                            echo "<h2 class='welcome-header'>Error</h2>";
                            echo "<div class='first-container'>";
                            echo "<p style='text-align: center;'>This user already has an account.</p>";
                            unset($_SESSION['firstname']);
                            unset($_SESSION['lastname']);
                            unset($_SESSION['email']);
                            unset($_SESSION['dob']);
                            unset($_SESSION['password']);
                            unset($_SESSION['confirmpassword']);
        
                            header( "refresh:5;url=accountList.php" );
                        }
                        
                        elseif ($password !== $password_confirm){
                            echo "<h2 class='welcome-header'>Error</h2>";
                            echo "<div class='first-container'>";
                            echo "<p style='text-align: center;'>Passwords do not match.</p>";
        
                            header( "refresh:5;url=adminRegisterUser.php" );
                        }else{
                            ?>
                            <h2 class="welcome-header">Success</h2>
                            <div class="first-container">
                            <?php
                            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                            $insert_query = "INSERT INTO users(first_name, last_name, dob, email, password, type) 
                            VALUES('$first_name','$last_name','$dob','$email','$hashpassword', 'vendor')";

                            $result = mysqli_query($con, $insert_query);

                            if ($result){
                                $_SESSION['message'] = "User Registered Successfully";
                                unset($_SESSION['firstname']);
                                unset($_SESSION['lastname']);
                                unset($_SESSION['email']);
                                unset($_SESSION['dob']);
                                unset($_SESSION['password']);
                                unset($_SESSION['confirmpassword']);
    
                                header( "refresh:5;url=accountList.php" );
                            }else{
                                $_SESSION['message'] = "User Not Registered";
                                unset($_SESSION['firstname']);
                                unset($_SESSION['lastname']);
                                unset($_SESSION['email']);
                                unset($_SESSION['dob']);
                                unset($_SESSION['password']);
                                unset($_SESSION['confirmpassword']);
    
                                header( "refresh:5;url=accountList.php" );
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>
