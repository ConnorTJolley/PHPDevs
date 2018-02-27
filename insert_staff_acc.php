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
      $_SESSION["Error"]="Username Already Exists!";
      header("Location: createstaff.php");
    }
    else
    {
      //Create the account
      $stmt = $conn->prepare("INSERT INTO accs (Username, Password, User_Level) VALUES (?, ?, ?)");

      $Access_Level = "S";
      $stmt->bind_param("sss", $Username_Set, $phash, $Access_Level);

      $result = $stmt->execute();

      if($result === TRUE) 
      {
        $_SESSION["Success"]="Staff Account Created Successfully!";
        header("Location: createstaff.php");
      } 
      else 
      {
        $_SESSION["Error"]="Something went wrong when creating the staff account!";
        header("Location: createstaff.php"); 
      }
    }
  }
  else
  {
    $_SESSION["Error"]="Admin Password was incorrect!";
    header("Location: admin_register_form.php");
  }
  
}
else //Else if form isn't submitted
{
  $_SESSION["Error"]="Something went wrong when submitting form";
  header("Location: createstaff.php");
}

?>
  
  
  
