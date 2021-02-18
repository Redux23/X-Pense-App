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
    <?php 
    require_once 'createUser.php';
    ?>

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
                <form action="createUser.php" method="POST" id="create-form"> 
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
        
    
    <aside>
        <section>
        <div>
        <img src="assets/images/analytics.jpg"  class="advert-images" alt="analytics">
        </div>
        </section>
        
        <section>
        <div class="text">
        <h4>If you have a Registered Account, Kindly Login <a href="signin.php">here</a></h4>
        
        </div>
        
        </section>
    
    </aside>
            

</div>
        
  
</main> 
    <footer>
        <div class="footer">
            <h5>Copyright (c) 2021. Robert Gordon University SoC IT Module Project by Team J.</h5>

        </div>
    </footer>

</body>
</html>