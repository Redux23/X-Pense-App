<?php
include('../userProfile/session.php');

require_once '../db/connection.php';
// require_once 'action/addbuget.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Xpense Tracker | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="navbar-brand" href="#"><span>
                <img src="../assets/images/xpenseLogo.png" width="80px" height="80px" class="logo" alt="X-Pense App">
            </span></a>
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>


        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userName']; ?>'s Expense tracker</span>
                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../userprofile/welcome.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="contact.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Contact Us
                    </a>
                    <a class="dropdown-item" href="aboutUs.php">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        About
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../includes/logoutUser.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>


                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Welcome <?php echo $_SESSION['f_name']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Expense Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Daily Expense Interface  -->
            <li class="nav-item">
                <a class="nav-link" href="dailytable.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Daily Expenses</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="weekly.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Weekly Expenses</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="monthlyexp.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Monthly Expenses</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="chart.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row d-flex align-items-center justify-content-center">

                        <!-- Budget (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Budget (Current)<?php
                                                                $stmt = $connection->query("SELECT SUM(budget) AS value_sum FROM budget");
                                                                //$stmt->bindParam(":userid", $_SESSION['user_id'], PDO::PARAM_INT);
                                                                $row = $stmt->fetch(); ?>

                                            </div>


                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                £<?php echo $row['value_sum']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pound-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Expenses (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Expenses(current)<?php
                                                                    $stmt = $connection->query("SELECT SUM(expense) AS exp_sum FROM expense");
                                                                    //$stmt->bindParam(":userid", $_SESSION['user_id'], PDO::PARAM_INT);
                                                                    $row = $stmt->fetch(); ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">£<?php echo $row['exp_sum']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pound-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Balance(current)<?php
                                                                $stmt = $connection->query("SELECT SUM(balance) AS bal_sum FROM balance");
                                                                //$stmt->bindParam(":userid", $_SESSION['user_id'], PDO::PARAM_INT);
                                                                $row = $stmt->fetch(); ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">£<?php echo $row['bal_sum']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pound-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                    <div class="d-flex align-items-center justify-content-center">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="index.php" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" placeholder="id" value="" name="userid" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Budget</label>
                                            <input type="text" class="form-control" name="budget" id="exampleFormControlInput1" placeholder="Budget amount">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Expense</label>
                                            <input type="text" class="form-control" name="expense" id="exampleFormControlInput1" placeholder="Expense amount">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Item</label>
                                            <textarea class="form-control" name="item" id="exampleFormControlTextarea1" rows="2" placeholder="Item desc..."></textarea>
                                        </div>
                                        <button name="save-expense" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

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

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <?php

        if (isset($_POST['save-expense'])) {

            $balSum = 0;
            $budget = (int)$budgetString = $_POST['budget'];
            $expense = (int)$expenseString = $_POST['expense'];
            $item = $_POST['item'];

            //Storing ID from session
            $userID = ($_SESSION['user_id']);

            //subtracting values;
            $balSum = $budget - $expense;


            //Preparing the SQL statement for the tables
            $query = $connection->prepare("SELECT * FROM user WHERE userid=:userID");
            $query->bindParam("userID", $userID, PDO::PARAM_INT);
            $query->execute();

            if ($query->rowCount() == 1) {
                $query = $connection->prepare("INSERT INTO budget(budget,userid) VALUES (:budget,:userID)");
                $query->bindParam(":budget", $budget, PDO::PARAM_INT);
                $query->bindParam(":userID", $userID, PDO::PARAM_INT);
                $result = $query->execute();
                if ($result) {
                    $last_id = $connection->lastInsertId();
                    //header("location: index.php?message=savedsuccessfully");
                    //exit();
                    $_SESSION['bud_id'] = $result['budget_id'];
                } else {
                    echo '<p class="alert alert-danger">Something went wrong!</p>';
                    header("location: index.php?message=errorNotSaved");
                }

                $query2 = $connection->prepare("INSERT INTO expense(expense,item_desc,budget_id) VALUES (:expense,:item_desc,:budgetid)");
                $query2->bindParam(":expense", $expense, PDO::PARAM_INT);
                $query2->bindParam(":item_desc", $item, PDO::PARAM_STR);
                $query2->bindParam(":budgetid", $last_id, PDO::PARAM_INT);
                $result2 = $query2->execute();
                if ($result2) {
                    //header("location: index.php?message=savedsuccessfully");
                    // exit();

                } else {

                    // header("location: index.php?message=errorNotSaved");
                    // exit();


                }

                $query3 = $connection->prepare("INSERT INTO balance(balance,userid) VALUES (:balance,:userid)");
                $query3->bindParam(":balance", $balSum, PDO::PARAM_INT);
                $query3->bindParam(":userid", $userID, PDO::PARAM_INT);
                $result3 = $query3->execute();
                if ($result3) {
                    header("location: index.php?message=savedsuccessfully");
                    exit();
                } else {

                    header("location: index.php?message=errorNotSaved");
                    exit();
                }
            }
        }

        ?>



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