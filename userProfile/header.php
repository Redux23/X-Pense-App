<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" >
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
    <script type="text/javascript" src="jquery-3.3.1.js"></script>

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
    echo '<li><a href="../includes/logoutUser.php">Logout</a></li>';
    }
    else{
      echo '<li><a href="../index.php">Home</a></li>';
      echo '<li><a href="#">About</a></li>';
      echo '<li><a href="#">Contact Us</a></li>';
    }
    
    ?>
                </ul>
            </nav>
    </header>