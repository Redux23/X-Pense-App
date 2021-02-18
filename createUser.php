<?php
 

function createNewUser(){
   
      //Creating a connection to our database
      $servername = 'localhost';
      $username = 'root';
      $password = '';
      $databasename = 'test_database';

      $connection = mysqli_connect($servername, $username, $password, $databasename);


      //check if connection is successful

  /* if(!$connection){
          die('Connection Error: '.mysqli_connect_error());
      }else {
          echo '<div style="
          width: 220px; 
          height: 50px; 
          background-color: green; 
          margin-left: 10px; 
          border-radius: 4px; 
          text-align: center; 
          opacity: 70%">
              <p style="color: #FFFFFF;">Connection Success!</p>
          </div>';
      }*/


      //Initializing form inputfields variables
      $userName = trim($_POST['username']);
      $firstName = trim($_POST['firstname']);
      $lastName = trim($_POST['lastname']);
      $email = trim($_POST['email']);
      $userPassword = trim($_POST['userPassword']);
      $confirmPassword = trim($_POST['confirm-password']);
      $passwordHash = password_hash($userPassword, PASSWORD_BCRYPT);
      
     //Checking the DB to see if user already exists
      $slquery = "SELECT * FROM testusers_table WHERE email= '$email' OR username='$userName' LIMIT 1";
      $selectResult = mysqli_query($connection, $slquery);
      $user = mysqli_fetch_assoc($selectResult);
     
    //conditional statement to check if username already exists
     if($user){
         if($user['username'] === $userName){
        echo '<div style="
        width: 220px; 
        height: 50px; 
        background-color: lightpink; 
        margin-left: 10px; 
        border-radius: 4px; 
        text-align: center; 
        opacity: 70%">
            <p style="color: #000">Username already exists!</p> 
        </div>';} //Error message

        //conditional statement to check if user email already exists
        if($user['email'] === $email){
            echo '<div style="
            width: 220px; 
            height: 50px; 
            background-color: lightpink; 
            margin-left: 10px; 
            border-radius: 4px; 
            text-align: center; 
            opacity: 70%">
                <p style="color: #000">Email already exists!</p>
            </div>'; // Error message
        }
     }
     //conditional statement to check if password and confirm passwords are equal
      elseif($userPassword !== $confirmPassword) {
        echo '<div style="
        width: 220px; 
        height: 50px; 
        background-color: lightpink; 
        margin-left: 10px; 
        border-radius: 4px; 
        text-align: center; 
        opacity: 70%">
            <p style="color: #000">Passwords do not match!</p>
        </div>'; //Error message
      }
       else {
           //Attempting to INSERT data into our table
            $sql = "INSERT INTO testusers_table (userName, firstName, lastName, email, password) VALUES ('$userName', '$firstName', '$lastName', '$email', '$passwordHash')";
       }
      
     

     //check if inserting data was successful

     if(mysqli_query($connection, $sql)){
         echo '<div style="
         width: 220px; 
         height: 50px; 
         background-color: green; 
         margin-left: 10px; 
         border-radius: 4px; 
         text-align: center; 
         opacity: 70%">
             <p style="color: #FFFFFF;">Signed up successfully!</p>
         </div>';
     } else{
         echo 'Error: '.$sql.mysqli_error($connection);
     }

     //Close connection
     mysqli_close($connection);
     
}
 


    if(isset($_POST['signup-button'])){
        createNewUser();
    }

?>

