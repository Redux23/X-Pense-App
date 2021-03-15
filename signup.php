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
    <!--header here-->
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
    }
    else{
      echo '<li><a href="index.php">Home</a></li>';
      echo '<li><a href="#">About</a></li>';
      echo '<li><a href="#">Contact Us</a></li>';
    }

    ?>
    </nav>
    </header>
    <main class="container-2">
        <section >
            <!-- Write your code here -->
            <h2>Welcome to your first Student Expense App. Register an Account Today</h2>
        
       </section>
            <!-- Form here-->
        <section class="form-wrapper-1">
            <div class="form-div-1">
                <p>New User? Sign Up Here</p>
                <form action="signup.php" method="POST" id="create-form"> 
                    <input type="text" placeholder="Username" name="username" required/>
                    <input type="text" placeholder="Firstname" name="firstname" required/>
                    <input type="text" placeholder="Lastname" name="lastname" required/>
                    <input type="email" placeholder="Email" name="email" required/>
                    <input type="password" placeholder="Password" name="userPassword"required/>
                    <input type="password" placeholder="Confirm Password" name="confirm-password" required/>
                    <button type="submit" class="button" name="signup-button">Sign Up</button>
                </form>

            </div>
        </section>   
    <!--Images here-->
    <section class="sidebar">
        <div class="block">
        <img src="assets/images/analyse.jpg"  class="advert-images" alt="analytics"/>
        </div>
        <div class="block">
            <h5>If you have a Registered Account, Kindly Login <a href="signin.php">here</a></h5>
        </div>
        
</section>
            

</div>    
  <!-- footer-->
</main> 
    <footer>
        <div class="footer">
    <h2>Copyright (c) 2021. Robert Gordon University SoC IT Module Project by Team J.</h> 
          
        </div>
    </footer>

    <?php
 

      
      //Initializing form inputfields variables
      require_once 'db/connection.php';
      
   

      if (isset($_POST['signup-button'])) {
        $userName = trim($_POST['username']);
        $firstName = trim($_POST['firstname']);
        $lastName = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $userPassword = trim($_POST['userPassword']);
        $confirmPassword = trim($_POST['confirm-password']);
        $passwordHash = password_hash($userPassword, PASSWORD_DEFAULT);

          $query = $connection->prepare("SELECT * FROM testusers_table WHERE email=:email");
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->execute();
          if ($query->rowCount() > 0) {
              echo '<p class="alert alert-danger">The email address is already registered!</p>';
          }
         
          if($userPassword !== $confirmPassword){
            echo '<p class="alert alert-danger">Passwords do not match!.</p>';

          }
          else if(strlen($userPassword) < 6){
            echo '<p class="alert alert-danger">Password must have atleast 6 characters.</p>';
 
          }

           else if ($query->rowCount() == 0) {
              $query = $connection->prepare("INSERT INTO testusers_table(username,firstname,lastname,email,password) VALUES (:username,:firstname,:lastname,:email,:passwordHash)");
              $query->bindParam("username", $userName, PDO::PARAM_STR);
              $query->bindParam("firstname", $firstName, PDO::PARAM_STR);
              $query->bindParam("lastname", $lastName, PDO::PARAM_STR);
              $query->bindParam("email", $email, PDO::PARAM_STR);
              $query->bindParam("passwordHash", $passwordHash, PDO::PARAM_STR);
              $result = $query->execute();
              if ($result) {
                  echo '<p class="alert alert-success">Your registration was successful!</p>';
              } else {
                  echo '<p class="alert alert-danger">Something went wrong!</p>';
              }
          }
      }
?>



 <!-- Option 2: Separate Popper and Bootstrap JS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


</body>
</html>