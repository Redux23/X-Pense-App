<?php


 //Creating a connection to our database
    //   $servername = 'remotemysql.com';
    //   $username = 'mSQEp2plPc';
    //   $password = '6yqr51s8IE';
    //   $databasename = 'mSQEp2plPc';

      $servername = 'localhost';
      $username = 'root';
      $password = 'HoastDB012388.';
      $databasename = 'test_database';


      $connection = mysqli_connect($servername, $username, $password, $databasename);


      //check if connection is successful

  if(!$connection){
          die('Connection Error: '.mysqli_connect_error());
      }else {
          /*echo '<div style="
          width: 220px; 
          height: 50px; 
          background-color: green; 
          margin-left: 10px; 
          border-radius: 4px; 
          text-align: center; 
          opacity: 70%">
              <p style="color: #FFFFFF;">Connection Success!</p>
          </div>';*/
      }
































/*Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cmm004');
 
/* Attempt to connect to MySQL database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<?php
include("connection.php"); //Establishing connection with our database
if(empty($_POST["username"]) || empty($_POST["password"]))
{
    echo "Both fields are required.";
}else
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT uid FROM users WHERE username='$username' and password='$password'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 1)
    {
        header("location: home.php"); // Redirecting To another Page
    }else
    {
        echo "Incorrect username or password.";
    }
}*/
?>

    