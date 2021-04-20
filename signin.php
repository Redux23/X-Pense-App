<?php
session_start();

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

    <title>X-Pense App</title>
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
    if (isset($_SESSION['user_id'])) {
   echo '<ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard/index.php">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Contact Us</a>
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
      <a class="nav-link" href="dashboard/aboutUs.php">About</a>
      </li>';
      echo '<li class="nav-item">
      <a class="nav-link" href="dashboard/contact.php">Contact Us</a>
      </li>
      </ul>';
      
    }
    ?>
  </div>
</nav>
  <!-- End of header section -->



    <main>
            <!-- Signin in form -->

            <section class="form-wrapper-2">
                <div class="form-div-2">
                    <p>Login to access your account</p>
                    <!-- User validation notification -->
                    <?php 
                     if (isset($_GET["error"])) {
                       if ($_GET["error"] == "wronglogin") {
                         echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Incorrect email or password!.</p>';
                       }
                       else if ($_GET["error"] == "Email&password") {
                         echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Incorrect email or password!.</p>';
                         }
                     }
                     ?>
                        <form action="signin.php" method="POST" id="create-form">
                        <input type="email" placeholder="Email" name="email" required>
                        <input type="password" placeholder="Password"  name="password" required>
                        <button type="submit" style="margin-left: 100px;" class="btn btn-dark" name="login" value="Login">Login</button>
                    </form>
                </div>
            </section>
            <!-- Form ends here -->
    </main>

    <!-- Footer starts here -->
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
<!-- Footer ends here -->
 

    </main>


</body>

</html>

<?php

require_once 'db/connection.php'; //Establishing connection with our database*/



    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $connection->prepare("SELECT * FROM user WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            header("location: signin.php?error=wronglogin");
            exit(); 

        } 
            if (password_verify($password, $result['password'])) {

                $_SESSION['user_id'] = $result['userid'];
                $_SESSION['userName'] = $result['username'];
                $_SESSION['f_name'] = $result['firstname'];
                $_SESSION['l_name'] = $result['lastname'];
                $_SESSION['u_email'] = $result['email'];
                
                //echo '<p class="alert alert-success">Congratulations, you are logged in!</p>';
                sleep(1);
                header("location: userProfile/welcome.php");
                exit(); 
            } else {
                header("location: signin.php?error=wronglogin");
                exit(); 
            }
        }
    
?>