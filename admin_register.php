<?php

//Start sessions for consistency
session_start();
 

$AdminPass = "Xz!',3s4UqbY";

//SQL database connection info
include 'phpincludes/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//If Form is submitted
if(isset($_REQUEST["submit"]))
{
  $Username_Set = $_REQUEST["Username"];
  $Password_Set = $_REQUEST["Password"];
  $Admin_Pass_Set = $_REQUEST["AdminP"];
  
  //Minimum of 8 characters, 1 capital, 1 lower, 1 number
  $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
  $regex_result = preg_match($pattern, $Password_Set);
  if($regex_result == 1 || $regex_result == TRUE)
  {
    if($Admin_Pass_Set==$AdminPass)
    {
      $salt = "$2y$10$2n0RmozQeNalwMbS9unKMOZNryBv.8gW8jrTOybs3TpQUSvdYaDOe";
      $phash = sha1($salt.$Password_Set);

      //Check username and email don't already exist
      $stmt = $conn->prepare("SELECT * FROM accs WHERE Username=?");

      $stmt->bind_param("s", $Username_Set);

      $stmt->execute();

      $stmt->bind_result($ID,$Username,$Password,$User_Level);

      if(!empty($stmt->fetch()))
      {
        //If username or email already exists
        echo("<center><h3>");
        echo("Username already exists!");
        echo("</h3></center>");
        header("Refresh:2; url=admin_register_form.php");
      }
      else
      {
        //Create the account
        $stmt = $conn->prepare("INSERT INTO accs (Username, Password, User_Level) VALUES (?, ?, ?)");

        $Access_Level = "A";
        $stmt->bind_param("sss", $Username_Set, $phash, $Access_Level);

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
          header("Refresh:2; url=admin_register_form.php"); 
        }
      }
    }
    else
    {
      $_SESSION["Error"]="Admin Password was incorrect!";
      header("Location: admin_register_form.php");
    }
  }
  else
  {
    echo("<center><h3>Password does not meet the requirements!</h3> </br> <p>Passwords must contain a minimum of 8 characters, one number, one uppercase letter and one lowercase letter");
    header("Refresh:2; url=admin_register_form.php");
  } 
}
else //Else if form isn't submitted
{
  $_SESSION["Error"]="Something went wrong when submitting form";
  header("Location: admin_register_form.php");
}

?>
  
  
  
