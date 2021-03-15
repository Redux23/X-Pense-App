<?php
include('session.php');

require_once 'header.php';
require_once '../db/connection.php';

?>



<section class="row">
    <!-- Sidebar  -->
    
    <div class="col-3">
        
       <header>
           <h4 style="text-align: center; color: #ffffff;">
           Welcome <?php echo $_SESSION['userName'];?>
           </h4>
           <p style="text-align: center; color: #ffffff;"><?php echo $_SESSION['u_email']; ?></p>
        </header>
        <ul>
            <li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href="#"><i class="fas fa-stream"></i>Daily Expenses</a></li>
            <li><a href="#"><i class="fas fa-question-circle"></i>Weekly Expenses</a></li>
            <li><a href="#"><i class="fas fa-sliders-h"></i>Monthly Expenses</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i>Chart</a></li>
            
            

        </ul>

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
                        Budget: <?php
                        
                        $stmt = $connection->query("SELECT budget, expense, bal FROM budget ORDER BY budget_ID DESC LIMIT 1");
                        $row = $stmt->fetch(); 
                        echo '<span class="h5 mb-0 font-weight-bold text-gray-800">£'.$row['budget'].'</span>';
                        ?></div>
                    
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
                        Expenses:<?php echo '<span class="h5 mb-0 font-weight-bold text-gray-800">£'.$row['expense'].'</span>';
                        ?></div>
                    
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
                        Bal: <?php echo '<span class="h5 mb-0 font-weight-bold text-gray-800">£'.$row['bal'].'</span>';
                        ?></div>
                    
                </div>
            
            </div>
        </div>
    </div>
</div>
</div>  
</div>  
</div>  


<!-- Budget Form -->
    <div class="user-input">
    <form action="userprofile.php" method="POST">
    <div class="form-group">
    <input type="hidden" placeholder="id" value="" name="userid" class="form-control">
    </div> 
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
 


 <footer class="text-center text-white fixed-bottom" style="background-color: #21081a; margin-top: 100px;">

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);
opacity: 70%">
<a class="text-white" href="privacy.html"><h6> Privacy Policy</h6>
          <h6> Call us: +44470000000 </h6></a>
  © 2020 Copyright: 
  <a class="text-white" href="#">X-pense Tracker 2021 Inc. All Right Reserved.</a>
</div>
Copyright
</footer> 





 <!-- Option 2: Separate Popper and Bootstrap JS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
 

<?php

    $balSum; $budget; $expense;

if(isset($_POST['save-value']) ){
    
    $balSum=0;
    $budget = (int)$budgetString =$_POST['budget'];
    $expense = (int)$expenseString =$_POST['expense'];
    //Storing ID from session
    $userID = ($_SESSION['user_id']);
    
   //subtracting values;
   $balSum=$budget-$expense;


  
   $query = $connection->prepare("SELECT * FROM testusers_table WHERE user_ID=:userID");
   $query->bindParam("userID", $userID, PDO::PARAM_STR);
   $query->execute();

   if ($query->rowCount() == 1) {
    $query = $connection->prepare("INSERT INTO budget (budget,expense,bal,user_ID) VALUES (:budget,:expense,:bal,:userID)");
    $query->bindParam("budget", $budget, PDO::PARAM_STR);
    $query->bindParam("expense", $expense, PDO::PARAM_STR);
    $query->bindParam("bal", $balSum, PDO::PARAM_STR);
    $query->bindParam("userID", $userID, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
        header("location: userprofile.php");
        $_SESSION['bud_id'] = $result['budget_ID'];
        echo '<p class="alert alert-success">Saved successfully!</p>';
    } else {
        echo '<p class="alert alert-danger">Something went wrong!</p>';
    }
}

  

}

?>
</body>
</html>
