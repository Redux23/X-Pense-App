<?php
session_start();
$title = 'Sign-In'; // title page description.
require_once 'db/connection.php';
?>

<!-- Header section -->
<header class="header">
    <?php include_once 'header.php'; ?>
</header>
<!-- End of header -->

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
                } else if ($_GET["error"] == "Email&password") {
                    echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Incorrect email or password!.</p>';
                }
            }
            ?>
            <form action="signin.php" method="POST" id="create-form">
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
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
        <a class="text-white" href="privacy.html">
            <h6> Privacy Policy</h6>
            <h6> Call us: +44470000000 </h6>
        </a>
        © 2020 Copyright:
        <a class="text-white" href="#">X-pense Tracker 2021 Inc. All Right Reserved.</a>
    </div>
    Copyright
</footer>
<!-- Footer ends here -->




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
            }
        }
    
?>