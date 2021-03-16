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
    <header class="header">

        <div class="images">
            <img src="assets/images/xpenseLogo.png" class="logo" alt="X-Pense App">
        </div>

        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>

    </header>


    <main>
            <!-- Write your code here -->
            <section class="form-wrapper-2">
                <div class="form-div-2">
                    <p>Login to access your account</p>
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

<?php

require_once 'db/connection.php'; //Establishing connection with our database*/



    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $connection->prepare("SELECT * FROM testusers_table WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            header("location: signin.php?error=wronglogin");
            exit(); 

        } if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['user_ID'];
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
                
               // echo '<p class="alert alert-danger">Email & password combination is wrong!</p>';
            }
     }
    
?>