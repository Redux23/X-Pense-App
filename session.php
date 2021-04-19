<?php
  session_start();

  if(!isset($_SESSION['user_id'])){
      header('Location: index.php?error=error2');
      exit;
  } else {
      // Show users the page!
  }
?>