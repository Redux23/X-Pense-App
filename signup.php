<?php
session_start();
$title = 'Sign-Up'; // title page description.
require_once 'db/connection.php';
?>

<!-- Header section -->
<header class="header">
  <?php include_once 'header.php'; ?>
</header>
<!-- End of header -->

<main class="container-2" style="
    background: url(assets/images/journey.jpg);">
  <section>
    <!-- Write your code here -->



  </section>
  <!-- Form here-->
  <section class="form-wrapper-1">
    <div class="form-div-1">
      <p>New User? Sign Up Here</p>
      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "passwordsdonotmatch") {
          echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Passwords do not match!</p>';
        } else if ($_GET["error"] == "passwordlengthlessthan6") {
          echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Passwords must be atleast 6 characters.</p>';
        } else if ($_GET["error"] == "useremailalreadyexists") {
          echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Email is already taken.</p>';
        } else if ($_GET["error"] == "stmtfailed") {
          echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Oops! something went wrong, kindly try again.</p>';
        } else if ($_GET["error"] == "none") {
          echo '<p
            class="alert alert-success" style="text-align: center; padding: 5px; margin:20px;">Account created succesfully!</p>';
        }
      }
      ?>
      <form action="signup.php" method="POST" id="create-form">
        <input type="text" placeholder="Username" name="username" required /> <input type="text" placeholder="Firstname" name="firstname" required />
        <input type="text" placeholder="Lastname" name="lastname" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="userPassword" required />
        <input type="password" placeholder="Confirm Password" name="confirm-password" required />
        <button type="submit" class="btn btn-dark" name="signup-button" style="margin-left: 100px;">Sign Up</button>
      </form>

      <div class="block animate__animated animate__fadeInUp">
        <p>Already signed up?, kindly login <a href="signin.php">here</a></p>
      </div>
    </div>
  </section>



  </div>
  <!-- footer-->
</main>




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

  $query = $connection->prepare("SELECT * FROM user WHERE email=:email");
  $query->bindParam("email", $email, PDO::PARAM_STR);
  $query->execute();
  if ($query->rowCount() > 0) {
    header("location: signup.php?error=useremailalreadyexists");
    exit(); // End function
    // echo '<p class="alert alert-danger">The email address is already registered!</p>';
  }

  if ($userPassword !== $confirmPassword) {
    header("location: signup.php?error=passwordsdonotmatch");
    exit(); // End function  
    // echo '<p class="alert alert-danger">Passwords do not match!.</p>';

  } else if (strlen($userPassword) < 6) {
    header("location: signup.php?error=passwordlengthlessthan6");
    exit(); // End function
    // echo '<p class="alert alert-danger">Password must have atleast 6 characters.</p>';

  } else if ($query->rowCount() == 0) {
    $query = $connection->prepare("INSERT INTO user(username,firstname,lastname,email,password) VALUES (:username,:firstname,:lastname,:email,:passwordHash)");
    $query->bindParam("username", $userName, PDO::PARAM_STR);
    $query->bindParam("firstname", $firstName, PDO::PARAM_STR);
    $query->bindParam("lastname", $lastName, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->bindParam("passwordHash", $passwordHash, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
      header("location: signup.php?error=none");
      exit(); // End function
      //echo '<p class="alert alert-success">Your registration was successful!</p>';
    } else {
      header("location: signup.php?error=stmtfailed");
      exit(); // End function
      //echo '<p class="alert alert-danger">Something went wrong!</p>';
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