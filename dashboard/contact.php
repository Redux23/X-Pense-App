<!-- Author: Oluwatomisin Olatunji  -->

<!-- Title page -->
<?php
$title = 'Contact'; // title page description.

?>

<!-- Header section -->
<header class="header">
  <?php include_once 'header.php'; ?>
</header>

<!-- End of header -->

<!-- Contact card body -->
<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card mt-2">
        <div class="card-title">
          <h2 class="text-center py-2">Contact Us</h2>
          <hr>
          <?php
          
           if(isset($_GET["message"])){
            if($_GET["message"] == "errormsgnotsent"){
              echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Please fill in empty fields.</p>';
            }
            else if($_GET["message"] == "msgsent"){
              
              echo '<p class="alert alert-success" style="text-align: center; padding: 5px; margin:20px;">Email sent succesfully!</p>';
            }
           }
           
          ?>
          <h4 class="sent-notification"></h4>
        </div>
        <div class="card-body">
          <form id="myForm" action="sendemail.php" method="POST">
            <input type="text" name="name" placeholder="Fullname" class="form-control mb-2" required>
            <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
            <input type="text" name="subject" placeholder="Subject" class="form-control mb-2" required>
            <textarea type="text" name="body" class="form-control mb-2" placeholder="Write message..." required></textarea>
            <button class="btn btn-primary" name="btn-send">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>





<!-- End of Contact card body -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <a class="text-dark" href="privacy.html">
        <h6> Privacy Policy</h6>
        <h6> Call us: +44470000000 </h6>
      </a>
      <a class="text-dark" href="#">X-pense Tracker 2021 Inc. All Right Reserved.</a>

      <span class="text-dark">Copyright &copy; TEAM J CMM004 2021</span>
    </div>
  </div>
</footer>
<script type="text/javascript">
if(window.history.replaceState){
  window.history.replaceState(null, null, window.location.href);
}
</script>


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>
 
</html>