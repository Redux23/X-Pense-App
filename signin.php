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


    <main class="container">
    <section>
                <h2>kindly Login to access your account</h2>
              <!--Form-->
              <form>
                <form action="signin.php" methods="post" id="create-form">
                    <input type="email" placeholder="Email" name="email">
                    <br> 
                    <input type="password" placeholder="Password"  name="password">
                    <br>
                    <input type="submit" value="Login">
     </form>
     <!--Images here-->
 </section>
 <section class="section-2">
 <aside class="side-bar">
 <div class="aside-one">
 <h1>Login today to track your expenses and save more!!</h1>
 <img src="assets/images/coins.jpg" width="100px" height="100px" alt="coins">
  </div>
 <div class="aside-two">
 <h1>Start monitoring your spending and planing for the future </h1>
 <img src="assets/images/journey.jpg" width="100px" height="100px" alt="journey">
 </div>
 </aside>
 </section>


   <!--footer-->
    </main>
    <footer>
        <div class="footer">
 <h2>Copyright 2021. Robert Gordon University SoC IT Module Project by Team J  </h2>

        </div>
    </footer>

    <?php
   
  
   ?>
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
            echo '<p class="alert alert-danger">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['user_ID'];
                $_SESSION['f_name'] = $result['firstname'];
                $_SESSION['l_name'] = $result['lastname'];
                $_SESSION['u_email'] = $result['email'];
                header('location: welcome.php');
                echo '<p class="alert alert-success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="alert alert-danger">Username password combination is wrong!</p>';
            }
        }
    }
?>

