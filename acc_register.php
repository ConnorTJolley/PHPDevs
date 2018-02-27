<?php

//Start sessions for consistency
session_start();
 
//SQL database connection info
include 'phpincludes/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//If Form is submitted
if(isset($_REQUEST["submit"]))
{
  $Username_Set = $_REQUEST["username"];
  $Password_Set = $_REQUEST["password"];
  
  $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
  $regex_result = preg_match($pattern, $Password_Set);
  if($regex_result == 1 || $regex_result == TRUE)
  {
      
      $salt = "$2y$10$2n0RmozQeNalwMbS9unKMOZNryBv.8gW8jrTOybs3TpQUSvdYaDOe";
      $phash = sha1($salt.$Password_Set);

      //Check username and email don't already exist
      $stmt = $conn->prepare("SELECT * FROM accs WHERE Username=?");

      $stmt->bind_param("s", $Username_Set);

      $stmt->execute();

      $stmt->bind_result($ID,$Username,$Password, $Access_Level);

      if(!empty($stmt->fetch()))
      {
        //If username or email already exists
        echo("<center><h3>");
        echo("Username already exists!");
        echo("</h3></center>");
        header("Refresh:2; url=register.html");
      }
      else
      {
        //Create the account
        $stmt = $conn->prepare("INSERT INTO accs (Username, Password, User_Level) VALUES (?, ?,?)");

        $AL="U";
        $stmt->bind_param("sss", $Username_Set, $phash, $AL);

        $result = $stmt->execute();

        if($result === TRUE) 
        {
          echo("<center><h3>");
          echo("Account created Successfully!");
          echo("</h3></center>");
          header("Refresh:2; url=login.html");
        } 
        else 
        {
          echo("<center><h3>");
          echo("Account creation Failed!");
          echo("</h3></center>");
          header("Refresh:2; url=register.html"); 
        }
      }
  } 
  else 
  { 
      echo("<center><h3>Password does not meet the requirements!</h3> </br> <p>Passwords must contain a minimum of 8 characters, one number, one uppercase letter and one lowercase letter");
      header("Refresh:5; url=register.html");   
  }
  
  
  
  
}
else //Else if form isn't submitted
{
  //redirect to register form
  header("Location: register.html");
}

?>
  
  
  
