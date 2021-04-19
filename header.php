<?php
session_start();

?>
<!-- This page links users to:
* Sign-up page.
* Sign-in page.  -->
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Required meta tags -->
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xpense App | <?php echo $title; ?></title>
  <!-- Linking the gobal stylesheet -->
  <link rel="stylesheet" href="assets/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
 
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- fontAwesome -->
  <script src="https://kit.fontawesome.com/dc99ff6631.js" crossorigin="anonymous"></script>

  <link href="assets/css/mdb.min.css" rel="stylesheet">
 <link href="material/css/ripples.min.css" rel="stylesheet">
</head>

<body>
  <!-- Header section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><span>
    <img src="assets/images/xpenseLogo.png" class="logo" alt="X-Pense App">
  </span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarText">

  <?php 
    if (isset($_SESSION['userid'])) {
   echo '<ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="includes/logoutUser.php">Logout</a>
      </li>
    </ul>';
    }else{
      
    
      echo '<ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>';
      echo '<li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
      </li>';
      echo '<li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
      </li>
      </ul>';
    }
    ?>
  </div>
</nav>
  <!-- End of header section -->




