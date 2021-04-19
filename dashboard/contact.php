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
          
           if(isset($_GET["error"])){
            if($_GET["error"] == "errormsgnotsent"){
              echo '<p class="alert alert-danger" style="text-align: center; padding: 5px; margin:20px;">Please fill in empty fields.</p>';
            }
            else if($_GET["success"] == "msgsent"){
              
              echo '<p class="alert alert-success" style="text-align: center; padding: 5px; margin:20px;">Email sent succesfully!</p>';
            }
           }
           
          ?>
          <h4 class="sent-notification"></h4>
        </div>
        <div class="card-body">
          <form id="myForm" action="sendemail.php" method="POST">
            <input type="text" name="name" placeholder="Fullname" class="form-control mb-2">
            <input type="email" name="email" placeholder="Email" class="form-control mb-2">
            <input type="text" name="subject" placeholder="Subject" class="form-control mb-2">
            <textarea type="text" name="body" class="form-control mb-2" placeholder="Write message..."></textarea>
            <button class="btn btn-primary" name="btn-send">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- alert messages start -->
<?php echo $alert?>
<!-- alert messages end -->



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
</body>
 
</html>