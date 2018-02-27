<?php

//Start sessions for consistency
session_start();
 
//SQL database connection info
$conn = new mysqli("localhost", "root", "Xz!',3s4UqbY9AtM*m*q", "DDW"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//If Form is submitted
if(isset($_REQUEST["submit"]))
{
  //Get and store entered info into variables
  $Username = $_REQUEST["Username"];
  
  //Encrypt the password being passed accross and store it in $password variable
  $Password_set = $_REQUEST["Password"];
  
  //encrypt password variable and store in $enc variable
  $salt = "$2y$10$2n0RmozQeNalwMbS9unKMOZNryBv.8gW8jrTOybs3TpQUSvdYaDOe";
  $ehash = sha1($salt.$Password_set);
  
  $Table_Name=$Username;
  
  $result = $conn->query("SHOW TABLES LIKE '".$Table_Name."'");
  if($result->num_rows == 1) 
  {
    $_SESSION["Cart_Exist"]="True";
    $_SESSION["BasketID"]=$Username;
  }
  else
  {
    $_SESSION["Cart_Exist"]="False";
  } 
  //Use prepared SQL statements to check database against users credentials entered
  if ($stmt = $conn->prepare("SELECT * FROM accs WHERE Username=? AND Password=?")) 
  {

    //bind paramaters using username and encrypted password
    $stmt->bind_param("ss", $Username, $ehash);

    //execute query
    $stmt->execute();

    //bind the result into variables
    $stmt->bind_result($ID,$Username,$Password,$Access_Level);
    //need to create an access level and assign that as a result too
    
    
    //Need to create a check for access level in the redirect.php page
    
    
    //if the fetch of the results isnt empty
    if(!empty($stmt->fetch()))
    {
      //create sessions using variables from bind_result
      $_SESSION["ID"]=$ID;
      $_SESSION["Username"]=$Username;
      $_SESSION["AccountName"]=$Username;
      $_SESSION["Access_Level"]=$Access_Level;
      //Set logged_in state to true
      $_SESSION["Logged_In"]="True";
      //redirect to redirect.php
      header("Location: index.php");
    }
    else //else if it is empty (login fail)
    {
      //set logged_in state to false
      $_SESSION["Logged_In"]="False";
      
      //redirect to login form
      header("Location: login.html");
    }

    //close statement / connection
    $stmt->close();
  }
}
else //Else if form isn't submitted
{
  //Set logged_in state to false
  $_SESSION["Logged_In"]="False";
  
  //redirect to login form
  header("Location: login.html");
}

?>
  
  
  
