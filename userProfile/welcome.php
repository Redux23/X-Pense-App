
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

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" >

    <!-- Animate css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
    echo '<li><a href="../index.php">Home</a></li>';
    echo '<li><a href="userprofile.php">Profile</a></li>';
    echo '<li><a href="../includes/logoutUser.php">Logout</a></li>';
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
           <h2 style="margin-top: 50px; margin-left: 70px; text-align: center;" class="alert alert-success animate__animated animate__zoomInUp">Welcome <?php echo $_SESSION['f_name']; ?>, you have successfully logged in. Click on profile to view your page.</h2>

        </div>
     
    </main>

  


    <footer class="text-center text-white fixed-bottom" style="background-color: #21081a; margin-top: 200px;">

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);
opacity: 70%">
<a class="text-white" href="privacy.html"><h6> Privacy Policy</h6>
          <h6> Call us: +44470000000 </h6></a>
  © 2020 Copyright: 
  <a class="text-white" href="#">X-pense Tracker 2021 Inc. All Right Reserved.</a>
</div>
Copyright
</footer>
</body>
</html>