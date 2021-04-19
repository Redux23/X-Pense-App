<!-- 
* "author: olaseni Ashorobi and Tomi Olatunji
   Description: landing page
   
-->
<!-- Title page -->
<?php
$title = 'Home'; // title page description.
require_once 'db/connection.php';
?>
<!-- Header section -->
<header class="header">
  <?php include_once 'header.php'; ?>
</header>
<!-- End of header -->


<!--background Image-->
<main>
  <section style="background-image: url(assets/images/person_1.jpg);
             height: 400px;
             ">
    <!-- Write your code here -->

    <p class="bottomdown animate_animated animate_backInLeft" style="
            color: #000;
             font-weight: bold;
             font-size: 25px;
             opacity: 80%;
             text-align: center;
             margin-top: 10px;">Welcome to your Student Expense App. Sign-up today</p>

<!--signin button here-->

<div class="page-buttons">
      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="signup.php" class="btn btn-info" role="button" style="color: #ffffff; text-decoration: none; opacity: 80%; padding-left: 10px;">Sign Up here</a>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="signin.php" class="btn btn-dark" role="button" style="color: #ffffff; text-decoration: none; opacity: 80%; padding-left: 10px;">Sign in here</a>
      </div>
    </div>
  </section>



</main>

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


</body>

</html>