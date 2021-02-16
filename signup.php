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
    <li><a href="layout.php">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact Us</a></li>
    </ul>
    </nav>
    </header>
    <main>
        <div class="container">
            <!-- Write your code here -->
            <div id="mainheader">
                
            </div>
            <h2>Welcome to your first Student Expense App. Register an Account Today</h2>
        
        </div>
            
        <div class="formheader">
            <h3>New User? Sign Up Here</h3>
            <form action="" method=""> 
                <input type="text" placeholder="Username" name="uname"><br><br>
                <input type="text" placeholder="Firstname" name="fname"><br><br>
                <input type="text" placeholder="Lastname" name="lname"><br><br>
                <input type="email" placeholder="Email" name="email"><br><br>
                <input type="password" placeholder="Password" name="password"><br><br>
                <input type="password" placeholder="Confirm Password" name="Confirm-password"><br><br>
                <input type="submit" value="Sign Up">
                
            </form>
        </div>
        
            
            
        <?php
        /*
        $username=$_GET["username"];
        echo '<br />';
        echo $username;
        */
        ?>
        
        
        
    
    <aside>
        <section>
        <div>
        <img src= "assets/images/analytics.jpg"  class="advert-images" alt="änalytics">
        </div>
        </section>
        
        <section>
        <div class="text">
        <h4>If you have a Registered Account, Kindly Login here</h4>
        
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

    <?php
   
   ?>
</body>
</html>