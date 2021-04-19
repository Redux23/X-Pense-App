<?php
   session_start();

  if(!isset($_SESSION['user_id'])){
      header('Location: ../index.php?error=error1');
      exit;
  } else {
      // Show users the page!
  }
?>