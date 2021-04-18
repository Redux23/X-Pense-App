<!-- Author: Oluwatomisin Olatunji  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Contact Us</title>
</head>
<body>

<header style="margin-bottom: 300px;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="Landing.php"><img src="asset/images/RGU Logo1.png" width="200" height="50" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Landing.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>
  </div>
</nav>

<div class="card" style="width: 400px; margin-left: 200px; margin-top: 50px; margin-bottom: 300px; padding: 25px;">

    <form action="sendemail.php" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Contact us</h1>
    <p>Please fill in this form to contact us.</p>
    <hr>

    <div class="form-group">
    <label for="name"><b>Student ID</b></label>
    <input type="text" placeholder="Enter Student ID" name="studentid" required>
    </div><br>

    <div class="form-group">
    <label for="name"><b>Full name</b></label>
    <input type="text" placeholder="Enter Full name" name="name" required>
    </div><br>

    <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>
    </div><br>
   

    <div class="form-group">
    <label for="subject">Message</label> <br>
    <textarea id="subject" name="message" placeholder="Write something.." style="width:300px"></textarea>
    </div><br>


    <div class="clearfix">
      <button type="submit" class="signupbtn">Send</button>
    </div>
  </div>
</form>
 </div>

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
            <!-- End of Footer -->
            
<!-- Author: Oluwatomisin Olatunji  -->

