
<!-- Author: Bright Osuagwu -->

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
            
           <?php
           include('connection.php'); 
           $sql = "SELECT * FROM users WHERE email = 'tofunmiola@yahoo.com'";
           $result = mysqli_query($db, $sql);
           $rowCount = mysqli_num_rows($result);

           if($rowCount > 0){
               echo '<h4>Welcome to your Expense Tracker profile page</h4>';
           }


           ?>
        </div>
       
  
    
    </main>
    <footer>
        <div class="footer">
            <h4>Copyright 2021. Robert Gordon University SoC IT module</h4>

        </div>
    </footer>

    <?php
   
   ?>
</body>
</html>