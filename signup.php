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
    <main class="container-2">
        <section >
            <!-- Write your code here -->
          
            <h2>Welcome to your first Student Expense App. Register an Account Today</h2>
        
       </section>
            
        <section class="form-wrapper-1">
            <div class="form-div-1">
                <h3>New User? Sign Up Here</h3>
                <form action="signup.php" method="POST" id="create-form"> 
                    <input type="text" placeholder="Username" name="username" required/>
                    <input type="text" placeholder="Firstname" name="firstname" required/>
                    <input type="text" placeholder="Lastname" name="lastname" required/>
                    <input type="email" placeholder="Email" name="email" required/>
                    <input type="password" placeholder="Password" name="userPassword"required/>
                    <input type="password" placeholder="Confirm Password" name="confirm-password" required/>
                    <input type="submit" class="button" value="Sign up" name="signup-button"/>
                </form>

            </div>
        </section>
        
    
    <section class="sidebar">
        <div class="block">
        <img src="assets/images/analyse.jpg"  class="advert-images" alt="analytics"/>
        </div>
        <div class="block">
            <h4>If you have a Registered Account, Kindly Login <a href="signin.php">here</a></h4>
        </div>
        
</section>
            

</div>
        
  
</main> 
    <footer>
        <div class="footer">
            <h5>Copyright (c) 2021. Robert Gordon University SoC IT Module Project by Team J.</h5>

        </div>
    </footer>

    <?php include("connection.php");
 

  function createNewUser(){
      
      //Initializing form inputfields variables
      $userName = trim($_POST['username']);
      $firstName = trim($_POST['firstname']);
      $lastName = trim($_POST['lastname']);
      $email = trim($_POST['email']);
      $userPassword = trim($_POST['userPassword']);
      $confirmPassword = trim($_POST['confirm-password']);
      $passwordHash = password_hash($userPassword, PASSWORD_BCRYPT);
      
     //Checking the DB to see if user already exists
      $slquery = "SELECT * FROM testusers_table WHERE email= '$email' OR username='$userName' LIMIT 1";
      $selectResult = mysqli_query($connection, $slquery);
      $user = mysqli_fetch_assoc($selectResult);
     
    //conditional statement to check if username already exists
     if($user){
         if($user['username'] === $userName){
        echo '<div style="
        width: 220px; 
        height: 50px; 
        background-color: lightpink; 
        margin-left: 10px; 
        border-radius: 4px; 
        text-align: center; 
        opacity: 70%">
            <p style="color: #000">Username already exists!</p> 
        </div>';} //Error message

        //conditional statement to check if user email already exists
        if($user['email'] === $email){
            echo '<div style="
            width: 220px; 
            height: 50px; 
            background-color: lightpink; 
            margin-left: 10px; 
            border-radius: 4px; 
            text-align: center; 
            opacity: 70%">
                <p style="color: #000">Email already exists!</p>
            </div>'; // Error message
        }
     }
     //conditional statement to check if password and confirm passwords are equal
      elseif($userPassword !== $confirmPassword) {
        echo '<div style="
        width: 220px; 
        height: 50px; 
        background-color: lightpink; 
        margin-left: 10px; 
        border-radius: 4px; 
        text-align: center; 
        opacity: 70%">
            <p style="color: #000">Passwords do not match!</p>
        </div>'; //Error message
      }
       else {
           //Attempting to INSERT data into our table
            $sql = "INSERT INTO testusers_table (userName, firstName, lastName, email, password) VALUES ('$userName', '$firstName', '$lastName', '$email', '$userPassword')";
       }
      
     

     //check if inserting data was successful

     if(mysqli_query($connection, $sql)){
         echo '<div style="
         width: 220px; 
         height: 50px; 
         background-color: green; 
         margin-left: 10px; 
         border-radius: 4px; 
         text-align: center; 
         opacity: 70%">
             <p style="color: #FFFFFF;">Signed up successfully!</p>
         </div>';
     } else{
         echo 'Error: '.$sql.mysqli_error($connection);
     }

     //Close connection
     mysqli_close($connection);
     
}
 


    if(isset($_POST['signup-button'])){
        createNewUser();
    }
     
?>

</body>
</html>