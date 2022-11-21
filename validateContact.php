<?php include 'header.php'; ?>
    <main>
        <form method="POST" >
            <div class="content">
                <h2 class="welcome-header">Submission Status</h2>
                <div class="first-container">
                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }

                    if(isset($_POST['submit'])){
                        $name = trim(filter_input(INPUT_POST, 'contact_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                        $name_pattern = "/^[a-zA-Z_ ]{4,45}$/";

                        $email = strtolower(trim(filter_input(INPUT_POST, 'contact_email', FILTER_SANITIZE_EMAIL)));
                        $email_pattern = "/^([a-z0-9\._\+\-]{3,30})@([a-z0-9\-]{2,30})((\.([a-z]{2,20})){1,3})$/";

                        $description = trim(filter_input(INPUT_POST, 'contact_description',
                        FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                        
                        $_SESSION['contact_name'] = $name;
                        $_SESSION['contact_email'] = $email;
                        $_SESSION['contact_description'] = $description;

                        if(!preg_match($name_pattern, $name)){
                            echo "<p style='text-align: center;'>Invalid Name entered.</p>";
        
                            header( "refresh:5;url=index.php" );
                        }elseif(!preg_match($email_pattern, $email)){
                            echo "<p style='text-align: center;'>Invalid Email Address entered.</p>";
        
                            header( "refresh:5;url=index.php" );
                        }else{
                            echo "<p style='text-align: center;'>We will contact you as soon as possible!</p>";

                            unset($_SESSION['contact_name']);
                            unset($_SESSION['contact_email']);
                            unset($_SESSION['contact_description']);

                            header( "refresh:5;url=index.php" );
                        }
                    }
                ?>
                </div>
            </div>
        </form>
    </main>
<?php include 'footer.php'; ?>

