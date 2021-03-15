<?php

session_start();
session_unset();
session_destroy();
<<<<<<< HEAD
header("location: ../index.php");
=======
header("location: redirect.php");
>>>>>>> staging
exit();
?>