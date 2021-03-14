
<!-- Author: Bright Osuagwu  -->
<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>X-Pense App</title>
</head>
<body>
    <header class="header">
    <div class="images">
    <img src="assets/images/xpenseLogo.png" class="logo" alt="X-Pense App">
    </div>
    <nav class="navbar">
    <ul class="nav-links">  
    <?php 
    if (isset($_SESSION['user_id'])) {
    echo '<li><a href="index.php">Home</a></li>';
    echo '<li><a href="userProfile/userprofile.php">Profile</a></li>';
    echo '<li><a href="includes/logoutUser.php">Logout</a></li>';
    sleep(2);
    }
    else{
      echo '<li><a href="../index.php">Home</a></li>';
      echo '<li><a href="#">About</a></li>';
      echo '<li><a href="#">Contact Us</a></li>';
      sleep(2);
    }
    
    ?>
    </ul>
    </nav>
    </header>
    <main>
        <div class="container">
            <!-- Write your code here --> 
         
           <h2>Welcome <?php echo $_SESSION['f_name']; ?>, you have successfully logged in.</h2>
        </div>
       
       

            
       
    
    </main>
    <footer>
        <div class="footer">
            <h4>Copyright 2021. Robert Gordon University SoC IT module</h4>

        </div>
    </footer>

    <?php
   
   ?>
   <script src="script.js"></script>
</body>
</html>