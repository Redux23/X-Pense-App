<?php
// start session

//check to see if the user is already logged in 
if(isset($_SESSION['user_ID']) && $_SESSION['user_ID'] === true){
    header("location: layout.php");
    exit;
}
?>