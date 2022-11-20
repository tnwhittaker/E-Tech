<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz@8..144&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>E-Tech Solutions</title>
</head>
<body>
    <header class="header">
        <div class="logo">
        <img src="myriad-logo.png" height="40" width="40" alt="logo">
            <ul>
                <li class=""><a href="index.php" class="header--text">E-Tech Solutions</a></li>
            </ul>
        </div>

        <nav>
            <ul class="navbar">
                <li class="navbar--items">
                    <form action="search.php" method="GET">
                        <div class="search-group">
                            <input type="search" class="search-bar" 
                            name="query" value="<?php if(isset($_GET['query'])){echo $_GET['query'];}else{echo '';}?>" >
                            <input type="submit" value="SEARCH" class="login" name="search">
                        </div>
                    </form>
                </li>

                <?php
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }
                    require 'dbconnect.php';

                    if (isset($_SESSION['user-logged-in'])): 
                ?>
                    <li class="navbar--items"><h3 style="color: white;">Welcome 
                    <?php echo $_SESSION['username'];?></h3></li>
                    <?php
                        if(strcmp($_SESSION['user-type'], "vendor") == 0):  
                    ?>
                    <li class="navbar--items"><a href="editUser.php" class="header--text">Edit Profile</a></li>
                    <?php endif;?>
                    <li class=""><a href="logout.php" class="header--text">Log Out</a></li>
                <?php else: ?>
                    <li class="navbar--items"><a href="login.php" class="header--text">Login</a></li>
                    <li class="navbar--items"><a href="userRegistration.php" class="header--text">Sign Up</a></li>
                    <li class="navbar--items"><a href="allProducts.php" class="header--text">View Products</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        
    </header>
    <?php if (isset($_SESSION['user-logged-in'])):?>
                <nav>
                    <ul class="bottom">
                        <li class="navbar--items"><a href="productList.php" class="header--text">Products</a></li>
                        <li class="navbar--items"><a href="orderList.php" class="header--text">Orders</a></li>
                    <?php
                        if(strcmp($_SESSION['user-type'], "vendor") == 0):  
                    ?>
                        <li class="navbar--items"><a href="" class="header--text">Upload Images</a></li>
                    <?php endif;?>
                    <?php
                        if(strcmp($_SESSION['user-type'], "admin") == 0):  
                    ?>
                        <li class="navbar--items"><a href="accountList.php" class="header--text">Accounts</a></li>
                    <?php endif;?>

                    </ul>
                </nav>
            <?php endif; ?>

