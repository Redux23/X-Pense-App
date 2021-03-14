<?php

require_once 'header.php';

?>



<section class="row">
    <!-- Sidebar  -->
<<<<<<< HEAD
    <div class="col-3 sidebar">
        Col-3
=======
    
    <div class="col-3">
        
       <header>My App</header>
        <ul>
            <li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href="#"><i class="fas fa-stream"></i>Overview</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i>About</a></li>
            <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
            
            

        </ul>
     col-3
>>>>>>> staging
    </div>
<!-- Main dashboard -->
    <div class="col-9" id="dashboard">
 <div class="container-fluid">
 <div class="card shadow mb-4">
    <div class="card-header py-3">
 <div class="row">
<!-- Budget card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Budget: <span class="h5 mb-0 font-weight-bold text-gray-800">£400</span></div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Expense card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Expenses: <span class="h5 mb-0 font-weight-bold text-gray-800">£200.00</span></div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Balance card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Bal: <span class="h5 mb-0 font-weight-bold text-gray-800">£200</span></div>
                    
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>  
</div>  
</div>  
    <div class="user-input">
    <form action="userprofile.php" method="POST">
    <div class="form-group">
    <input type="text" placeholder="Budget" name="budget" class="form-control">
    </div>
    <div class="form-group">
    <input type="text" placeholder="Expense" name="expense" class="form-control">
    </div>
    
    <!-- <div class="form-group">
    <input type="text" placeholder="Description" name="description" class="form-control">
    </div> -->
    <button class="btn btn-primary btn-lg" name="save-value">Save</button>
    </form>
    </div>
 </div>  
    </div>
    
</section>
 








 <!-- Option 2: Separate Popper and Bootstrap JS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    

<?php
include('session.php');

require_once '../db/connection.php';



if(isset($_POST['save-value'])){
    $balSum=0;
    $budget =$_POST['budget'];
    $expense =$_POST['expense'];
   //echo $one;
   $sum=$budget-$expense;
  
   echo '<br />';
   echo "the sum is: ".$balSum;
   echo '<br />';
   echo '<br />';

// $userID = ($_SESSION['user_id']);
// $uName = $_SESSION['userName'];
// $fName = $_SESSION['f_name'];
// $lName = $_SESSION['l_name'];
// $uEmail = $_SESSION['u_email'];
// $pwd = $_SESSION['pwd'];

echo $userID;
echo '<br />';
echo $uName;
echo '<br />';
echo $fName;
echo '<br />';
echo $lName;
echo '<br />';
echo $uEmail;
echo '<br />';
echo $pwd;
echo '<br />';
echo 'I am strong';
echo '<br />';
echo gettype($budget);
echo '<br />';
echo gettype($expense);
  
   
   $sql = "UPDATE testusers_table SET budget='$budget', expense='$expense' WHERE user_ID= 22;";
   $stmt = mysqli_query($connection, $sql);
   if($query_run)
   {
       $_SESSION['success'] = "Your data has been successfully updated!"; // Success message.
       header("location: admin.php"); // redirect back to admin page.
       exit();
   }
   else{
       $_SESSION['status'] = "Your data has not been updated."; // error message.
       header("location: admin.php"); // redirect back to admin page.
       exit();
   }

}

?>
</body>
</html>
